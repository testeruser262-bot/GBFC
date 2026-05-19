@extends('layouts.app')

@section('title', 'Create Team')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
    <div class="d-flex justify-content-start align-items-center">

        <div>
            <a href="/teams" class="text-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i>
            </a>
        </div>

        <div class="ms-3">
            <span class="fs-6 text-primary fw-bolder">Teams / Create</span><br/>
            <span class="fw-bold pt-3 fs-5">Create Team</span>
        </div>

    </div>
</div>

<div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">
    <div class="card-body">

        <!-- Section Title -->
        <div class="d-flex align-items-center mb-4">
            <i class="fa-solid fa-user text-primary me-2 fs-5"></i>
            <h5 class="fw-bold mb-0" style="color: #001533;">
                Create Team
            </h5>
        </div>

        <form action="{{ route('team.store') }}" method="POST">
            @csrf 

            <div class="row">

                <!-- Team Name -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">
                        Team Name
                    </label>

                    <input type="text"
                           name="team_name"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Team Name"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text team_name_error"></label>
                </div>

                

                <!-- Age Group -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">
                        Age Group
                    </label>

                    <select name="age_group"
                            class="form-select form-input-custom py-3 px-3 mt-1"
                            style="background-color: #f8f9fa; border-radius: 12px; font-size: 13px;">

                        <option value="">Select Age Group</option>
                        <option value="U10">U10</option>
                        <option value="U12">U12</option>
                        <option value="U14">U14</option>
                        <option value="U16">U16</option>
                        <option value="U18">U18</option>

                    </select>

                    <label class="error_text age_group_error"></label>
                </div>

                <!-- Gender -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">
                        Gender
                    </label>

                    <select name="gender"
                            class="form-select form-input-custom py-3 px-3 mt-1"
                            style="background-color: #f8f9fa; border-radius: 12px; font-size: 13px;">

                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Coed">Coed</option>

                    </select>

                    <label class="error_text gender_error"></label>
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">
                        Status
                    </label>

                    <select name="status"
                            class="form-select form-input-custom py-3 px-3 mt-1"
                            style="background-color: #f8f9fa; border-radius: 12px; font-size: 13px;">

                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>

                    </select>

                    <label class="error_text status_error"></label>
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bolder">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control form-input-custom px-3 mt-1"
                              placeholder="Enter description"
                              rows="4"
                              style="background-color: #f8f9fa; border-radius: 12px; min-height: 120px;"></textarea>

                    <label class="error_text description_error"></label>
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

<script src="{{ asset('js/team-validation.js') }}"></script>

@endsection