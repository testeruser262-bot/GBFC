@extends('layouts.app')

@section('title', 'Create Player')

@section('content')

    

    <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
        <div class="d-flex justify-content-start align-items-center ">

            <div>
                <a href="/admin/players" class="text-secondary"> <i class="fa-solid fa-arrow-left me-1"></i></a>
            </div>

            <div class="ms-3">
                <span class="fs-6 text-primary fw-bolder">Player / Create </span><br/>
                <span class="fw-bold pt-3 fs-5">Create Player</spna>
            </div>

        </div>
    </div>

    <div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">
        <div class="card-body">

            <!-- Section Title -->
            <div class="d-flex align-items-center mb-4">
                <i class="fa-solid fa-user text-primary me-2 fs-5"></i>
                <h5 class="fw-bold mb-0" style="color: #001533;">
                    Create Player
                </h5>
            </div>

            <form action="{{ route('players.store') }}" method="POST">
                @csrf 

                <div class="row">

                    <!-- First Name -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bolder">
                            First Name
                        </label>

                        <input type="text"
                               name="first_name"
                               class="form-control form-input-custom py-3 px-3 mt-1"
                               placeholder="Enter First Name"
                               style="background-color: #f8f9fa; border-radius: 12px;">

                        <label class="error_text first_name_error"></label>
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bolder">
                            Last Name
                        </label>

                        <input type="text"
                               name="last_name"
                               class="form-control form-input-custom py-3 px-3 mt-1"
                               placeholder="Enter Last Name"
                               style="background-color: #f8f9fa; border-radius: 12px;">

                        <label class="error_text last_name_error"></label>
                    </div>


                    <!-- Email -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bolder">
                            Email Address
                        </label>

                        <input type="email"
                            name="email"
                            class="form-control form-input-custom py-3 px-3 mt-1"
                            placeholder="Enter Email Address"
                            style="background-color: #f8f9fa; border-radius: 12px;">

                        <label class="error_text email_error"></label>
                    </div>

                    <!-- Phone Number -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bolder">
                            Phone Number
                        </label>

                        <input type="text"
                            name="phone"
                            class="form-control form-input-custom py-3 px-3 mt-1"
                            placeholder="Enter Phone Number"
                            style="background-color: #f8f9fa; border-radius: 12px;">

                        <label class="error_text phone_error"></label>
                    </div>
                    <!-- Date of Birth -->
                    <div class="col-md-6 mb-4 mb-md-2">
                        <label class="form-label fw-bolder">
                            Date of Birth
                        </label>

                        <input type="date"
                               name="dob"
                               class="form-control form-input-custom py-3 px-3 mt-1"
                               style="background-color: #f8f9fa; border-radius: 12px;">

                        <label class="error_text dob_error"></label>
                    </div>

                    <!-- Gender Dropdown -->
                    <div class="col-md-6 mb-4 mb-md-2">
                        <label class="form-label fw-bolder">
                            Gender
                        </label>

                        <select name="gender"
                                class="form-select form-input-custom py-3 px-3 mt-1"
                                style="background-color: #f8f9fa; border-radius: 12px; font-size: 13px;">

                            <option value="">
                                Select Gender
                            </option>

                            <option value="Male">
                                Male
                            </option>

                            <option value="Female">
                                Female
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                        <label class="error_text gender_error"></label>
                    </div>

                </div>

                <!-- Submit -->
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

  <script src="{{ asset('js/player-validation.js') }}"></script>

@endsection