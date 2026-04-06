<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\FlashCard;
use Illuminate\Http\Request;

class FlashCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = FlashCard::with('course');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        if ($request->has('paginate')) {
            $paginate = $request->input('paginate');
        } else {
            $paginate = 10;
        }
        $flashCards = $query->paginate($paginate);
        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.flash-cards.table', compact('flashCards'))->render(),
                'pagination' => (string) $flashCards->links()
            ]);
        }
        return view('admin.flash-cards.index', compact('flashCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('admin.flash-cards.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'description' => 'required'
        ], [
            'course_id.required' => 'Course is required',
            'course_id.exists' => 'Course maybe deleted',
        ]);

        FlashCard::create($validatedData);
        return redirect()->route('flash-card.index')->with('success', 'Flash card created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashCard $flashCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashCard $flashCard)
    {
        $courses = Course::get();
        return view('admin.flash-cards.edit', compact('courses', 'flashCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlashCard $flashCard)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'course_id' => 'required|exists:courses,id',
            'description' => 'required'
        ], [
            'course_id.required' => 'Course is required',
            'course_id.exists' => 'Course maybe deleted',
        ]);

        $flashCard->update($validatedData);
        return redirect()->route('flash-card.index')->with('success', 'Flash card updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashCard $flashCard)
    {
        $flashCard->delete();
        return redirect()->route('flash-card.index')->with('success', 'Flash card deleted successfully.');
    }
}
