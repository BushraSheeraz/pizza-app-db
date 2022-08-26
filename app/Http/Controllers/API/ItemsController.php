<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;


class ItemsController extends Controller
{
    //
    public function storeItem(Request $request){
        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_name' => $request->image_name,
            'category_id' => $request->category_id,
            'featured' => $request->featured,
            'active' => $request->active

        ]);
        return response()->json(['item'=> $item], 200);
    }

    // Edit Item
    public function update(Request $request, $id){
       Item::where('id',$id)->update($request->all());
       $item=Item::where('id',$id)->first();
       // $item = Item::find($id);

        // $item->name = $request->name;
        // $item->description = $request->description;
        // $item->price = $request->price;
        // $item->image_name = $request->image_name;
        // $item->featured = $request->featured;
        // $item->active = $request->active;
        // $item->save();

        return response()->json(['message'=> 'success', 'data'=> $item], 200);
    }
}
