<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationController extends Controller
{
    /**
     * Display a listing of the unread notifications.
     */
    public function index(Request $request)
    {
        $unreadNotifications = $request->user()->unreadNotifications;

        return view('notifications.index', compact('unreadNotifications'));
    }


    /**
     * Mark a specific notification as read.
     */
    public function markAsRead(Request $request, $notificationId)
    {
        $notification = $request->user()->notifications()->findOrFail($notificationId);

        $notification->markAsRead();

        return redirect()->back()->with('success', 'Notification marked as read.');

    }
}
