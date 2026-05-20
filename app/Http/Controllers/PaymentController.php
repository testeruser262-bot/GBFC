<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        return view('frontend.payment', [
            'stripeKey' => config('services.stripe.key'),
        ]);
    }

    public function charge(Request $request)
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        try {

            $charge = Charge::create([
                "amount"      => 1000,
                "currency"    => "usd",
                "source"      => $request->stripeToken,
                "description" => "First Laravel Stripe Payment",
            ]);

            $amount        = 1000;
            $processingFee = 100;
            $netAmount     = $amount - $processingFee;

            // 3. INSERT INTO DATABASE
            DB::table('tb_club_payment')->insert([
                'userId'        => session('userId') ?? 1,
                'transactionId' => $charge->id,
                'email'         => session('email') ?? 'test@example.com',
                'amount'        => $amount,
                'processingFee' => $processingFee,
                'netAmount'     => $netAmount,
                'date'          => now(),
                'status'        => 'success',
            ]);

            return redirect('/club-thanks');

            // return back()->with('success', 'Payment Successful');

        } catch (\Exception $e) {

            // SAVE FAILED PAYMENT TOO (optional)
            DB::table('tb_club_payment')->insert([
                'userId'        => Auth::id() ?? 1,
                'email'         => $request->email ?? 'unknown',
                'amount'        => 1000,
                'processingFee' => 0,
                'netAmount'     => 0,
                'date'          => now(),
                'status'        => 'failed',
            ]);

            return back()->with('error', $e->getMessage());
        }
    }
}
