<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\Expenses;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::get();

        return view('web.expenses.index', compact('categories'));

    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $skip = request('start');
            $take = request('length');
            $recordsTotal = Expenses::query()->count();
            $data = self::listFilter($request)
                ->when($request->get('category'), fn ($expense) => $expense->with('expenseCategory'))
                ->orderBy($order_by, $order_dir)
                ->orderBy('id', 'DESC')
                ->skip($skip)
                ->take($take)
                ->get();

            $recordsFiltered = self::listFilter($request)->count();
            $idx = 1;
            foreach ($data as $d) {
                $d->idx = $idx;
                $d->expense_date = Carbon::parse($d->expense_date)->format('d-M-Y');
                $d->description = $d->description ?? '--';
                $d->category = $d->expenseCategory->name;
                $d->action = view('web.expenses.action', compact('d'))->render();
                $idx++;
            }

            return [
                'draw' => intval($request->get('draw')),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data,
            ];
        }
    }

    public static function listFilter($request)
    {
        $request = collect($request);
        $search = $request->get('search');
        $selected_category = $request->get('category');
        $quick_day = $request->get('quick_day', 'month');
        $payment_method = $request->get('payment_method');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $query = Expenses::query();

        return $query
            ->when($search, fn ($expense) => $expense->where('name', 'like', '%'.$search['value'].'%'))
            ->when($selected_category, fn ($expense) => $expense->forCategory($selected_category))
            ->when($quick_day === 'today', fn ($expense) => $expense->forToday($quick_day))
            ->when($quick_day === 'yesterday', fn ($expense) => $expense->forYesterDay($quick_day))
            ->when($quick_day === 'week', fn ($expense) => $expense->forWeek($quick_day))
            ->when($quick_day === 'month', fn ($expense) => $expense->forMonth($quick_day))
            ->when($payment_method, fn ($expense) => $expense->forPaymentMethod($payment_method))
            ->when($start_date && $end_date, fn ($expense) => $expense->forDate($start_date, $end_date));

    }

    public function destroy(Expenses $expense)
    {
        $expense->delete();

        return response()->json([
            'msg' => 'Expense Deleted Successfully!',
        ]);
    }
}
