<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Pasaran;
use App\Models\Taruhan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\SeamlesWsController;

class GameController extends Controller
{
    public function index()
    {
        $live = Result::where('type',1)->get();
        $data = Result::where('type',2)->get();
        return view('gameloby.index',compact('live','data'));
    }

    public function invoice()
    {
        $transaksi = Taruhan::where('user_id',auth()->user()->id)->get();
        return view('gameloby.invoice',compact('transaksi'));
    }

    public function mimpi()
    {
        return view('gameloby.mimpi');
    }

    public function howto()
    {
        return view('gameloby.howto');
    }

    public function result($slug)
    {
        $slugs = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$slugs->title)->orderBy('created_at', 'desc')->get();
        return view('gameloby.result',compact('data','slugs'));
    }

    public function games($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.index',compact('data','slug','result'));
    }

    public function play($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.digit',compact('data','slug','result'));
    }

    public function twod($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.2d',compact('data','slug','result'));
    }

    public function trod($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.3d',compact('data','slug','result'));
    }

    public function bbfs($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.bbfs',compact('data','slug','result'));
    }

    public function k2d($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.quick',compact('data','slug','result'));
    }

    public function ds($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.dset',compact('data','slug','result'));
    }

    public function cbs($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.bebas',compact('data','slug','result'));
    }

    public function cmc($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.macau',compact('data','slug','result'));
    }

    public function cng($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.naga',compact('data','slug','result'));
    }

    public function cjt($slug)
    {
        $result = Result::where('slug',$slug)->first();
        $data = Pasaran::where('title',$result->title)->orderBy('created_at','desc')->get();
        return view('gameloby.games.jitu',compact('data','slug','result'));
    }

    public function taruhan(Request $request)
    {

        $balance = auth()->user()->balance;

        if ($request->betAmount > $balance) {
            return response()->json([
                'status' => 40,
                'title' => 'error',
                'message' => 'Your balance is insufficient.'
            ]);
        }

        $lenght = strlen($request->bet);
        if ($lenght == 2) {
            $disc = $request->betAmount * 29/100;
            $amount = $request->betAmount - $disc;
            $win = $request->betAmount * 70;
        } elseif ($lenght == 3) {
            $disc = $request->betAmount * 59/100;
            $amount = $request->betAmount - $disc;
            $win = $request->betAmount * 400;
        } elseif ($lenght >= 4) {
            $disc = $request->betAmount * 66/100;
            $amount = $request->betAmount - $disc;
            $win = $request->betAmount * 3000;
        }

        $taruhan = new Taruhan();
        $taruhan->tid = strtoupper(Str::random(7));
        $taruhan->user_id = auth()->user()->id;
        $taruhan->username = auth()->user()->username;
        $taruhan->market = $request->market;
        $taruhan->amount = $amount;
        $taruhan->amount_bet = $request->betAmount;
        $taruhan->pasang = $request->bet;
        $taruhan->date = date('d-m-Y');
        $taruhan->win = $win;
        $taruhan->type = $request->type;
        $taruhan->status = 1;
        $taruhan->save();

        $end = new SeamlesWsController();
        $end->withdraw(auth()->user()->extplayer, $amount);

        return response()->json([
            'status' => 200,
            'title' => 'success',
            'message' => 'Your bet has successful.'
        ]);
    }
}
