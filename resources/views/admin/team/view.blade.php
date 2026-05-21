@extends('layouts.app')

@section('title', 'Team Details')

@section('content')

@php  
   $id = request()->segment(4); 
   $activeTab = request('tab', 'calendar');
@endphp

<div class="container-fluid">

    <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
        <div class="d-flex justify-content-start align-items-center">

            <div>
                <a href="/admin/teams" class="text-secondary text-decoration-none">
                    <i class="fa-solid fa-arrow-left fs-5"></i>
                </a>
            </div>

            <div class="ms-3">
                <span class="fs-6 text-primary fw-bolder">
                    Team / View
                </span>
                <br/>

                <span class="fw-bold fs-5">
                    Manage calendar, games, fees and roster details.
                </span>
            </div>

        </div>
    </div>

    <div class="card border-0 shadow-sm mt-4" style="border-radius: 20px;">

        <div class="card-header bg-white border-0 pt-4 px-4">

            <ul class="nav nav-tabs border-0 text-secondary" id="teamTabs" role="tablist">

                <li class="nav-item me-2 fw-bolder" role="presentation">
                    <button class="nav-link {{ $activeTab == 'calendar' ? 'active text-primary' : 'text-secondary' }}"
                            id="calendar-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#calendar"
                            type="button">
                        <i class="fa fa-calendar me-1"></i>
                        Calendar
                    </button>
                </li>

                <li class="nav-item me-2 fw-bolder" role="presentation">
                    <button class="nav-link {{ $activeTab == 'games' ?  'active text-primary' : 'text-secondary'  }}"
                            id="games-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#games"
                            type="button">
                        <i class="fa fa-futbol me-1"></i>
                        Games
                    </button>
                </li>

                <li class="nav-item me-2 fw-bolder" role="presentation">
                    <button class="nav-link {{ $activeTab == 'fees' ?  'active text-primary' : 'text-secondary'  }}"
                            id="fees-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#fees"
                            type="button">
                        <i class="fa fa-money-bill me-1"></i>
                        Fees
                    </button>
                </li>

                <li class="nav-item fw-bolder" role="presentation">
                    <button class="nav-link {{ $activeTab == 'roster' ?  'active text-primary' : 'text-secondary'  }}"
                            id="roster-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#roster"
                            type="button">
                        <i class="fa fa-users me-1"></i>
                        Roster
                    </button>
                </li>

            </ul>

        </div>

        <div class="card-body p-4">

            <div class="tab-content">

                {{-- CALENDAR --}}
                <div class="tab-pane fade {{ $activeTab == 'calendar' ? 'show active' : '' }}" id="calendar">

                    <div class="row">
                        <div class="col-12">

                            @php
                                $currentMonth = null;
                            @endphp

                            @forelse($events as $event)

                                @php
                                    $start = \Carbon\Carbon::parse($event->startDate);
                                    $end = \Carbon\Carbon::parse($event->endDate);
                                    $month = $start->format('F Y');
                                @endphp

                                @if($currentMonth !== $month)
                                    <div class="text-center my-4">
                                        <span class="badge bg-light text-dark border px-3 py-2 fw-bold text-uppercase">
                                            {{ $month }}
                                        </span>
                                    </div>
                                    @php $currentMonth = $month; @endphp
                                @endif

                                <div class="card border-0 shadow-sm rounded-4 mb-3">
                                    <div class="card-body py-3">

                                        <div class="row align-items-center">

                                            <div class="col-md-2 text-center border-end">
                                                <div class="text-uppercase text-muted small fw-semibold">
                                                    {{ $start->format('D') }}
                                                </div>
                                                <div class="fs-2 fw-bold text-primary lh-1">
                                                    {{ $start->format('d') }}
                                                </div>
                                                <div class="text-muted small">
                                                    {{ $start->format('M') }}
                                                </div>
                                            </div>

                                            <div class="col-md-7 px-3">

                                                <h6 class="fw-bold mb-1 text-dark">
                                                    {{ $event->name }}
                                                </h6>

                                                <div class="text-muted small mb-1">
                                                    <i class="fa fa-map-marker-alt me-1"></i>
                                                    {{ $event->location }}
                                                </div>

                                                <div class="text-secondary small mb-2">
                                                    <i class="fa fa-clock me-1"></i>
                                                    {{ $start->format('h:i A') }} - {{ $end->format('h:i A') }}
                                                </div>

                                                <div class="text-muted small">
                                                    {{ \Illuminate\Support\Str::limit($event->description, 120) }}
                                                </div>

                                            </div>

                                            <div class="col-md-3 text-md-end mt-2 mt-md-0">

                                                <div class="mb-2">
                                                    <span class="badge bg-primary px-3 py-2">
                                                        Event
                                                    </span>
                                                </div>

                                                <div class="text-muted small">
                                                    <i class="fa fa-calendar me-1"></i>
                                                    {{ $start->format('l, d M Y') }}
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            @empty

                                <div class="text-center py-5 text-muted">
                                    <i class="fa fa-calendar-times fa-2x mb-2"></i>
                                    <div>No events found</div>
                                </div>

                            @endforelse

                        </div>
                    </div>

                </div>

                {{-- GAMES --}}
                <div class="tab-pane fade {{ $activeTab == 'games' ? 'show active' : '' }}" id="games">
                    <div class="custom-table-card">
                        <div class="table-responsive">
                            <table class="table mb-0 custom-table">
                                <thead>
                                    <tr>
                                        <th>SR NO</th>
                                        <th>Opponent Team</th>
                                        <th>Match Date</th>
                                        <th>Score</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lions FC</td>
                                        <td>25-05-2026</td>
                                        <td>2 - 1</td>
                                        <td class="text-center">
                                            <a href="#" class="text-primary"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="text-danger ms-2"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- FEES --}}
                <div class="tab-pane fade {{ $activeTab == 'fees' ? 'show active' : '' }}" id="fees">
                    <div class="custom-table-card">
                        <div class="table-responsive">
                            <table class="table mb-0 custom-table">
                                <thead>
                                    <tr>
                                        <th>SR NO</th>
                                        <th>Player Name</th>
                                        <th>Fee Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Smith</td>
                                        <td>Registration</td>
                                        <td>$100</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- ROSTER --}}
                <div class="tab-pane fade {{ $activeTab == 'roster' ? 'show active' : '' }}" id="roster">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">Players List</h5>

                        <button type="button" class="btn btn-primary  btn-sm" id="gbfc_clus_open-modal-btn" style="background: linear-gradient(135deg, #002d72, #0056d6);">
                            <i class="fa fa-plus me-1"></i> Add Player
                        </button>
                    </div>

                    <div class="custom-table-card">
                        <div class="table-responsive">
                            <table class="table mb-0 custom-table">
                                <thead>
                                    <tr>
                                        <th>SR NO</th>
                                        <th>Player Name</th>
                                        <th>Email</th>
                                        <th>DOB</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($teamPlayers as $key => $player)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $player->firstName }} {{ $player->lastName }}</td>
                                            <td>{{ $player->email }}</td>
                                            <td>{{ $player->dob }}</td>
                                            <td class="text-center">
                                                <span class="text-danger delete_item"
                                                    data-url="{{ url('admin/team/player/remove/'.$player->rel_id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                No players found in this team
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- SAME MODAL KEPT AS IT IS --}}
<div class="gbfc_clus_modal-overlay" id="gbfc_clus_player-popup">
    <div class="gbfc_clus_modal-box">

        <div class="gbfc_clus_modal-header">
            <h5 class="fw-bold m-0">Add Players to Roster</h5>
            <button type="button" class="gbfc_clus_close-btn" id="gbfc_clus_close-x-btn">&times;</button>
        </div>

        <form action="{{ route('admin.team.addPlayers', $id) }}" method="POST">
            @csrf

            <div class="gbfc_clus_modal-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Select Multiple Players</label>

                    <select name="players[]" id="players" class="form-control" multiple>
                        @foreach ($players as $player)
                            <option value="{{ $player->playerId }}">
                                {{ $player->firstName }} ({{ $player->email }})
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="gbfc_clus_modal-footer">
                <button type="button" class="btn btn-light" id="gbfc_clus_close-cancel-btn">Cancel</button>
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #002d72, #0056d6);">Save Changes</button>
            </div>

        </form>

    </div>
</div>

<script>
$(document).ready(function () {

    // Choices init
    const element = $('#players')[0];
    new Choices(element, {
        removeItemButton: true,
        searchEnabled: true,
        placeholder: true,
        placeholderValue: 'Search and select players...',
        shouldSort: false,
    });

    const $modalOverlay = $('#gbfc_clus_player-popup');

    $('#gbfc_clus_open-modal-btn').on('click', function () {
        $modalOverlay.css('display', 'flex');
        setTimeout(() => $modalOverlay.addClass('gbfc_clus_show'), 10);
    });

    $('#gbfc_clus_close-x-btn, #gbfc_clus_close-cancel-btn').on('click', function () {
        $modalOverlay.removeClass('gbfc_clus_show');
        setTimeout(() => $modalOverlay.css('display', 'none'), 250);
    });

    $(window).on('click', function (event) {
        if ($(event.target).is($modalOverlay)) {
            $modalOverlay.removeClass('gbfc_clus_show');
            setTimeout(() => $modalOverlay.css('display', 'none'), 250);
        }
    });

    // ✅ URL TAB SUPPORT (ONLY ADDITION)
    function setTab(tab) {
        if (!tab) tab = 'calendar';

        let el = document.querySelector(`[data-bs-target="#${tab}"]`);
        if (el) new bootstrap.Tab(el).show();
    }

    const urlParams = new URLSearchParams(window.location.search);
    setTab(urlParams.get('tab'));

    $('[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        let tab = $(e.target).data('bs-target').replace('#', '');
        const newUrl = window.location.pathname + '?tab=' + tab;
        window.history.pushState({}, '', newUrl);
    });

    window.onpopstate = function () {
        const urlParams = new URLSearchParams(window.location.search);
        setTab(urlParams.get('tab'));
    };

});
</script>

@endsection