<!-- Left Sidebar -->
<div class="left-sidebar left-nav-employee position-fixed">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employee.dashboard') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employee.dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employee.personal.info') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employee.personal.info') }}">
                Edit personal details
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('employee.usdate.profile.details') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employee.usdate.profile.details') }}">
                Edit profile</a>
        </li>
    </ul>
</div>