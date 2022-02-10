<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }
    
    public function show($id)
    {
        return Category::find($id);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        return Category::create([
            'name' => request('name'),
            'description' => request('description'),
        ]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $success = $category->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Category $category)
    {
        $success = $category->delete();

        return [
            'success' => $success
        ];
    }
}