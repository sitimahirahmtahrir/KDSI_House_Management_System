<div class="d-flex justify-content-between align-items-center py-2 px-3" style="background-color: #001f3f; color: white;">
    <h2 class="m-0">{{ $title }}</h2>
    <div class="dropdown">
        <button class="btn dropdown-toggle text-white" type="button" id="headerMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            ☰
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="headerMenuButton">
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('users.index') }}">User Management</a></li>
                    <li><a class="dropdown-item" href="{{ route('reports.index') }}">Report</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>
</div>
