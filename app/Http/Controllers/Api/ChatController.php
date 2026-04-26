<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Get list of chats for the user
     */
    public function index()
    {
        $user = Auth::user();
        $chats = Chat::where('student_id', $user->id)
            ->orWhere('tutor_id', $user->id)
            ->with(['student', 'tutor', 'messages' => function($q) {
                $q->latest()->limit(1);
            }])
            ->get();

        return response()->json(['status' => 'success', 'chats' => $chats]);
    }

    /**
     * Get messages for a specific chat
     */
    public function show($id)
    {
        $chat = Chat::where(function($q) {
            $q->where('student_id', Auth::id())->orWhere('tutor_id', Auth::id());
        })->findOrFail($id);

        $messages = $chat->messages()->with('sender')->oldest()->paginate(50);
        
        // Mark as read
        $chat->messages()->where('sender_id', '!=', Auth::id())->update(['is_read' => true]);

        return response()->json(['status' => 'success', 'chat' => $chat, 'messages' => $messages]);
    }

    /**
     * Send a message
     */
    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message_text' => 'required_without:file|string',
            'file' => 'nullable|image|max:5120', // 5MB limit
        ]);

        $chat = Chat::where(function($q) {
            $q->where('student_id', Auth::id())->orWhere('tutor_id', Auth::id());
        })->findOrFail($chatId);

        $filePath = null;
        $messageType = 'text';

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('chat_files', 'public');
            $messageType = 'image';
        }

        $message = Message::create([
            'chat_id' => $chat->id,
            'sender_id' => Auth::id(),
            'message_text' => $request->message_text,
            'file_path' => $filePath,
            'message_type' => $messageType,
        ]);

        return response()->json(['status' => 'success', 'message' => $message]);
    }

    /**
     * Create or get chat between student and tutor
     */
    public function startChat(Request $request)
    {
        $request->validate([
            'tutor_id' => 'required|exists:users,id',
            'booking_id' => 'nullable|exists:bookings,id'
        ]);

        $chat = Chat::firstOrCreate([
            'student_id' => Auth::id(),
            'tutor_id' => $request->tutor_id,
            'booking_id' => $request->booking_id
        ]);

        return response()->json(['status' => 'success', 'chat' => $chat]);
    }
}
