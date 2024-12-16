<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('category_image')->store('categories', 'public');

        Category::create([
            'category_name' => $request->category_name,
            'category_image' => $imagePath,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
}
