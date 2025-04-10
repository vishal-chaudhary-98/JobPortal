<!-- right Sidebar -->
<div class="right-sidebar position-fixed">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employer.dashboard') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employer.dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employer.post.job') ? 'active text-primary' : 'text-dark' }}"
                href="{{ route('employer.post.job') }}">
                Your Jobs
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link {{ request()->routeIs('test') ? 'active text-primary' : 'text-dark' }}" href="{{ route('test') }}">Job Applications</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="#">Settings</a>
        </li>
    </ul>
</div>
