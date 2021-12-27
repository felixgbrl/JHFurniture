<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreFurnitureRequest;
use App\Http\Requests\UpdateFurnitureRequest;

class FurnitureController extends Controller
{
    public function addFurniture(Request $request){
        $furniture = $request->validate([
            'furniture_name' => 'required',
            'furniture_price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:10000',
        ]);

        $furniture['image'] = $request->file('image')->store('furnitures');

        Furniture::create($furniture);

        $request->session()->flash('success_input', 'Successfully input a new furniture!');

        return redirect('/');
    }

    public function index(){
       return view('/home',[
        'furnitures'=>Furniture::inRandomOrder()->take(4)->get()
       ]);
    }

    public function show(Furniture $furniture){
        return view('/',[
            "name" =>$furniture ->furniture_name,
            'furniture' => $furniture
        ]);
    }

  


    
}