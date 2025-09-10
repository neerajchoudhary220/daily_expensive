<?php

namespace App\Http\Controllers;

use App\DataTables\ExpensesDataTable;

class ExpensesController extends Controller
{
    public function index(ExpensesDataTable $dataTable)
    {
        return $dataTable->render('web.expenses.index');
        // return view('web.expenses.index');
    }
}
