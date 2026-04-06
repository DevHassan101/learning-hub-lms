<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Testimonial::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // if ($request->has('paginate')) {
        //     $paginate = $request->has('paginate');
        // } else {
            $paginate = 10;
        // }
        $testimonials = $query->paginate($paginate);

        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.testimonial.table', compact('testimonials'))->render(),
                'pagination' => (string) $testimonials->links()
            ]);
        }
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'message' => 'required'
        ]);
        Testimonial::create($validatedData);
        return redirect()->route('testimonial.index')->with('success','Testimonial created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'message' => 'required'
        ]);
        $testimonial->update($validatedData);
        return redirect()->route('testimonial.index')->with('success','Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success','Testimonial deleted successfully');
    }
}
