<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        if (auth()->check()) {
            if (auth()->user()->verified != 1) {
                return redirect()->route('verify')->with('success','The verification code has been sent');
            }
        }

        $bank = DB::table('tb_bank')->where('id_user', auth()->user()->id)->where('level' ,'user')->first();
        $reff = DB::table('tb_refferal')->where('user_id', auth()->user()->id)->where('agent_id', auth()->user()->agent_id)->first();
        return view('frontend.profile',compact('reff','bank'));
    }

    public function update(Request $request)
    {
        if(Hash::check($request->oldPassword,auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'success' => true,
                'code' => 200,
                'error' => __('public.sukses'),
                'message' => __('public.reset')
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 404,
                'error' => __('public.perhatian'),
                'message' => __('public.incorrect')
            ]);
        }
    }
}

