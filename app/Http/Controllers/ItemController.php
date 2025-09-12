<?php

namespace App\Http\Controllers;

class ItemController extends Controller
{
    public function index()
    {
        return view('web.items.index');
    }
}
