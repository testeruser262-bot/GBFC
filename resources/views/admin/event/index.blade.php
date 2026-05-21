@extends('layouts.app')
    @section('title', 'Event List')
    @section('content')

     <div class="card border-0 shadow-sm p-4 " style="border-radius: 20px;">
        <div class="d-flex justify-content-between align-items-center">
        <h4 class="page-heading">
            Events List
            </h4>
            <a href="/admin/event/create"
                class="btn gbsc_btn px-3 py-2 rounded-3">
                <i class="fa-solid fa-plus me-1"></i> Add
            </a> 
        </div>
    </div>

    <div class="custom-table-card mt-4 ">
        <div class="table-responsive">
            <table class="table mb-0 custom-table">
                <thead>
                    <tr>
                        <th class="text-uppercase" style="width:7%">SR NO</th>
                        <th class="text-uppercase" style="width:13%">Event Name</th>
                        <th class="text-uppercase" style="width:13%">Location</th>
                        <th class="text-uppercase" style="width:13%">Start Date</th>
                         <th class="text-uppercase" style="width:13%">End Date</th>
                        <th class="text-uppercase text-center px-4" style="width:10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @forelse($events as $key => $event)
                            <tr>
                                <td>{{ $key + 1 }}</td>

                                <td>{{ $event->name ?? '-' }}</td>

                                <td>{{ $event->location ?? '-' }}</td>

                                <td>{{ $event->startDate ?? '-' }}</td>

                                <td>{{ $event->endDate ?? '-' }}</td>

                                <td class="text-center">

                                   <a href="{{ url('admin/event/edit/'.$event->eventId )}}" 
                                        title="Edit Event" class="text-primary text-decoration-none"> 
                                        <i class="fa fa-edit"></i> 
                                    </a> 
                                    <span 
                                        class="text-danger ms-2 delete_item"
                                        data-url="{{ url('admin/event/delete/'.$event->eventId  ) }}"
                                        style="cursor: pointer;">
                                        
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No Data Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </tbody>
            </table>
        </div>
    </div>


    @endsection