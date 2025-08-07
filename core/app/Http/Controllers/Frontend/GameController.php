<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use App\Models\Result;
use App\Http\Controllers\Api\SeamlesWsController;

class GameController extends Controller
{
    public function slot(Request $request)
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Slot';
        $provider = Provider::where('type', 'slot')->where('provider_code', 1)->where('status',1)->get();
        return view('frontend.games.slot', compact('provider', 'pageTitle'));
    }

    public function arcade()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Arcade';
        $provider = Provider::where('type', 'arcade')->where('provider_code', 8)->where('status',1)->get();
        return view('frontend.games.sports', compact('provider', 'pageTitle'));
    }

    public function sports()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Sports';
        $provider = Provider::where('type', 'sportsbook')->where('provider_code', 3)->where('status',1)->get();
        $games = DB::table('game_lists')->where('GameType', 3)->get();
        return view('frontend.games.sports', compact('provider', 'pageTitle', 'games'));
    }

    public function lottery()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Lottery';
        $provider = Provider::where('type', 'lottery')->where('provider_code', 9)->where('status',1)->get();
        return view('frontend.games.lotterys', compact('provider', 'pageTitle'));
    }

    public function lotterys()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Lottery';
        $data = Result::all();
        return view('frontend.games.lots', compact('data', 'pageTitle'));
    }

    public function live()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Live Game';
        $provider = Provider::where('type', 'cockfighting')->where('provider_code', 9)->where('status',1)->get();
        $games = DB::table('game_lists')->where('GameType', 9)->orderBy('sequence', 'ASC')->get();
        return view('frontend.games.sports', compact('provider', 'pageTitle', 'games'));
    }

    public function casino()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $pageTitle = 'Casino';
        $provider = Provider::where('type', 'casino')->where('provider_code', 2)->where('status',1)->get();
        $games = DB::table('game_lists')->where('GameType', 2)->orderBy('sequence', 'ASC')->get();
        return view('frontend.games.sports', compact('provider', 'pageTitle', 'games'));
    }

    public function game($slug)
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $provider = Provider::where('slug', $slug)->where('provider_code', 1)->where('status', 1)->first();
        $games = DB::table('game_lists')->where('Provider', $provider->provider)->where('GameType', 1)->where('provider_id',$provider->provider_id)->orderBy('sequence', 'ASC')->get();
        return view('frontend.games.list', compact('provider', 'games'));
    }

    public function arcades($slug)
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        $provider = Provider::where('slug', $slug)->where('provider_code', 8)->where('status', 1)->first();
        $games = DB::table('game_lists')->where('Provider', $provider->provider)->where('GameType', 8)->where('provider_id',$provider->provider_id)->orderBy('sequence', 'ASC')->get();
        return view('frontend.games.list', compact('provider', 'games'));
    }

    public function launch_game(Request $request)
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify');
            }
        }

        if (auth()->user()->status_game == 0) {
            return back()->with('error', 'Your account has been locked from accessing game. Please contact customer support for more information.');
        }
        $extplayer = auth()->user()->extplayer;

        if ($request->provider_id != 2) {
            $api = DB::table('api_providers')->where('agent_id', general()->agent_id)->where('provider','=','NexusGGR')->first();

            if ($request->gameType == 1) {
                $params = [
                    'method' => 'game_launch',
                    'agent_code' => $api->apikey,
                    'agent_token' => $api->secretkey,
                    'user_code' => $extplayer,
                    'provider_code' => $request->providerCode,
                    'game_code' => $request->gameCode,
                    'lang' => 'en'
                ];
            } else {
                $params = [
                    'method' => 'game_launch',
                    'agent_code' => $api->apikey,
                    'agent_token' => $api->secretkey,
                    'user_code' => $extplayer,
                    'provider_code' => $request->providerCode,
                    'game_code' => '',
                    'lang' => 'en'
                ];
            }

            $jsonData = json_encode($params);

            $headerArray = ['Content-Type: application/json'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $api->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $jsonData,
                CURLOPT_HTTPHEADER => $headerArray,
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $result = json_decode($response);

            if ($result->status == 1) {
                return redirect($result->launch_url);
            } else {
                return back()->with('error', __('public.maintenance'));
            }
        } else {
            $user_code = auth()->user()->extplayer;
            $game_code = $request->gameCode;
            $balance = auth()->user()->balance;

            $seamlesWsController = new SeamlesWsController();
            $result = $seamlesWsController->huidu_launch_game($user_code, $game_code, $balance);

            if ($result->code == 0) {
                return redirect($result->payload->game_launch_url);
            } else {
                return back()->with('error', $result->msg);
            }
        }
    }

    public function ip_server(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gateway.bet4wins.org/api/ip',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}
