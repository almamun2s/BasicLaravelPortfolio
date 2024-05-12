<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of Blog.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('admin.blog.blog_all', compact(['blogs', 'categories']));
    }

    /**
     * Show the form for creating a new Blog.
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created Blog in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Please provide Blog title',
            'description.required' => 'Description should not be empty',
            'category.required' => 'Please select a category',
        ]);

        $fileName = null;
        if ($request->file('image')) {
            $file = $request->file('image');

            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(430, 327)->save('uploads/blog/' . $fileName);
        }
        Blog::insert([
            'category_id' => $request->category,
            'title' => $request->title,
            'image' => $fileName,
            'tags' => $request->tags,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified Blog. This is for Frontend.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id );
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('frontend.blog_details', compact(['blog', 'allBlogs', 'categories']));
    }

    /**
     * Show the form for editing the specified Blog.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $categories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('admin.blog.blog_edit', compact(['blog', 'categories']));
    }

    /**
     * Update the specified Blog in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Please provide Blog title',
            'description.required' => 'Description should not be empty',
            'category.required' => 'Please select a category',
        ]);

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category;
        $blog->tags = $request->tags;

        if ($request->file('image')) {
            $file = $request->file('image');

            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(430, 327)->save('uploads/blog/' . $fileName);
            $blog->image = $fileName;
        }


        $blog->save();

        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified Blog from storage.
     */
    public function destroy(string $id)
    {
        $data = Blog::findOrFail($id);
        $img = $data->image;
        if ($img != null) {
            unlink('uploads/blog/' . $img);
        }
        $data->delete();

        $notification = array(
            'message' => 'Blog Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
