@extends('layouts.app')

@section('title', 'Update Sport')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
    <div class="d-flex justify-content-start align-items-center">

        <div>
            <a href="/admin/sports" class="text-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i>
            </a>
        </div>

        <div class="ms-3">
            <span class="fs-6 text-primary fw-bolder">Sport / Update</span><br/>
            <span class="fw-bold pt-3 fs-5">Update Sport</span>
        </div>

    </div>
</div>

<div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">
    <div class="card-body">

        <div class="d-flex align-items-center mb-4">
            <i class="fa-solid fa-futbol text-primary me-2 fs-5"></i>
            <h5 class="fw-bold mb-0" style="color: #001533;">
                Update Sport
            </h5>
        </div>

        <form id="updateSportForm"
              action="{{ route('sport.update', $sport->sportId) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <!-- Sport Name -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Sport Name
                    </label>

                    <input type="text"
                           name="sportName"
                           value="{{ $sport->sportName }}"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Sport Name"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                     <label class="error_text sportName_error text-danger">
                        @error('sportName')
                            {{ $message }}
                        @enderror
                    </label>

                </div>

            </div>

            <!-- Submit -->
            <div class="mt-2">
                <button type="submit"
                        class="btn btn-primary fw-bold py-2 px-5 rounded-3 shadow-sm"
                        style="background-color: #002d72; border: none;">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>

<script src="{{ asset('js/sports-validation.js') }}"></script>

@endsection