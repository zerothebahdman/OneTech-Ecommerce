<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Carbon;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->category_name),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Category Added Successfully');
    }

    public function edit($slug)
    {
        $categories = Category::where('slug', $slug)->first();

        // \DB::enableQueryLog();
        return view('adminDashboard.category.edit', compact('categories')); //->render
        // dd(\DB::getQueryLog());
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'category_name' => ['bail', 'required', 'string', 'min:3', 'max:200', 'unique:categories', ]
        ], [
            'category_name.unique' => 'This cant be updated because you didnt make any changes.'
        ]);

        Category::where('slug', $slug)->update([
            'category_name' => $request->category_name,
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->category_name),
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($slug)
    {
        Category::where('slug', $slug)->delete();

        return back()->with('success', 'Category Deleted Successfully');
    }

    /* ---------------------- Sub Category -----------------*/

    public function subCategoryIndex()
    {
        $getAllCategories = Category::all();
        $subCategories = SubCategory::with('category')->latest()->get();

        return view('adminDashboard.category.sub_category.index', compact('subCategories', 'getAllCategories'));
    }

    public function subCategoryStore(Request $request)
    {
        $request->validate([
            'sub_category_name' => ['bail', 'required', 'string', 'min:3', 'max:60', 'unique:sub_categories'],
            'category_id' => ['bail', 'required']
        ], [
            'sub_category_name.unique' => 'This Sub Category Name is already taken',
        ]);

        SubCategory::insert([
            'category_id' => $request['category_id'],
            'sub_category_name' => $request['sub_category_name'],
            'slug' => SlugService::createSlug(SubCategory::class, 'slug', $request->sub_category_name),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Sub Category Inserted Successfully');
    }

    public function subCategoryEdit($slug)
    {
        $getAllCategories = Category::all();
        $subCategory = SubCategory::where('slug', $slug)->first();

        return view('adminDashboard.category.sub_category.edit', compact('subCategory', 'getAllCategories'));
    }

    public function subCategoryUpdate(Request $request, $slug)
    {
        $request->validate([
            'category_id' => ['bail', 'required'],
            'sub_category_name' => ['bail', 'required', 'string', 'min:3', 'max:60']
        ], [
            'sub_category_name.required' => 'Please note that the SubCategory name can not be empty'
        ]);

        SubCategory::where('slug', $slug)->update([
            'category_id' => $request['category_id'],
            'sub_category_name' => $request['sub_category_name'],
            'slug' => SlugService::createSlug(SubCategory::class, 'slug', $request->sub_category_name),
        ]);

        return redirect()->route('admin.sub_category.index')->with('toast_success', 'SubCategory Updated Successfully');
    }

    public function subCategoryDelete($slug)
    {
        SubCategory::where('slug', $slug)->delete();

        return back()->with('success', 'SubCategory deleted successfully');
    }
}
