<?php

namespace App\Http\Controllers\Admin;

use App\Models\PastryMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePastryRequest;

class PastryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pastries = PastryMenu::paginate(10);
        return view('admin.pastry.index', compact('pastries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pastry.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName); 
    }

    $pastry = new PastryMenu();
    $pastry->name = $request->name;
    $pastry->description = $request->description;
    $pastry->price = $request->price;
    $pastry->image = $imageName;
    $pastry->save();

    return redirect()->route('admin.pastry.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $pastry = PastryMenu::findOrFail($id);

    return view('admin.pastry.edit', compact('pastry'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePastryRequest $request, string $id)
    {
        $pastry = PastryMenu::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
    
            $pastry->image = $imageName;
        }
    
        $pastry->name = $request->name;
        $pastry->description = $request->description;
        $pastry->price = $request->price;
        $pastry->save();
    
        return redirect()->route('admin.pastry.index')->with('success', 'Menu berhasil diperbarui.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pastry = PastryMenu::findOrFail($id);
        $pastry->delete();
        return redirect()->route('admin.pastry.index');
    }
}
