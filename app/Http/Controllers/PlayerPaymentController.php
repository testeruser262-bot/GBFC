<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerPaymentController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('tb_club_payment')
            ->join('tb_club_users', 'tb_club_payment.userId', '=', 'tb_club_users.userId')
            ->select(
                'tb_club_payment.paymentId',
                'tb_club_payment.transactionId',
                'tb_club_payment.netAmount',
                'tb_club_payment.date',
                'tb_club_payment.email',
                'tb_club_payment.status',
                'tb_club_users.firstName',
                'tb_club_users.lastName',
                'tb_club_users.phone',
                'tb_club_users.age_group'
            );

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('tb_club_users.firstName', 'like', "%$search%")
                    ->orWhere('tb_club_users.lastName', 'like', "%$search%")
                    ->orWhere('tb_club_payment.transactionId', 'like', "%$search%")
                    ->orWhere('tb_club_payment.email', 'like', "%$search%");
            });
        }

        $data = $query
            ->orderBy('tb_club_payment.paymentId', 'DESC')
            ->paginate(10)
            ->appends($request->all());

        return view('admin.playerPayment.index', compact('data'));
    }

    public function download($id)
    {
        $data = DB::table('tb_club_payment')
            ->join('tb_club_users', 'tb_club_payment.userId', '=', 'tb_club_users.userId')
            ->select(
                'tb_club_payment.paymentId',
                'tb_club_payment.transactionId',
                'tb_club_payment.netAmount',
                'tb_club_payment.date',
                'tb_club_payment.email',
                'tb_club_payment.status',
                'tb_club_users.firstName',
                'tb_club_users.lastName',
                'tb_club_users.phone',
                'tb_club_users.age_group'
            )
            ->where('tb_club_payment.paymentId', $id)
            ->first();

        if (! $data) {
            abort(404, 'Payment not found');
        }

        // 1. Load the view file
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.player-payment', compact('data'));

        // 2. CRITICAL FIX: Set paper size and force print layout styles
        $pdf->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'defaultMediaType'     => 'print', // This forces fixed headers/footers to appear at the page limits
            ]);

        return $pdf->download('payment-' . $id . '.pdf');
    }
}
