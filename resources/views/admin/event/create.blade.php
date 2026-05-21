@extends('layouts.app')

@section('title', 'Create Event')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
    <div class="d-flex justify-content-start align-items-center">

        <div>
            <a href="/admin/event" class="text-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i>
            </a>
        </div>

        <div class="ms-3">
            <span class="fs-6 text-primary fw-bolder">Event / Create</span><br/>
            <span class="fw-bold pt-3 fs-5">Create Event</span>
        </div>

    </div>
</div>

<div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">
    <div class="card-body">

        <!-- Section Title -->
        <div class="d-flex align-items-center mb-4">
            <i class="fa-solid fa-calendar text-primary me-2 fs-5"></i>
            <h5 class="fw-bold mb-0" style="color: #001533;">
                Create Event
            </h5>
        </div>

        <!-- ✅ FIXED ROUTE -->
      
        <form id="eventForm" action="{{ route('event.store') }}" method="POST">
            @csrf 

            <div class="row">

                <!-- Event Name -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Event Name</label>

                    <input type="text"
                           name="event_name"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Event Name"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text event_name_error"></label>
                </div>

                <!-- Location -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Location</label>

                    <input type="text"
                           name="location"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Location"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text location_error"></label>
                </div>

                <!-- Start Date -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">Start Date</label>

                    <input type="date"
                           name="start_date"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text start_date_error"></label>
                </div>

                <!-- End Date -->
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bolder">End Date</label>

                    <input type="date"
                           name="end_date"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text end_date_error"></label>
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bolder">Description</label>

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

<!-- Optional: rename validation file -->
<script src="{{ asset('js/event-validation.js') }}"></script>

@endsection