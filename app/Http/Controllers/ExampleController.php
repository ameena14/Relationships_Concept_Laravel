<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Example;


class ExampleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'description' => 'required|string',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        // Store image
        $imagePath = $request->file('image')->store('example_images', 'public');

        // Create example
        Example::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('examples.index', $request->subcategory_id)->with('success', 'Example added successfully.');
    }

    public function index()
    {
        // Fetch all examples
        $examples = Example::all();

        // Return the view and pass the examples to it
        return view('examples.index', compact('examples'));
    }
}
