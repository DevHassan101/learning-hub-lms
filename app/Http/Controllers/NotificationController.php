<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notification.index');
    }
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $validatedData['admin_id']  = Auth::user()->id;
        $validatedData['read_by']  = '[]';

        Notification::create($validatedData);
        return redirect()->back()->with('success', 'Notification send successfully.');
    }

    public function markAsRead()
    {
        $notifications = Notification::get();
        $userId = auth()->id();
        foreach ($notifications as $notification) {
            if (!$notification->isReadBy($userId)) {
                $notification->update([
                    'read_by' => array_merge(json_decode($notification->read_by) ?? [], [$userId])
                ]);
            }
        }

        return redirect()->back();
    }

    public function getUnreadCount()
    {
        $userId = auth()->id();

        $count = Notification::whereRaw('NOT JSON_CONTAINS(read_by, ?)', [$userId])
            ->count();

        return response()->json(['count' => $count]);
    }

    public function getNotifications()
    {
        $notifications = Notification::select('title', 'description', 'created_at')->orderBy('created_at', 'DESC')->get();
        foreach ($notifications as $notification) {
            $notification->date = $notification->created_at->diffForHumans();
        }

        $userId = auth()->id();

        $count = Notification::whereRaw('NOT JSON_CONTAINS(read_by, ?)', [(string)$userId])
            ->count();
        return response()->json([
            'notifications' => $notifications,
            'unreadCount' => $count
        ]);
    }
}
