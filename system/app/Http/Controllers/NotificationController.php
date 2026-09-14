<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('notifiable_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('notifications.index', compact('notifications'));
    }

    public function markRead(Notification $notification)
    {
        if ($notification->notifiable_id !== auth()->id()) {
            abort(403);
        }
        $notification->update(['read' => true, 'read_at' => now()]);

        return $notification->url ? redirect($notification->url) : back();
    }

    public function markAll()
    {
        Notification::where('notifiable_id', auth()->id())->where('read', false)->update(['read' => true, 'read_at' => now()]);

        return back()->with('success', 'All notifications marked as read.');
    }
}
