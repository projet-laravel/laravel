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
        $messages = Wallet::orderBy('id', 'desc')->get();

        return view('Wallet.index')->withMessages($messages);
    }

    public function write()
    {
        $messages['types'] = Type::all();
        $messages['methodes'] = Method::all();

        return view('Wallet.write')->withMessages($messages);

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
