<aside class="main-sidebar sidebar-light-primary elevation-4 text-sm">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar text-sm">
        <!-- Sidebar user (optional) -->
        <div class=" my-3 d-flex">
            <img src="{{ asset('images/Logo.png') }}" height="10px" class="mx-auto" alt="Logo Image"
                style="
            height: 50px;">
        </div>
        {{-- {{ auth()->user()->profile_image_url }} --}}

        <div class="user-panel d-flex">
            @if (auth()->user()->role == 'admin')
                <div class="text-md  d-flex align-items-center">
                    <div class="image me-2">
                        <a href="#">
                            {{-- find image from model --}}
                            <img loading="lazy" src="{{ auth()->user()->company->logo_url ?? '' }}"
                                class="img-circle elevation-2 mb-2" alt="User Image" style="height:40px; width:40px;">
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->company->company_name ?? '' }}</a>
                    </div>
                </div>
            @elseif (auth()->user()->role == 'host')
                <div class="text-md  d-flex align-items-center">
                    <div class="image me-2">
                        <a href="#">
                            {{-- find image from model --}}
                            <img loading="lazy" src="{{ auth()->user()->company->logo_url ?? '' }}"
                                class="img-circle elevation-2 mb-2" alt="User Image" style="height:40px; width:40px;">
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->company->company_name ?? '' }}</a>
                    </div>
                </div>
            @elseif (auth()->user()->role == 'receptionist')
                <div class="text-md  d-flex align-items-center">
                    <div class="image me-2">
                        <a href="#">
                            {{-- find image from model --}}
                            <img loading="lazy" src="{{ auth()->user()->sidebar_image_url }}"
                                class="img-circle elevation-2 mb-2" alt="User Image" style="height:40px; width:40px;">
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->sidebar_name }}</a>
                    </div>
                </div>
            @else
                <div class="text-md  d-flex align-items-center">
                    <div class="image me-2">
                        <a href="#">
                            {{-- find image from model --}}
                            <img loading="lazy" src="{{ auth()->user()->profile_image_url }}"
                                class="img-circle elevation-2 mb-2" alt="User Image" style="height:40px; width:40px;">
                        </a>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }} (Super Admin)</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('partials.sidebar.index')
            </ul>
        </nav>
    </div>
</aside>
