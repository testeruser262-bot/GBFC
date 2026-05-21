<div class="sidebar">

    <div class="sidebar-logo">
        <img src="{{ asset('assets/site/greater_logo.png') }}"
             alt="Logo"
             class="sidebar-logo-image">
    </div>

    <div class="sidebar-menu">

          <!-- Event -->
        <a href="/admin/event" 
          class="{{ request()->is('admin/event*') || request()->is('/') ? 'active' : '' }}">
           <i class="fa-solid fa-calendar"></i>
            Event
        </a>

        <!-- Sports -->
        <a href="/admin/sports" 
          class="{{ request()->is('admin/sport*') ? 'active' : '' }}">
            <i class="fa-solid fa-futbol"></i>
            Sports
        </a>


        <!-- Teams -->
        <a href="/admin/teams"
           class="{{ request()->is('admin/team*') ? 'active' : '' }}">
            <i class="fa-solid fa-people-group me-2"></i>
            Teams
        </a>

        <!-- Players -->
        <a href="/admin/players"
             class="{{ request()->is('admin/player*') ? 'active' : '' }}">
            <i class="fa-solid fa-user me-2"></i>
            Players
        </a>


        <!-- Payment -->

        <a href="/admin/payment" 
          class="{{ request()->is('admin/payment*') ? 'active' : '' }}">
            <i class="fa-solid fa-credit-card"></i>
            Payment Setup
        </a>

        <!-- Player Payment -->

        <a href="/admin/reg-player-payment" 
          class="{{ request()->is('admin/reg-player-payment*') ? 'active' : '' }}">
               <i class="fa-solid fa-user-tag me-2"></i>
            Player Payment
        </a>

    </div>

</div>