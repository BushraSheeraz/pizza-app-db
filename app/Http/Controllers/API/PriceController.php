<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Price;


class PriceController extends Controller
{
    //add Price
    public function addPrice(Request $request){
        $data = Price::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'item_id' => $request->item_id,
            'price' => $request->price,

        ]);
        return response()->json(['data'=> $data], 200);
    }

    // edit price
    public function updatePrice(Request $request, $id){
        $data = Price::find($id);
            $data->name = $request->name;
            $data->category_id =  $request->category_id;
            $data->item_id = $request->item_id;
            $data->price = $request->price;
            $data->save();


        return response()->json(['data'=> $data], 200);
    }

    // delete Price
    public function destroyPrice($id)
    {
        //delete
        Price::destroy($id);
        return response()->json(['message'=> 'Price Deleted successfully!'], 200);
    }
}

