@extends('layouts.app')

@section('title', 'Create Sport')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
    <div class="d-flex justify-content-start align-items-center">

        <div>
            <a href="/admin/sports" class="text-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i>
            </a>
        </div>

        <div class="ms-3">
            <span class="fs-6 text-primary fw-bolder">Sport / Create</span><br/>
            <span class="fw-bold pt-3 fs-5">Create Sport</span>
        </div>

    </div>
</div>

<div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">
    <div class="card-body">

        <div class="d-flex align-items-center mb-4">
            <i class="fa-solid fa-futbol text-primary me-2 fs-5"></i>
            <h5 class="fw-bold mb-0" style="color: #001533;">
                Create Sport
            </h5>
        </div>

        <form action="{{ route('sport.store') }}" method="POST">
            @csrf 

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">
                        Sport Name
                    </label>

                    <input type="text"
                           name="sportName"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Sport Name"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text sportName_error"></label>
                </div>

            </div>

            <div class="mt-2">
                <button type="submit"
                        class="btn btn-primary fw-bold py-2 px-5 rounded-3 shadow-sm"
                        style="background-color: #002d72; border: none;">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>

<script src="{{ asset('js/sports-validation.js') }}"></script>

@endsection