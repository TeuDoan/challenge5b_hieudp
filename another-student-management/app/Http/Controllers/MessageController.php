<?php

namespace App\Http\Controllers;
use App\Models\Messages;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class MessageController extends Controller
{
    public function send(Request $request, $uuid)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $recipient = User::where('uuid', $uuid)->firstOrFail();

        Messages::create([
            'sender_uuid' => Auth::user()->uuid,
            'recipient_uuid' => $recipient->uuid,
            'message' => $request->message,
        ]);

        return back()->with('message_sent', 'Message sent successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = Messages::findOrFail($id);

        if ($message->sender_uuid !== Auth::user()->uuid) {
            abort(403);
        }

        $message->message = $request->message;
        $message->save();

        return response()->json(['message' => $message->message]);
    }

    public function destroy($id)
    {
        $message = Messages::findOrFail($id);

        if ($message->sender_uuid !== Auth::user()->uuid) {
            abort(403);
        }

        $message->delete();

        return redirect()->back()->with('message', 'Message deleted');
    }

}
