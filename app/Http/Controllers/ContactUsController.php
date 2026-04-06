<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ContactUs::orderBy('is_seen', 'desc');
        if ($request->has('search') && $request->search) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        }

        if ($request->paginate) {
            $paginate = $request->input('paginate');
        } else {
            $paginate = 10;
        }
        $contactUsMessages = $query->paginate(10);
        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.contact-us.table', compact('contactUsMessages'))->render(),
                'pagination' => (string) $contactUsMessages->links()
            ]);
        }
        return view('admin.contact-us.index', compact('contactUsMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($contactUs)
    {
        ContactUs::findOrFail($contactUs)->delete();
        return redirect()->back()->with('success','Message deleted successfully.');
    }
}
