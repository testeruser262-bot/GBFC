@extends('layouts.app')
    @section('title', 'Team List')
    @section('content')

    <div class="card border-0 shadow-sm p-4 " style="border-radius: 20px;">
        <div class="d-flex justify-content-between align-items-center">
        <h4 class="page-heading">
            Sports List
            </h4>
            <a href="/sport/create"
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
                        <th class="text-uppercase" style="width:10%">SR NO</th>
                        <th class="text-uppercase" style="width:60%">Sports Name</th>
                        <th class="text-uppercase text-center px-4" style="width:30%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sr = 0; @endphp
                    @forelse($data as $row)
                        @php $sr++; @endphp
                        <tr>
                            <td class="fw-normal">{{ $sr }}</td>
                            <td class="fw-normal">{{ $row->sportName }}</td>
                          
                            <td class="fw-normal text-center">
                                <a href="{{ url('sport/edit/'.$row->sportId  ) }}" 
                                    title="Edit Team" class="text-primary text-decoration-none"> 
                                    <i class="fa fa-edit"></i> 
                                </a> 
                                <span 
                                    class="text-danger ms-2 delete_item"
                                    data-url="{{ url('sport/delete/'.$row->sportId  ) }}"
                                    style="cursor: pointer;">
                                    
                                    <i class="fa fa-trash"></i>
                            </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection