<?php

namespace App\Http\Controllers;

use App\Models\PastryMenu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function dashboard()
    {
        $pastries = PastryMenu::all();
        return view('dashboard', compact('pastries'));
    }
}
