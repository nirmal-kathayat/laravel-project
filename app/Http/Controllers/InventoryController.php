<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = \DB::table('inventories')->get();
        return view('inventory.index')->with(['inventories'=>$inventories]);
    }

    public function createForm()
    {
        return view('inventory.form');
    }

    public function storeForm(Request $request)
    {
        // dd($request->all());
       $data =  $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'nullable'
        ]);

        \DB::table('inventories')->insert($data);
        return redirect()->route('inventory.index')->with(['success'=>'data stored succesfully in inventory']);
    }

    public function edit($id)
    {
        $editInventory = \DB::table('inventories')->where('id',$id)->first();
        return view('inventory.edit')->with(['editInventory'=>$editInventory]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'nullable'
        ]);

        \DB::table('inventories')->where('id',$id)->update([
            'name'=>$request->name,
            'price' => $request->price,
            'description'=> $request->description
        ]);
        return redirect()->route('inventory.index')->with(['success'=>'Inventory updated successfully!']);
    }

    public function delete($id)
    {
        \DB::table('inventories')->where('id',$id)->delete();
        return redirect()->back()->with(['success'=>'Inventory deleted successfully!']);
    }
}
