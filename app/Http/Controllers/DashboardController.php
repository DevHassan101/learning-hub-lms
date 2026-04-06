<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\Course;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         $totalUsers = User::count();
//         $activeUsers = User::where('status', 1)->count();
//         $totalCourses = Course::count();
        
//         $recentUsers = User::latest()->take(5)->get();
        
        
//         return view('dashboard', compact('totalUsers', 'activeUsers', 'totalCourses', 'recentUsers'));
//     }
// }


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $totalUsers = User::role('user')->count();
        $activeUsers = User::role('user')->where('status', 1)->count();
        $totalCourses = Course::count();
        $totalPrograms = Category::count();
        
        // Get recent users (last 5)
        $recentUsers = User::role('user')
            ->with(['subscriptions.plan.category', 'continueCourses', 'completedCourses'])
            ->latest()
            ->take(5)
            ->get();
        
        // Calculate average quiz and exam scores
        // $avgQuizScore = User::role('user')->avg('user_quiz_average') ?? 0;
        // $avgExamScore = User::role('user')->avg('user_exam_average') ?? 0;
        
        return view('dashboard', compact(
            'totalUsers', 
            'activeUsers', 
            'totalCourses', 
            'totalPrograms',
            'recentUsers'
            // 'avgQuizScore', 
            // 'avgExamScore'
        ));
    }
}
