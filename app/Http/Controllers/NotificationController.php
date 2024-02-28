<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller

{
    public function index()
    {
        $notifications=Notification::get();
        return view('admin.notification.index',compact('notifications'));}

        // public function show()
        // {
        //     $userId = auth()->id();

        //     // Retrieve unread notifications
        //     $notifications = Notification::where('user_id', $userId)
        //                                  ->whereNull('is_read')
        //                                  ->orderBy('created_at', 'desc')
        //                                  ->get();



        //     $tasks = Task::where('assign_to', $userId)
        //                  ->whereIn('status', ['assign', 'inprogress', 'testing'])
        //                  ->orderBy('created_at', 'desc')
        //                  ->get();

        //     return view('admin.notification.index', [
        //         'notifications' => $notifications,
        //         'tasks' => $tasks,

        //     ]);
        // }
        public function show()
        {
            $userId = auth()->id();

            // Retrieve unread notifications
            $notifications = Notification::where('user_id', $userId)
                                         ->whereNull('is_read')
                                         ->orderBy('created_at', 'desc')
                                         ->get();

            // Retrieve tasks based on the user's role
            $userRole = Auth::user()->role_id;

            if ($userRole === 2) {
                // For Admin
                $tasks = Task::whereIn('status', ['assign', 'inprogress', 'testing'])
                             ->orderBy('created_at', 'desc')
                             ->get();
            } else {
                // For Non-Admin Users
                $tasks = Task::where('assign_to', $userId)
                             ->whereIn('status', ['assign', 'inprogress', 'testing'])
                             ->orderBy('created_at', 'desc')
                             ->get();
            }

            return view('admin.notification.index', [
                'notifications' => $notifications,
                'tasks' => $tasks,
            ]);
        }





}
