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

    public function updateFurniture(Furniture $furniture, Request $request){

    
        $update = $request->validate([
            'furniture_name' => 'required|max:15',
            'furniture_price' => 'required|numeric|between:5000,10000000',
            // 'furniture_type' => 'required',
            // 'color' => 'required',
            'image' => 'file|mimes:jpg,png,jpeg',
        ]);

        if($request->hasFile('image')){
            $update['image'] = $request->file('image')->store('furnitures');
            Storage::delete($furniture->image);
        }else{
            $update['image'] = $furniture->image;
        }
             

        Furniture::where('id', $furniture->id)
                ->update($update);
        
        return redirect('/')->with('success_update', 'Furniture has been updated');
    }

    public function updateIndex(Furniture $furniture){
        
        return view('update', [
            'furniture' => $furniture
            
        ]);
    }

    public function deleteFurniture(Furniture $furniture){
        Furniture::where('id', $furniture->id)
                ->delete($furniture);

        return redirect('/')->with('success_delete', 'Furniture has been deleted');

    }

    


    public function index(){
        $furniture = Furniture::inRandomOrder()->take(4)->get();

        return view('home',[
        'furnitures'=>$furniture
       ]);
    }

    public function show(Furniture $furniture){
        return view('/',[
            "name" =>$furniture ->furniture_name,
            'furniture' => $furniture
        ]);
    }

    public function displayDetail(Furniture $furniture){
        return view('detail', [
            'furniture' => $furniture
        ]);
    }


    
}
