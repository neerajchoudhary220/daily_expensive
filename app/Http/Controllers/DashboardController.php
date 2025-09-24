<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::get();

        return view('dashboard', compact('categories'));
    }
}
