<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Mail\Websitemail;

class AdminMessageController extends Controller
{
    public function index()
    {
        $attendees = User::all();
        return view('admin.message.index', compact('attendees'));
    }

    public function detail($id)
    {
        $attendee = User::find($id);
        $messages = Message::where('user_id', $id)->orderBy('id','asc')->get();
        return view('admin.message.detail', compact('attendee', 'messages'));
    }

    public function detail_submit(Request $request,$id)
    {
        $request->validate([
            'message' => ['required'],
        ]);

        $message = new Message();
        $message->user_id = $id;
        $message->admin_id = 1;
        $message->message = $request->message;
        $message->save();

        $attendee = User::where('id',$id)->first();

        $link = url('my-messages');
        $subject = "Reply from Admin";
        $message_text = 'Please click on the following link to view the reply from admin:<br>';
        $message_text .= '<a href="'.$link.'">'.$link.'</a>';

        \Mail::to($attendee->email)->send(new Websitemail($subject,$message_text));

        return redirect()->back()->with('success','Message is sent successfully!');
    }
}
