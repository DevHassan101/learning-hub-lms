<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }
        if ($request->has('paginate')) {
            $paginate = $request->input('paginate');
        } else {
            $paginate = 10;
        }
        $courses = $query->paginate($paginate);
        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.progress.table', compact('courses'))->render(),
                'pagination' => (string) $courses->links()
            ]);
        }
        return view('admin.progress.index', compact('courses'));
    }
}
