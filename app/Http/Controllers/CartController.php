<?php

namespace App\Http\Controllers;

use App\Models\PastryMenu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $pastry = PastryMenu::findOrFail($id);

        $cart = Session::get('cart', []);
        
        $cart[$id] = [
            'name' => $pastry->name,
            'price' => $pastry->price,
            'quantity' => $request->quantity ?? 1,
            'image' => $pastry->image
        ];
        
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }

    public function view()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Menghapus item dari keranjang
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        
        return redirect()->route('cart.view')->with('success', 'Item berhasil dihapus dari keranjang!');
    }
}
