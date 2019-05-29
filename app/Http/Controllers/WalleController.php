<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class WalleController extends Controller
{
    public function index(){
        $message = Message::all();
        return view('Wall.index')->withMessage($message);
    }

    public function write(Request $request){

        $message = new Message();
        $message->message = $request->input('message');
        $message->id_author = \Auth::id();
        $message->save();

        return redirect()->route('WalleIndex');
    }

    public function delete(Request $request)
    {

        $message = Message::find($request->id_message);
        if ($message->id_author != \Auth::id())
        {
            $request->session()->flash('error','illegal action');
            //dd('illegal action');
        }else{
            $request->session()->flash('message','message supprimé');
            $message->delete();
        }

        //Message::destroy($request->id_message);

        return redirect()->route('WalleIndex');
    }
}
