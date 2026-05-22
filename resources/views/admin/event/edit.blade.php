@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">

    <div class="d-flex justify-content-start align-items-center">

        <div>
            <a href="/admin/event" class="text-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i>
            </a>
        </div>

        <div class="ms-3">
            <span class="fs-6 text-primary fw-bolder">
                Event / Edit
            </span>
            <br/>

            <span class="fw-bold pt-3 fs-5">
                Edit Event
            </span>
        </div>

    </div>

</div>

<div class="card border-0 shadow-sm p-4 mt-4" style="border-radius: 20px;">

    <div class="card-body">

        <!-- SECTION TITLE -->
        <div class="d-flex align-items-center mb-4">

            <i class="fa-solid fa-calendar text-primary me-2 fs-5"></i>

            <h5 class="fw-bold mb-0" style="color: #001533;">
                Edit Event
            </h5>

        </div>

        <!-- FORM -->
        <form id="eventForm"
              action="{{ url('admin/event/update/'.$event->eventId) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <!-- EVENT NAME -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Event Name
                    </label>

                    <input type="text"
                           name="event_name"
                           value="{{ $event->name ?? '' }}"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Event Name"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text event_name_error"></label>

                </div>

                <!-- CATEGORY -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Select Category
                    </label>

                    <select name="category"
                            class="form-select form-input-custom py-3 px-3 mt-1"
                            style="background-color: #f8f9fa; border-radius: 12px; font-size: 13px;">

                        <option value="">
                            Select Category
                        </option>

                        <option value="Camp"
                            {{ ($event->category ?? '') == 'Camp' ? 'selected' : '' }}>
                            Camp
                        </option>

                        <option value="Clinic"
                            {{ ($event->category ?? '') == 'Clinic' ? 'selected' : '' }}>
                            Clinic
                        </option>

                        <option value="Tournament"
                            {{ ($event->category ?? '') == 'Tournament' ? 'selected' : '' }}>
                            Tournament
                        </option>

                        <option value="League"
                            {{ ($event->category ?? '') == 'League' ? 'selected' : '' }}>
                            League
                        </option>

                        <option value="Membership"
                            {{ ($event->category ?? '') == 'Membership' ? 'selected' : '' }}>
                            Membership
                        </option>

                    </select>

                    <label class="error_text category_error"></label>

                </div>

                <!-- LOCATION -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Location
                    </label>

                    <input type="text"
                           name="location"
                           value="{{ $event->location ?? '' }}"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Enter Location"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text location_error"></label>

                </div>

                <!-- PAY LATER -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Pay Later
                    </label>

                    <select name="pay_later"
                            class="form-select py-3 px-3 mt-1"
                            style="background-color:#f8f9fa; border-radius:12px; font-size:13px;">

                        <option value="">
                            Select Option
                        </option>

                        <option value="1"
                            {{ ($event->payLater ?? '') == 1 ? 'selected' : '' }}>
                            Yes
                        </option>

                        <option value="0"
                            {{ ($event->payLater ?? '') == 0 ? 'selected' : '' }}>
                            No
                        </option>

                    </select>

                    <label class="error_text pay_later_error"></label>

                </div>

                <!-- START DATE -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Start Date
                    </label>

                    <input type="text"
                           name="start_date"
                           id="start_date"
                           autocomplete="off"
                           value="{{ $event->startDate ?? '' }}"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Select Start Date"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text start_date_error"></label>

                </div>

                <!-- END DATE -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        End Date
                    </label>

                    <input type="text"
                           name="end_date"
                           id="end_date"
                           autocomplete="off"
                           value="{{ $event->endDate ?? '' }}"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           placeholder="Select End Date"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text end_date_error"></label>

                </div>

                <!-- DESCRIPTION -->
                <div class="col-md-12 mb-4">

                    <label class="form-label fw-bolder">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control form-input-custom px-3 mt-1"
                              placeholder="Enter Description"
                              rows="4"
                              style="background-color: #f8f9fa; border-radius: 12px; min-height: 120px;">{{ $event->description ?? '' }}</textarea>

                    <label class="error_text description_error"></label>

                </div>

                <!-- EVENT IMAGE -->
                <div class="col-md-6 mb-4">

                    <label class="form-label fw-bolder">
                        Event Image
                    </label>

                    <input type="file"
                           name="event_image"
                           id="event_image"
                           accept="image/*"
                           class="form-control form-input-custom py-3 px-3 mt-1"
                           style="background-color: #f8f9fa; border-radius: 12px;">

                    <label class="error_text event_image_error"></label>

                    <!-- IMAGE PREVIEW -->
                    <div class="mt-3">

                       @if(!empty($event->image))

                            <img id="imagePreview"
                                src="{{ asset('uploads/event-images/'.$event->image) }}"
                                width="180"
                                height="180"
                                class="rounded shadow-sm"
                                style="object-fit: cover; border-radius: 12px;">

                            <div id="dummyImage" class="d-none"></div>

                        @else

                            <img id="imagePreview"
                                src=""
                                class="d-none rounded shadow-sm"
                                style="width:180px;
                                        height:180px;
                                        object-fit:cover;
                                        border-radius:12px;">

                            <div id="dummyImage"
                                class="d-flex align-items-center justify-content-center rounded shadow-sm"
                                style="width: 180px;
                                        height: 180px;
                                        background-color: #f8f9fa;
                                        border: 2px dashed #d1d5db;">

                                <i class="fa-solid fa-image text-secondary"
                                style="font-size: 45px;"></i>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

            <!-- SUBMIT -->
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


<!-- VALIDATION JS -->
<script src="{{ asset('js/event-validation.js') }}"></script>

@endsection