@extends('layouts.app')

    @section('title', 'Players Payment')

    @section('content')


          <div class="card border-0 shadow-sm p-4 " style="border-radius: 20px;">
            <div class="d-flex justify-content-between align-items-center">
            <h4 class="page-heading">
                <i class="fa-solid fa-user-tag me-2"></i> Players Payment
                </h4>
               
            </div>
        </div>

        <form method="GET" action="{{ url('/admin/reg-player-payment') }}" class="d-flex gap-2 mt-5">
            <div class="d-flex gap-4 align-items-center mb-4 w-100">
            <div class="w-50">
                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control w-100"
                    placeholder="Search users...">
            </div>
            <button type="submit" class="btn btn-primary">
                Search
            </button>
            </div>
        </form>

        <div class="custom-table-card mt-4 ">
            <div class="table-responsive">
                <table class="table mb-0 custom-table">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Txn ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th class="text-center">Amount($)</th>
                            <th class="text-center">Date</th>
                            <th class='text-center'>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sr = 0; @endphp
                        @forelse($data as $row)
                            @php $sr++; @endphp
                            <tr>
                                <td>{{ $sr }}</td>
                                
                                <td>{{ $row->transactionId }}</td>
                                <td class="text-capitalize">
                                    {{ ($row->firstName ?? 'Guest') . ' ' . ($row->lastName ?? '') }}
                                </td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone ?? '-' }}</td>
                                <td>{{ $row->age_group ?? '-' }}</td>
                                <td class='text-center'>{{ $row->netAmount ?? '-' }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}
                                </td>
                                <td class='text-success text-center'>{{ $row->status ?? '-' }}</td>
                                <td class="text-center text-success">
                                    <a href="{{ route('player-payment.download', $row->paymentId ) }}">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    No Data Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

          <!-- Pagination Footer (Matching image_476cde.png) -->
        <div class="card-table-footer-custom d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">

            {{-- Showing Info --}}
            <span class="text-muted small">
                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
            </span>

            {{-- Custom Pagination --}}
            <div class="d-flex align-items-center gap-2">

                {{-- Prev Button --}}
                <a href="{{ $data->previousPageUrl() }}"
                class="btn btn-sm btn-light border {{ $data->onFirstPage() ? 'disabled' : '' }}">
                    Prev
                </a>

                {{-- Page Info --}}
                <span class="small fw-bold">
                    Page {{ $data->currentPage() }} of {{ $data->lastPage() }}
                </span>

                {{-- Next Button --}}
                <a href="{{ $data->nextPageUrl() }}"
                class="btn btn-sm btn-light border {{ !$data->hasMorePages() ? 'disabled' : '' }}">
                    Next
                </a>

            </div>

        </div>

    @endsection