<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'subcategory_image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Store subcategory image
        $imagePath = $request->file('subcategory_image')->store('subcategory_images', 'public');

        // Create subcategory
        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory added successfully.');
    }

    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('subcategories.index', compact('categories'));
    }
}
