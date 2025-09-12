<?php

namespace App\Http\Controllers;

use App\DataTables\ItemsCategoryDataTable;

class ItemsCategoryController extends Controller
{
    public function index(ItemsCategoryDataTable $dataTable)
    {
        return $dataTable->render('web.items_category.index');
        // return view('web.items_category.index');
    }
}
