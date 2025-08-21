<header class="bmd-layout-header">
    <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown"  style="box-shadow: 0 0 20px 0 rgba(153, 149, 149, 0.933);">
        <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button"
            data-toggle="drawer" data-target="#dw-s1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- top walay dropdowns -->
        <ul class="nav navbar-nav">
            {{-- <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle  m-0" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-envelope fa-lg"></i><span
                            class="badge badge-pill badge-danger animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                    </button>
                    <div aria-labelledby="dropdownMenu2"
                        class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                            <span class="float-right-rtl text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-user c-main mr-2"></i> 8 friend requests
                            <span class="float-right-rtl text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-file c-main mr-2"></i> 3 new reports
                            <span class="float-right-rtl text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu3"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell  fa-lg "></i><span
                            class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                    </button>
                    <div aria-labelledby="dropdownMenu2"
                        class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                            <span class="float-right-rtl text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-user c-main mr-2"></i> 8 friend requests
                            <span class="float-right-rtl text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="far fa-file c-main mr-2"></i> 3 new reports
                            <span class="float-right-rtl text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </div>
            </li> --}}
            {{-- yeh image hai comment hai --}}
            {{-- <li class="nav-item"> <img src="./img/user-profile.jpg" alt="..."
                    class="rounded-circle screen-user-profile"></li> --}}
            {{-- logout and profile dropdown --}}
            {{-- <li class="nav-item">
                
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
    
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
    
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </li> --}}




        </ul>
    </div>
</header>