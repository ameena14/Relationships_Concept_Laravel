<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Example;

class UserDashboardController extends Controller
{
    public function showCategories()
    {
        $categories = Category::all();
        return view('user.categories', compact('categories'));
    }

    public function showSubcategories(Category $category)
    {
        $subcategories = $category->subcategories;
        return view('user.subcategories', compact('category', 'subcategories'));
    }

    public function showExamples(Subcategory $subcategory)
    {
        $examples = $subcategory->examples;
        return view('user.examples', compact('subcategory', 'examples'));
    }
}

