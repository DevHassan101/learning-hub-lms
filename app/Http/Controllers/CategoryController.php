<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\PlanPoint;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'title' => 'required',
            'banner' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('banner')) {
            $banner = $request->file('banner');
            $name_gen = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
            $banner->move('uploads/category/banner', $name_gen);
        }
        $validatedData['banner'] = 'uploads/category/banner/' . $name_gen;

        $category = Category::create($validatedData);
        $monthlyPrice = explode("$", $request->monthly_price)[1] ?? 0;
        $quarterlyPrice = explode("$", $request->quarterly_price)[1] ?? 0;
        $annuallyPrice = explode("$", $request->annually_price)[1] ?? 0;
        $alltimePrice = explode("$", $request->alltime_price)[1] ?? 0;
        Plan::create([
            'category_id' => $category->id,
            'name' => "Monthly",
            'price' => $monthlyPrice,
        ]);
        Plan::create([
            'category_id' => $category->id,
            'name' => "Quarterly",
            'price' => $quarterlyPrice,
        ]);
        Plan::create([
            'category_id' => $category->id,
            'name' => "Annually",
            'price' => $annuallyPrice,
        ]);
        Plan::create([
            'category_id' => $category->id,
            'name' => "All time",
            'price' => $alltimePrice,
        ]);
        return redirect()->route('program.edit', ['program' => $category])->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $program)
    {
        return view('admin.category.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
        $category = Category::findOrFail($category);
        $validatedData = $request->validate([
            'title' => 'required',
            'banner' => 'nullable|mimes:png,jpg,jpeg'
        ]);
        if ($category->title == 'NCLEX & IELTS') {
            unset($validatedData['title']);
        }
        if ($request->file('banner') && $request->banner) {
            if(file_exists(public_path($category->banner))){
                unlink(public_path($category->banner));
            }
            $banner = $request->file('banner');
            $name_gen = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
            $banner->move('uploads/category/banner', $name_gen);
            $validatedData['banner'] = 'uploads/category/banner/' . $name_gen;
        } else {
            unset($validatedData['banner']);
        }
        $category->update($validatedData);
        foreach ($request->prices as $key => $value) {
            Plan::find($key)->update([
                'price' => explode('$', $value)[1],
            ]);
        }

        return redirect()->route('program.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        Category::findOrFail($category)->delete();
        return redirect()->route('program.index')->with('success', 'Category deleted successfully.');
    }

    public function planPointStore(Request $request)
    {
        try {
            if ($request->has('point_id') && $request->point_id) {
                PlanPoint::findOrFail($request->point_id)->update([
                    'plan_id' => $request->plan_id,
                    'point' => $request->point,
                ]);
                return response()->json(['error' => false, 'message' => 'Point updated successfully.']);
            }
            PlanPoint::create([
                'plan_id' => $request->plan_id,
                'point' => $request->point,
            ]);
            return response()->json(['error' => false, 'message' => 'Point created successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Something went wrong.', 'issue' => $th->getMessage()]);
        }
    }

    public function getPoints(Request $request)
    {
        try {
            $points = PlanPoint::where('plan_id', $request->planId)->get();
            return response()->json(['error' => false, 'points' => $points]);
        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    public function destroyPoint($id)
    {
        try {
            PlanPoint::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Point deleted successfully.');
            return response()->json(['error' => false, 'message' => "Point deleted successfully."]);
        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }
}
