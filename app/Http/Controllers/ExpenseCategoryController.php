<?php

namespace App\Http\Controllers;

use App\DataTables\ExpenseCategoryDataTable;

class ExpenseCategoryController extends Controller
{
    public function index(ExpenseCategoryDataTable $dataTable)
    {
        return $dataTable->render('web.expense_category.index');
        // return view('web.expense_category.index');
    }
}
