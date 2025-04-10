<!-- Left Sidebar -->
<div class="left-sidebar left-nav-employee position-fixed">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employee.job.list') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employee.job.list') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employee.test') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employee.test') }}">
                Test
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="#">Settings</a>
        </li>
    </ul>
</div>
