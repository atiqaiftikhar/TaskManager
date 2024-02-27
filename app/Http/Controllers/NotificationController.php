<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;

class NotificationController extends Controller

{
    public function index()
    {
        $notifications=Notification::get();
        return view('admin.notification.index',compact('notifications'));}

        public function show()
        {
            $userId = auth()->id();

            // Retrieve unread notifications
            $notifications = Notification::where('user_id', $userId)
                                         ->whereNull('is_read')
                                         ->orderBy('created_at', 'desc')
                                         ->get();

            // Update notifications to mark them as read when viewed
            // foreach ($notifications as $notification) {
            //     $notification->update(['is_read' => true]);
            // }

            $tasks = Task::where('assign_to', $userId)
                         ->whereIn('status', ['assign', 'inprogress', 'testing'])
                         ->orderBy('created_at', 'desc')
                         ->get();

            return view('admin.notification.index', [
                'notifications' => $notifications,
                'tasks' => $tasks,

            ]);
        }


//     public function assignTaskToUser(Request $request, $taskId, $userId)
// {
//     // Retrieve the task by ID
//     $task = Task::findOrFail($taskId);

//     // Create a notification for the assigned user
//     Notification::create([
//         'user_id' => $userId,
//         'task_id' => $taskId,
//         'message' => 'You have been assigned a new task.',
//         'due_date' => $task->due_date, // Retrieve due date from the task
//         'creation_date' => $task->creation_date, // Retrieve creation date from the task
//         // Add other relevant notification data as needed
//     ]);

//     return view('admin.notification.index');
// }


}
