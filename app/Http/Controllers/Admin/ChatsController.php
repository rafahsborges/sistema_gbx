<?php

namespace App\Http\Controllers\Admin;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.chat.index');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('cliente')->get();
    }

    /**
     * Persist message to database
     *
     * @param Request $request
     * @return array
     */
    public function sendMessage(Request $request)
    {
        $cliente = Auth::user();

        $message = $cliente->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($cliente, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

}
