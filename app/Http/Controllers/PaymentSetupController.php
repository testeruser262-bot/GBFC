<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentSetupController extends Controller
{
    // SHOW FORM
    public function create()
    {
        $payment = DB::table('tb_club_payment_setup')
            ->where('id', 1)
            ->first();

        return view('admin.paymentStucture.index', compact('payment'));
    }

    // STORE OR UPDATE
    public function store(Request $request)
    {
        $request->validate([
            'amount'         => 'required|numeric|min:1',
            'discount'       => 'required|numeric|min:0|max:100',
            'pay_later'      => 'required|in:0,1',
            'deposit_amount' => 'required|numeric|min:0',
        ]);

        $check = DB::table('tb_club_payment_setup')
            ->where('id', 1)
            ->first();

        if ($check) {

            // UPDATE
            DB::table('tb_club_payment_setup')
                ->where('id', 1)
                ->update([
                    'amount'     => $request->amount,
                    'discount'   => $request->discount,
                    'pay_later'  => $request->pay_later,
                    'deposit'    => $request->deposit_amount,
                    'updated_at' => now(),
                ]);

        } else {

            DB::table('tb_club_payment_setup')->insert([
                'id'         => 1,
                'amount'     => $request->amount,
                'discount'   => $request->discount,
                'pay_later'  => $request->pay_later,
                'deposit'    => $request->deposit_amount,
                'created_at' => now(),
                'updated_at' => now(),
                'status'     => 'Active',
            ]);
        }

        return redirect('/admin/payment')
            ->with('success', 'Payment Setup Saved Successfully')
            ->with('class', 'alert-success');
    }
}
