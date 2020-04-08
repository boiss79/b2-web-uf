<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index() {
        return view('admin.messages.index', [
            'messages' => Message::all()
        ]);
    }

    public function destroy(Message $message) {
        $message->delete();
        
        return redirect()->route('admin.messages.index')->with('green', 'Le message a bien été supprimée.');
    }
}
