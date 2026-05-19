@extends('layouts.app')

@section('title', 'Payment')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
    <div class="d-flex justify-content-start align-items-center">
        <div class="ms-3">
            <span class="fs-6 text-primary fw-bolder">Payment / Create</span><br/>
            <span class="fw-bold pt-3 fs-5">Payment Setup</span>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">
    <div class="card-body">

        <div class="d-flex align-items-center mb-4">
            <i class="fa-solid fa-money-bill text-primary me-2 fs-5"></i>
            <h5 class="fw-bold mb-0" style="color: #001533;">
                Create Payment
            </h5>
        </div>

        {{-- <form action="{{ route('payments.store') }}" method="POST">
            @csrf --}}

            <div class="row">

                <!-- Amount -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Amount</label>
                    <input type="number"
                           name="amount"
                           class="form-control py-3 px-3 mt-1"
                           placeholder="Enter Amount"
                           style="background-color:#f8f9fa; border-radius:12px;font-size: 13px;">
                    <label class="error_text amount_error"></label>
                </div>

                <!-- Discount -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Discount (%)</label>
                    <input type="number"
                           name="discount"
                           class="form-control py-3 px-3 mt-1"
                           placeholder="Enter Discount"
                           style="background-color:#f8f9fa; border-radius:12px;">
                    <label class="error_text discount_error"></label>
                </div>

                <!-- Pay Later -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Pay Later</label>

                    <select name="pay_later"
                            class="form-select py-3 px-3 mt-1"
                            style="background-color:#f8f9fa; border-radius:12px; font-size:13px;">
                        <option value="">Select Option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                    <label class="error_text pay_later_error"></label>
                </div>

                 <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Deposit Amount</label>
                    <input type="number"
                           name="deposit_amount"
                           class="form-control py-3 px-3 mt-1"
                           placeholder="Enter Deposit Amount"
                           style="background-color:#f8f9fa; border-radius:12px;">
                    <label class="error_text discount_error"></label>
                </div>

            </div>

            <div class="mt-2">
                <button type="submit"
                        class="btn btn-primary fw-bold py-2 px-5 rounded-3 shadow-sm"
                        style="background-color:#002d72; border:none;">
                    Save Payment
                </button>
            </div>

        {{-- </form> --}}

    </div>
</div>

@endsection