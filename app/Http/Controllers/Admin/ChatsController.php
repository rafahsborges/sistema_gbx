<?php

namespace App\Http\Controllers\Admin;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;

use App\Models\AdminUser;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatsController extends Controller
{
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
    public function list()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;

        $user = AdminUser::find($id);

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Messagem Enviada!'];
    }
}
