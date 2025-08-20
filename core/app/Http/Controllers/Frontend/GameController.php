<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use App\Models\Result;
use App\Models\User;
use App\Models\Transaction;
use App\Models\LuckySetting;
use App\Models\LuckyWhell;
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
                return $result;
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

        public function luckywheel(Request $request)
    {
        $settings = LuckySetting::where('agent_id', general()->agent_id)->first();
        $prize = LuckyWhell::where('agent_id', general()->agent_id)->get();
        return view('luckywheel.index', compact('settings', 'prize'));
    }

    public function getLuckyWheelList(Request $request)
    {
        $lucky = LuckyWhell::where('agent_id', general()->agent_id)->orderBy('created_at', 'desc')->get(['probability', 'type', 'value', 'win', 'resultText']);
        $settings = LuckySetting::where('agent_id', general()->agent_id)->first();

        $prizes = LuckyWhell::where('agent_id', general()->agent_id)->get(['probability', 'type', 'value', 'win', 'resultText'])->toArray();

        $selectedPrize = $this->weightedRandomPrize($prizes);

        $spinIndex = null;
        foreach ($prizes as $index => $segment) {
            if ($segment['win'] === $selectedPrize['win']) {
                $spinIndex = $index + 1;
                break;
            }
        }

        return response()->json([
            "colorArray" => [
                "rgb(21 21 21 / 0%)",
                "rgb(21 21 21 / 0%)"
            ],
            "segmentValuesArray" => $lucky,
            "svgWidth" => 1024,
            "svgHeight" => 768,
            "wheelStrokeColor" => "#1a1a1a",
            "wheelStrokeWidth" => 20,
            "wheelSize" => 560,
            "wheelTextOffsetY" => 100,
            "wheelTextColor" => "#222",
            "wheelTextSize" => "2.3em",
            "wheelImageOffsetY" => 10,
            "wheelImageSize" => 270,
            "centerCircleSize" => 100,
            "centerCircleStrokeColor" => "#1a1a1a",
            "centerCircleStrokeWidth" => 52,
            "centerCircleFillColor" => "#1A1A1A",
            "segmentStrokeColor" => "#1a1a1a",
            "segmentStrokeWidth" => 2,
            "centerX" => 512,
            "centerY" => 384,
            "hasShadows" => true,
            "numSpins" => 1,
            "spinDestinationArray" => [$spinIndex],
            "minSpinDuration" => 5,
            "gameOverText" => $settings->gameOverText . ' MYR ' . number_format($selectedPrize['win'], 2),
            "invalidSpinText" => $settings->invalidSpinText,
            "introText" => $settings->introText,
            "hasSound" => true,
            "gameId" => $selectedPrize['win'],
            "clickToSpin" => false
        ]);
    }

    public function spinCheck(Request $request)
    {
        $user = User::find(auth()->id());

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 200);
        }

        if ($user->spin_quota <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'The opportunity to spin is over'
            ], 200);
        }

        $prizes = LuckyWhell::where('agent_id', general()->agent_id)->get(['probability', 'type', 'value', 'win', 'resultText'])->toArray();

        $selectedPrize = $this->weightedRandomPrize($prizes);

        $spinIndex = null;
        foreach ($prizes as $index => $segment) {
            if ($segment['win'] === $selectedPrize['win']) {
                $spinIndex = $index + 1;
                break;
            }
        }

        $settings = LuckySetting::where('agent_id', general()->agent_id)->first();

        return response()->json([
            'status' => 'success',
            "colorArray" => [
                "rgb(21 21 21 / 0%)",
                "rgb(21 21 21 / 0%)"
            ],
            "segments" => $prizes,
            "segmentValuesArray" => $prizes,
            "svgWidth" => 1024,
            "svgHeight" => 768,
            "wheelStrokeColor" => "#1a1a1a",
            "wheelStrokeWidth" => 20,
            "wheelSize" => 560,
            "wheelTextOffsetY" => 100,
            "wheelTextColor" => "#222",
            "wheelTextSize" => "2.3em",
            "wheelImageOffsetY" => 10,
            "wheelImageSize" => 270,
            "centerCircleSize" => 100,
            "centerCircleStrokeColor" => "#1a1a1a",
            "centerCircleStrokeWidth" => 52,
            "centerCircleFillColor" => "#1A1A1A",
            "segmentStrokeColor" => "#1a1a1a",
            "segmentStrokeWidth" => 2,
            "centerX" => 512,
            "centerY" => 384,
            "hasShadows" => true,
            "numSpins" => 1,
            "spinDestinationArray" => [$spinIndex],
            "minSpinDuration" => 3,
            "gameOverText" => $settings->gameOverText,
            "invalidSpinText" => $settings->invalidSpinText,
            "introText" => $settings->introText,
            "hasSound" => true,
            "gameId" => $selectedPrize['win'],
            "clickToSpin" => false
        ]);
    }

    public function startSpin(Request $request)
    {
        $prizes = LuckyWhell::where('agent_id', general()->agent_id)->get(['id', 'probability', 'type', 'value', 'win', 'resultText'])->toArray();

        $selectedPrize = $this->weightedRandomPrize($prizes);

        $spinIndex = null;
        foreach ($prizes as $index => $segment) {
            if ($segment['win'] === $selectedPrize['win']) {
                $spinIndex = $index + 1;
                break;
            }
        }

        $user = User::find(auth()->id());
        if ($user->spin_quota <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'The opportunity to spin is over'
            ], 200);
        }
        if ($user) {
            $user->decrement('spin_quota');
        }

        $settings = LuckySetting::where('agent_id', general()->agent_id)->first();

        return response()->json([
            'status' => 'success',
            "colorArray" => [
                "rgb(21 21 21 / 0%)",
                "rgb(21 21 21 / 0%)"
            ],
            "segments" => $prizes,
            "segmentValuesArray" => $prizes,
            "svgWidth" => 1024,
            "svgHeight" => 768,
            "wheelStrokeColor" => "#1a1a1a",
            "wheelStrokeWidth" => 20,
            "wheelSize" => 560,
            "wheelTextOffsetY" => 100,
            "wheelTextColor" => "#222",
            "wheelTextSize" => "2.3em",
            "wheelImageOffsetY" => 10,
            "wheelImageSize" => 270,
            "centerCircleSize" => 100,
            "centerCircleStrokeColor" => "#1a1a1a",
            "centerCircleStrokeWidth" => 52,
            "centerCircleFillColor" => "#1A1A1A",
            "segmentStrokeColor" => "#1a1a1a",
            "segmentStrokeWidth" => 2,
            "centerX" => 512,
            "centerY" => 384,
            "hasShadows" => true,
            "numSpins" => 1,
            "spinDestinationArray" => [$spinIndex],
            "minSpinDuration" => 3,
            "gameOverText" => $settings->gameOverText,
            "invalidSpinText" => $settings->invalidSpinText,
            "introText" => $settings->introText,
            "hasSound" => true,
            "gameId" => $selectedPrize['win'],
            "clickToSpin" => false
        ]);
    }

    function weightedRandomPrize($prizes)
    {
        $eligiblePrizes = array_filter($prizes, function ($prize) {
            return $prize['probability'] > 15;
        });

        if (empty($eligiblePrizes)) {
            return null;
        }

        $totalWeight = 0;
        foreach ($eligiblePrizes as $prize) {
            $totalWeight += $prize['probability'];
        }

        $random = mt_rand(1, $totalWeight);

        $currentWeight = 0;
        foreach ($eligiblePrizes as $prize) {
            $currentWeight += $prize['probability'];
            if ($random <= $currentWeight) {
                return $prize;
            }
        }
    }

    public function update_result(Request $request)
    {
        $user = User::where('extplayer', $request->user)->first();
        if ($user) {
            $trans = new Transaction();
            $trans->trx_id = getTrx();
            $trans->agent_id = $user->agent_id;
            $trans->transaksi = 'Top Up';
            $trans->total = $request->prize;
            $trans->dari_bank = 'Lucky Wheel Prize';
            $trans->metode = 'By System';
            $trans->bonus = 'tanpabonus';
            $trans->bonus_amount = 0;
            $trans->keterangan = 'Lucky Wheel Prize';
            $trans->status = 'Sukses';
            $trans->id_user = $user->id;
            $trans->username = $user->username;
            $trans->transaction_by = 'System';
            $trans->save();

            $user->balance += $request->prize;
            $user->save();

            return response()->json(['status' => 'success', 'message' => 'Result updated successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'User not found']);
    }
}
