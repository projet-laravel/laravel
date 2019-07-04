<?php

namespace App\Http\Controllers;

use App\Method;
use App\Type;
use App\Wallet;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index()
    {
        //revenu
        $sum1 = DB::table('wallets')
            ->where('id_type', 1)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $sum2 = DB::table('wallets')
            ->where('id_type', 2)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $sum3 = DB::table('wallets')
            ->where('id_type', 3)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $messages['sum1'] = $sum1;
        $messages['sum2'] = $sum2;
        $messages['sum3'] = $sum3;

        $messages['wallets'] = Wallet::all()->whereIn("id_user",\Auth::id())->sortByDesc("day");

        return view('Wallet.index')->withMessages($messages);

    }


    public function dashboard()
    {
        //revenu
        $sum1 = DB::table('wallets')
            ->where('id_type', 1)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $sum2 = DB::table('wallets')
            ->where('id_type', 2)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $sum3 = DB::table('wallets')
            ->where('id_type', 3)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $revenu = DB::table('wallets')
            ->where('id_type', 1)
            ->where('id_user',\Auth::id())
            ->get();

        $messages['revenu'] = $revenu;
        $messages['sum1'] = $sum1;
        $messages['sum2'] = $sum2;
        $messages['sum3'] = $sum3;

        $messages['wallets'] = Wallet::all()->whereIn("id_user",\Auth::id())->sortByDesc("day");

        return view('dashboard')->withMessages($messages);

    }

    public function write(Request $request)
    {
        if (isset($request->id)){
            $messages['data'] = DB::table('wallets')
                ->where('id',$request->id)
                ->get();
        }
        //revenu
        $sum1 = DB::table('wallets')
            ->where('id_type', 1)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $sum2 = DB::table('wallets')
            ->where('id_type', 2)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $sum3 = DB::table('wallets')
            ->where('id_type', 3)
            ->where('id_user',\Auth::id())
            ->sum('amount');

        $messages['sum1'] = $sum1;
        $messages['sum2'] = $sum2;
        $messages['sum3'] = $sum3;

        $messages['types'] = Type::all();
        $messages['methods'] = Method::all();

        return view('Wallet.write')->withMessages($messages);
    }


    public function add(Request $request){

        $wallet = new Wallet();

        //portefeuille => id 	id_user     id_type 	id_methode  	montant 	description 	Lieu  	Day		date_inserted

        $wallet->id_user = \Auth::id();
        $wallet->id_type = $request->input('type');
        $wallet->id_method = $request->input('method');
        $wallet->amount = $request->input('amount');
        $wallet->description = $request->input('description');
        $wallet->place = $request->input('place');
        $wallet->day = $request->input('date');

        $wallet->save();

        return redirect()->route('walletIndex');
    }

    public function delete(Request $request)
    {
        $message = Wallet::find($request->id);
        if ($message->id_user != \Auth::id())
        {
            $request->session()->flash('error','illegal action');
            //dd('illegal action');
        }else{
            $request->session()->flash('message','Bien supprimé');
            $_SESSION['message'] = "Bien supprimé";
            $message->delete();
        }

        //Message::destroy($request->id_message);

        return redirect()->route('walletIndex');
    }

    public function update(Request $request){

        Wallet::where("id",$request->id)
            ->update([
                "id_type" => $request->input('type'),
                "id_method" => $request->input('method'),
                "amount" => $request->input('amount'),
                "description" => $request->input('description'),
                "place" => $request->input('place'),
                "day" => $request->input('date')
            ]);

        return redirect()->route('walletIndex');
    }

}
