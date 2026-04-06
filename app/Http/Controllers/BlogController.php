<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        if ($request->has('paginate')) {
            $paginate = $request->has('paginate');
        } else {
            $paginate = 10;
        }
        $blogs = $query->paginate($paginate);

        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.blogs.table', compact('blogs'))->render(),
                'pagination' => (string) $blogs->links()
            ]);
        }
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg',
        ]);

        $banner = $request->file('banner');
        $name_gen = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
        $path = public_path('uploads/blogs/');
        $banner->move($path, $name_gen);

        $validatedData['banner'] = 'uploads/blogs/' . $name_gen;

        Blog::create($validatedData);
        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Blog $blog, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'banner' => 'nullable|mimes:jpg,png,jpeg',
        ]);

        if ($request->has('banner') && $request->banner) {
            if (file_exists(public_path($blog->banner))) {
                unlink(public_path($blog->banner));
            }
            $banner = $request->file('banner');
            $name_gen = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
            $banner->move('public/uploads/blogs', $name_gen);
            $validatedData['banner'] = 'uploads/blogs/' . $name_gen;
        } else {
            unset($validatedData['banner']);
        }

        $blog->update($validatedData);
        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if (file_exists(public_path($blog->banner))) {
            unlink(public_path($blog->banner));
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }
}
