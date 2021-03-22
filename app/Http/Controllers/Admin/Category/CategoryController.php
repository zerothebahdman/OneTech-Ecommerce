<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('adminDashboard.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['bail', 'required', 'string', 'min:3', 'unique:categories', 'max:200'],
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        // \DB::enableQueryLog();
        return view('adminDashboard.category.edit', compact('categories')); //->render
        // dd(\DB::getQueryLog());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['bail', 'required', 'string', 'min:3', 'max:200', 'unique:categories', ]
        ], [
            'category_name.unique' => 'This cant be updated because you didnt make any changes.'
        ]);

        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('success', 'Category Deleted Successfully');
    }
}