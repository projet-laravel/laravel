<?php

namespace App\Http\Controllers;

use App\Method;
use App\Type;
use App\Wallet;
use Illuminate\Http\Request;
use App\Message;

class WalletController extends Controller
{
    public function index()
    {
        $messages = Wallet::all();

        /*
        echo "<pre>";
        $wallet = $messages['wallets']->first();


        dd($wallet->type->name);
        */

        return view('Wallet.index')->withMessages($messages);
    }

    public function write(Request $request)
    {
        $message = new Message;
        $message->message = $request->input('message');
        $message->id_author = \Auth::id();
        $message->save();
        return redirect()->route('wallIndex');
    }
    public function delete(Request $request)
    {
        $message = Message::find($request->id_message);
        if($message->id_author != \Auth::id()){
            $request->session()->flash('error', 'Illegal action');
        }else{
            $request->session()->flash('message', 'message supprimé');
            $message->delete();
        }

        //  Message::destroy($request->id_message);
        return redirect()->route('wallIndex');
    }
}
