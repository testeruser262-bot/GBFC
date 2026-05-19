<div class="sidebar">

    <div class="sidebar-logo">
        <img src="{{ asset('assets/site/greater_logo.png') }}"
             alt="Logo"
             class="sidebar-logo-image">
    </div>

    <div class="sidebar-menu">

        <!-- Sports -->
        <a href="/sports" 
          class="{{ request()->is('sport*') || request()->is('/') ? 'active' : '' }}">
            <i class="fa-solid fa-futbol"></i>
            Sports
        </a>


        <!-- Teams -->
        <a href="/teams"
           class="{{ request()->is('team*') ? 'active' : '' }}">
            <i class="fa-solid fa-people-group me-2"></i>
            Teams
        </a>

        <!-- Players -->
        <a href="/players"
             class="{{ request()->is('player*') ? 'active' : '' }}">
            <i class="fa-solid fa-user me-2"></i>
            Players
        </a>


        <!-- Payment -->

        <a href="/payment" 
          class="{{ request()->is('payment*') ? 'active' : '' }}">
            <i class="fa-solid fa-credit-card"></i>
            Payment SetUp
        </a>

    </div>

</div>