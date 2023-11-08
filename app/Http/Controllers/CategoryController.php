<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|max:255', // Add more validation rules if needed
        ]);

        // Create a new category
        $category = new Category;
        $category->category_name = $request->input('category_name');
        // Set other attributes as needed

        $category->save();

        // Redirect back to the previous page or a specific route
        return redirect()->back()->with('success', 'Category added successfully');
    }
}
