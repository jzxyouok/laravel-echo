<?php

namespace App\Http\Controllers;

use App\Message;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    public function index(){
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    public function show($id){
        $room = Room::find($id);
        if(!$room){
            throw new ModelNotFoundException('Sala não existente');
        }
        $user = Auth::user();
        $user->room_id = $room->id;

        return view('rooms.show', compact('room'));
    }

    public function createMessage($id, Request $request){
        $room = Room::find($id);
        if(!$room){
            throw new ModelNotFoundException('Sala não existente');
        }
        $message = new Message();
        $message->content = $request->content;
        $message->room_id = $room->id;
        $message->user_id = Auth::user()->id;
        $message->save();

        return response()->json($message, 201);
    }
}
