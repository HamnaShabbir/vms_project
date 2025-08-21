<li class="nav-item">
    <a href="{{ route('dashboard.host') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p class="info">
            Dashboard
        </p>
    </a>
</li>
@if (auth()->user()->role == 'Super Admin')
    <li class="nav-item">
        <a href="{{ route('company.index') }}" class="nav-link  {{ request()->routeIs('company.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-building"></i> <p class="info">Companies</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('parking.index') }}" class="nav-link  {{ request()->routeIs('parking.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-car"></i>
            <p class="info">Parking Management</p>
        </a>
    </li>
    {{-- <li class="nav-item ">
    <a href="{{ url('/SuperAdmin/pages/users/index') }}" class="nav-link {{ Request::is('/SuperAdmin/pages/users/index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i> <span>Users</span>
    </a>
</li> --}}
    <li class="nav-item ">
        <a href="{{ route('receptionist.index') }}"
            class="nav-link {{ request()->routeIs('receptionist.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p class="info">Receptionist</p>
        </a>
    </li>
@endif
@if (auth()->user()->role == 'admin')
    <li class="nav-item ">
        <a href="{{ route('hosts.index') }}" class="nav-link {{ request()->routeIs('hosts.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tie "></i>
            <p class="info">Employees & Hosts</p>
        </a>
    </li>
@endif
@if (auth()->user()->role != 'Super Admin')
    <li class="nav-item ">
        <a href="{{ route('visitors.index') }}"
            class="nav-link  {{ request()->routeIs('visitors.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p class="info">Visitors</p>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="{{ route('system-logs') }}" class="nav-link {{ request()->routeIs('system-logs') ? 'active' : '' }}">
            <i class="nav-icon fas fa-angle-right "></i>
            <p class="info">System Logs</p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="{{ route('ReceptionParking') }}"
            class="nav-link {{ request()->routeIs('ReceptionParking') ? 'active' : '' }}">
            <i class="nav-icon fas fa-angle-right"></i>
            <p class="info">Parking Management</p>
        </a>
    </li>
@endif
<li
    class="nav-item {{ request()->routeIs('company.setting', 'profile.*', 'departments.*', 'designations.*', 'visitor-policy.*', 'parkingStatus.*', 'parkingSlot.*', 'IdType.*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-cogs"></i>
        <p class="info">
            Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview"
        style="{{ request()->routeIs('company.setting', 'profile.*', 'departments.*', 'designations.*', 'visitor-policy.*', 'parkingStatus.*', 'parkingSlot.*', 'IdType.*') ? 'display: block;' : '' }}">
        @if (auth()->user()->role == 'Super Admin')
            <li class="nav-item ">
                <a href="{{ route('buildings.create') }}"
                    class="nav-link {{ request()->routeIs('buildings.*') ? 'active' : '' }}">

                    <i class="nav-icon fas fa-building"></i>
                    <p>Building Settings</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('visitor-policy.index') }}"
                    class="nav-link {{ request()->routeIs('visitor-policy.*') ? 'active' : '' }}">

                    <i class="nav-icon-right fas fa-arrow-right "></i>
                    <p class="info">Visitor Policy</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('parkingSlot.index') }}"
                    class="nav-link {{ request()->routeIs('parkingSlot.*') ? 'active' : '' }}">

                    <i class="nav-icon-right fas fa-arrow-right "></i>
                    <p class="info">Parking Slot</p>
                </a>
            </li>
        @endif
        @if (auth()->user()->role == 'Super Admin' || auth()->user()->role == 'receptionist')
            <li class="nav-item ">
                <a href="{{ route('IdType.index') }}"
                    class="nav-link {{ request()->routeIs('IdType.*') ? 'active' : '' }}">

                    <i class="nav-icon-right fas fa-arrow-right "></i>
                    <p class="info">Id Type</p>
                </a>
            </li>
        @endif
        @if (auth()->user()->role == 'admin')
            <li class="nav-item ">
                <a href="{{ route('company.setting', auth()->user()->company_id) }}"
                    class="nav-link {{ request()->routeIs('company.setting') ? 'active' : '' }}">
                    <div class="d-flex" style="align-items: baseline;">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p class="info">Company Settings</p>
                    </div>
                </a>
            </li>
        @endif
        <li class="nav-item ">
            <a href="{{ route('profile.edit') }}"
                class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                <div class="d-flex" style="align-items: baseline;">
                    <i class="nav-icon-right fas fa-arrow-right "></i>
                    <p class="info">
                        Profile settings
                    </p>
                </div>
            </a>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="nav-item ">
                <a href="{{ route('departments.index') }}"
                    class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                    <div class="d-flex" style="align-items: baseline;">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p class="info">Department</p>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('designations.index') }}"
                    class="nav-link {{ request()->routeIs('designations.*') ? 'active' : '' }}">
                    <div class="d-flex" style="align-items: baseline;">
                        <i class="nav-icon-right fas fa-arrow-right "></i>
                        <p class="info">Designations</p>

                    </div>
                </a>
            </li>
        @endif
    </ul>
</li>
