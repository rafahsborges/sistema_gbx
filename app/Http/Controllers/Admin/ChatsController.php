<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Musonza\Chat\Chat;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ChatsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $conversations = Chat::conversations(Chat::conversations()->conversation)
            ->setParticipant(auth()->user())
            ->get()
            ->toArray()['data'];

        $conversations = Arr::pluck($conversations, 'conversation_id');

        $data = [
            'conversations' => array_map('intval', $conversations),
            'participant' => [
                'id' => auth()->user()->id,
                'type' => get_class(auth()->user())
            ]
        ];

        return view('admin.chats.index', $data);
    }
}
