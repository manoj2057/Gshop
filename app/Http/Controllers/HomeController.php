<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;


class HomeController extends Controller
{
    public function index()
    {
        $products = product::latest()->get();
        return view('home', ['products' => $products]);
    }
}
