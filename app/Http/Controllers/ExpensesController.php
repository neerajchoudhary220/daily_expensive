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
        $today = Carbon::now()->format('Y-m-d');
        // Current month's expense
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $today_expense = Expenses::whereDate('expense_date', $today)->sum('amount');
        $total_expense = Expenses::whereMonth('expense_date', $currentMonth)
            ->whereYear('expense_date', $currentYear)
            ->sum('amount');
        $categories = ExpenseCategory::get();

        return view('web.expenses.index', compact('total_expense', 'today_expense', 'categories'));

    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $_order = request('order');
            $_columns = request('columns');
            $order_by = $_columns[$_order[0]['column']]['name'];
            $order_dir = $_order[0]['dir'];
            $search = request('search');
            $skip = request('start');
            $take = request('length');

            $query = Expenses::query();
            if (isset($search['value'])) {
                $query->where('name', 'like', '%'.$search['value'].'%');
            }

            $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
            $recordsTotal = $query->count();
            $recordsFiltered = $query->count();
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
                'draw' => request('draw'),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data,
            ];
        }
    }
}
