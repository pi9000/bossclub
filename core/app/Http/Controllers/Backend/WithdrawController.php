<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Bonus;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Api\SeamlesWsController;

class WithdrawController extends Controller
{

    public function index(Request $request)
    {
        $transaction = Transaction::where('transaksi', 'Withdraw')->where('status', 'Pending')->orderBy('created_at', 'desc')->get();
        return view('backend.withdraw.pending', compact('transaction'));
    }

    public function list(Request $request)
    {
        $transaction = Transaction::where('transaksi', 'Withdraw')->orderBy('created_at', 'desc');
        if ($request->ajax()) {
            return DataTables::of($transaction)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 'Pending') {
                        $statusbtn = '<span class="badge bg-label-warning rounded-pill">Pending</span>';
                    } elseif ($row->status == 'Ditolak') {
                        $statusbtn = '<span class="badge bg-label-danger rounded-pill">Rejected</span>';
                    } else {
                        $statusbtn = '<span class="badge bg-label-success rounded-pill">Active</span>';
                    }
                    return $statusbtn;
                })
                ->addColumn('bank_user', function ($row) {
                    $admin_btn = $row->dari_bank;
                    return $admin_btn;
                })
                ->addColumn('created_at', function ($row) {
                    $cbtrn = $row->created_at;
                    return $cbtrn;
                })
                ->addColumn('total', function ($row) {
                    $amounts = 'MYR' . number_format($row->total);
                    return $amounts;
                })
                ->rawColumns(['status', 'created_at', 'total', 'bank_user'])
                ->make(true);
        }

        return view('backend.withdraw.list');
    }

    public function approve($id, Request $request)
    {
        $transaction = Transaction::find($id);
        $transaction->transaction_by = $request->operator;
        $transaction->status = 'Sukses';
        $transaction->save();

        if ($transaction->metode == 'Main Wallet') {
            $user = User::find($transaction->id_user);

            $user->balance = $user->balance + $transaction->total;
            $user->save();
        }

        return back()->with('success', 'Withdraw Sucesssfully approved');
    }

    public function reject($id, Request $request)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 'Ditolak';
        $transaction->transaction_by = $request->operator;
        $transaction->save();
        $user = User::find($transaction->id_user);

        $user->balance = $user->balance + $transaction->total;
        $user->save();

        return back()->with('success', 'Withdraw Sucesssfully rejected');
    }
}
