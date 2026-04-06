<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::role('user');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($request->has('paginate')) {
            $paginate = $request->input('paginate');
        } else {
            $paginate = 10;
        }

        if ($request->has('program') && !empty($request->program)) {
            $programId = $request->input('program');

            $query->whereHas('subscriptions.plan.category', function ($q) use ($programId) {
                $q->where('id', $programId);
            });
        }
        $users = $query->paginate($paginate);

        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.users.table', compact('users'))->render(),
                'pagination' => (string) $users->links()
            ]);
        }

        $programs = Category::get();
        return view('admin.users.index', compact('users','programs'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed'
        ]);

        $validatedData['password'] = Hash::make($request->password);
        $user = User::create($validatedData);
        $user->assignRole('user');
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => $request->filled('password') ? 'required|min:4|confirmed' : ''
        ]);

        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        }else{
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function changeStatus(User $user) {
        $user->update([
            'status' => $user->status == 1 ? 0 : 1
        ]);
        return redirect()->route('users.index')->with('success', 'User status updated successfully.');
    }

    public function userProfile() {
        return view('website.user-profile');
    }

    public function userProfileUpdate(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        }
        // dd($validatedData);
        User::findOrFail(Auth::id())->update($validatedData);
        Auth::logout();
        return redirect()->route('login')->with('success', 'User profile updated successfully.');
    }
}
