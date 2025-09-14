<?php

namespace App\Http\Controllers;

use App\DataTables\ItemDataTable;

class ItemController extends Controller
{
    public function index(ItemDataTable $dataTable)
    {
        return $dataTable->render('web.items.index');
        // return view('web.items.index');
    }
}
