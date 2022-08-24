<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Register category
    public function storeCategory(Request $request){
        $category = Category::create([
            'title' => $request->title,
            'image_name' => $request->image_name,
            'featured' => $request->featured,
            'active' => $request->active

        ]);

        return response()->json(['category'=> $category], 200);
    }
    
    // edit category
    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        $category->title = $request->title;
        $category->image_name = $request->image_name;
        $category->featured = $request->featured;
        $category->active = $request->active;
        $category->save();

        return response()->json(['message'=> 'success', 'data'=> $category], 200);
    }

    // delete category
    public function destroy($id)
    {
        //delete
        Category::destroy($id);
        return response()->json(['message'=> 'Category Deleted successfully!'], 200);
    }

}
