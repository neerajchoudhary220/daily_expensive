<?php

namespace App\Http\Controllers;

class IncomeTransactionController extends Controller
{
    public function index()
    {
        return view('web.income_transactions.index');
    }
}
