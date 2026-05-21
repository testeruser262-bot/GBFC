@extends('layouts.app')

@section('title', 'Players List')

@section('content')

<div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">

    <div class="d-flex justify-content-between align-items-center">

        <h4 class="page-heading">
            Players List
        </h4>

        <a href="/admin/players/create"
           class="btn gbsc_btn px-3 py-2 rounded-3">

            <i class="fa-solid fa-plus me-1"></i> Add

        </a>

    </div>

</div>

<div class="custom-table-card mt-4">

    <div class="table-responsive">

        <table class="table mb-0 custom-table">

            <thead>

                <tr>

                    <th class="text-uppercase" style="width:7%">
                        SR NO
                    </th>

                    <th class="text-uppercase" style="width:10%">
                        Image
                    </th>

                    <th class="text-uppercase" style="width:13%">
                        Player Name
                    </th>

                    <th class="text-uppercase" style="width:15%">
                        Email
                    </th>

                    <th class="text-uppercase" style="width:10%">
                        Phone No.
                    </th>

                    <th class="text-uppercase" style="width:10%">
                        D.O.B
                    </th>

                    <th class="text-uppercase" style="width:10%">
                        Gender
                    </th>

                    <th class="text-uppercase" style="width:15%">
                        Parent Details
                    </th>

                    <th class="text-uppercase text-center" style="width:10%">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

                @php $sr = 0; @endphp

                @forelse($data as $row)

                    @php $sr++; @endphp

                    <tr>

                        <!-- SR NO -->
                        <td class="fw-normal align-middle">
                            {{ $sr }}
                        </td>

                        <!-- IMAGE -->
                        <td class="align-middle">

                            @if($row->image)

                                <img src="{{ asset('uploads/players/'.$row->image) }}"
                                     alt="Player Image"
                                     width="55"
                                     height="55"
                                     style="object-fit: cover; border-radius: 50%; border:2px solid #e9ecef;">

                            @else

                                <div class="d-flex justify-content-center align-items-center"
                                     style="width:55px;
                                            height:55px;
                                            border-radius:50%;
                                            background:#f1f3f5;">

                                    <i class="fa-solid fa-user text-secondary"></i>

                                </div>

                            @endif

                        </td>

                        <!-- PLAYER NAME -->
                        <td class="fw-normal align-middle">

                            <div class="fw-semibold">
                                {{ $row->firstName ? $row->firstName : 'Guest' }}
                                {{ $row->lastName }}
                            </div>

                        </td>

                        <!-- EMAIL -->
                        <td class="fw-normal align-middle">
                            {{ $row->email }}
                        </td>

                        <!-- PHONE -->
                        <td class="fw-normal align-middle">
                            {{ $row->phone ? $row->phone : '-' }}
                        </td>

                        <!-- DOB -->
                        <td class="fw-normal align-middle">

                            {{ $row->dob 
                                ? \Carbon\Carbon::parse($row->dob)->format('d-m-Y')
                                : '-' }}

                        </td>

                        <!-- GENDER -->
                        <td class="fw-normal align-middle">
                            {{ $row->gender ? $row->gender : '-' }}
                        </td>

                        <!-- PARENT DETAILS -->
                        <td class="fw-normal align-middle">

                            <div class="fw-semibold text-dark">
                                {{ $row->parentName ? $row->parentName : '-' }}
                            </div>

                            <div class="text-secondary small mt-1">
                                {{ $row->parentContact ? $row->parentContact : '-' }}
                            </div>

                        </td>

                        <!-- ACTIONS -->
                        <td class="fw-normal text-center align-middle">

                            <!-- Edit -->
                            <a href="{{ url('/admin/player/edit/'.$row->playerId ) }}"
                               title="Edit Player"
                               class="text-primary text-decoration-none">

                                <i class="fa fa-edit"></i>

                            </a>

                            <!-- Delete -->
                            <span class="text-danger ms-3 delete_item"
                                  data-url="{{ url('admin/player/delete/'.$row->playerId ) }}"
                                  style="cursor: pointer;">

                                <i class="fa fa-trash"></i>

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9"
                            class="text-center py-4 text-muted">

                            No Data Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection