<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Showing blog categories
     */
    public function blog_category()
    {
        $blogCategories = BlogCategory::latest()->get();

        return view('admin.blog.category', compact('blogCategories'));
    }

    /**
     * Store blog categories data to Database
     *
     * @param Request $request
     */
    public function store_blog_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Please provide Category name',
        ]);

        BlogCategory::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Category added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Showing Edit blog categories page
     *
     * @param integer $id
     */
    public function edit_blog_category(int $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        return view('admin.blog.category_edit', compact('blogCategory'));
    }

    /**
     * Update blog categories
     *
     * @param Request $request
     * @param integer $id
     */
    public function update_blog_category(Request $request, int $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|min:3',
        ], [
            'name.required' => 'Please provide Category name.',
            'name.min' => 'Category name must be at least 3 characters.'
        ]);
        $blogCategory->name = $request->name;

        $blogCategory->save();

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Delete a particular blog categories
     *
     * @param integer $id
     */
    public function destroy_blog_category(int $id)
    {
        $data = BlogCategory::findOrFail($id);
        $data->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
