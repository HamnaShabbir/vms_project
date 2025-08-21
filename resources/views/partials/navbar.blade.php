<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    {{-- <h6 class="mt-2">
        @if (isset(Auth::user()->entity_id))
            <span class="text-primary"><b> <span class="font-size">{{ Auth::user()->entity->title }}</span></b></span>

            @if (activeReportingPeriod() && activeReportingPeriod() !== null)
                <span> ({{ activeReportingPeriod()->title }})</span>
            @else
                <span> (No Reporting Period Selected)</span>
            @endif
        @endif
    </h6> --}}
    <!-- Right navbar links -->

    <ul class="ml-auto navbar-nav d-flex align-items-center">
        <li class="nav-item">
            @if (auth()->check() && auth()->user()->role == 'receptionist')
                <!-- Modal Open Button -->
                <a href="{{ route('visitors.create') }}" class="btn btn-primary">
                    Registration Form
                </a>
            @endif
        </li>

        {{-- old code ====================================================================================== --}}
        <li class="nav-item">
            <div class="dropdown">
                <button class="m-0 btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-bell fa-lg"></i>
                    <span id="notification-badge"
                        class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </span>
                </button>
                <div aria-labelledby="dropdownMenu3" class="dropdown-menu dropdown-menu-right dropdown-menu-right-lg"
                    id="notification-container">
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="{{ route('visitors.show', $notification->data['visitor_id']) }}"
                            class="dropdown-item dropdown-header notification-item" data-id="{{ $notification->id }}">
                            {{ $notification->data['message'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </li>
        {{-- old code ====================================================================================== --}}

        {{-- new code --}}
        {{-- <li class="nav-item">
            <div class="dropdown">
                <button class="m-0 btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="far fa-bell fa-lg"></i>
                    <span id="notification-badge" class="badge badge-pill badge-warning">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="{{ route('visitors.show', ['visitor' => $notification->data['visitor_id']]) }}"
                           class="dropdown-item notification-item">
                            {{ $notification->data['message'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </li>    --}}




        {{-- <script>
            $(document).ready(function () {
                $('.notification-item').on('click', function (e) {
                    e.preventDefault();
                    var notificationId = $(this).data('id');
                    var redirectUrl = $(this).data('url'); // Get visitor details URL

                    $.ajax({
                        url: '/notifications/' + notificationId + '/read',
                        type: 'GET',
                        success: function (response) {
                            if (response.success) {
                                window.location.href = redirectUrl; // Redirect to visitor details page
                            }
                        }
                    });
                });
            });
        </script> --}}



        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ auth()->user()->profile_image_url }}" class="rounded-circle" height="30px" width="30px"
                    alt="Profile">
                <span class="ml-2">{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-circle text-primary mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off mr-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".notification-item").on("click", function(event) {
                event.preventDefault();

                let notificationId = $(this).data("id"); // Get notification ID
                let url = $(this).attr("href"); // Save URL to redirect after AJAX

                $.ajax({
                    url: "/notifications/" + notificationId + "/read",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr(
                            "content") // Correct CSRF token usage
                    },
                    success: function(response) {
                        console.log("Notification marked as read.");
                        window.location.href = url; // Redirect only after successful update
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr.responseText);
                    }
                });
            });
        });
        $(document).ready(function() {

            function fetchNotifications() {
                $.ajax({
                    url: "{{ route('notifications.fetch') }}", // Define this route in web.php
                    type: "GET",
                    success: function(response) {
                        if (response.success) {
                            let notifications = response.notifications;
                            let notificationContainer = $("#notification-container");
                            let notificationBadge = $("#notification-badge");

                            // Clear existing notifications
                            notificationContainer.empty();

                            if (notifications.length > 0) {
                                // Append new notifications
                                notifications.forEach(notification => {
                                    notificationContainer.append(`
                                <a href="${notification.url}"
                                   class="dropdown-item dropdown-header notification-item"
                                   data-id="${notification.id}">
                                    ${notification.message}
                                </a>
                            `);
                                });

                                // Update the badge count
                                notificationBadge.text(notifications.length);
                                notificationBadge.show();
                            } else {
                                // Hide the badge if no unread notifications
                                notificationBadge.hide();
                            }
                        }
                    }
                });
            }

            // Fetch notifications every 5 seconds
            setInterval(fetchNotifications, 5000);
        });

        $(document).on('click', '.notification-item', function(e) {
            e.preventDefault();
            var notificationId = $(this).data('id');
            var redirectUrl = $(this).attr('href');
            var $notificationItem = $(this);
            var $badge = $('.notification-badge'); // Select the badge element

            $.ajax({
                url: '/notifications/' + notificationId + '/read',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $notificationItem.remove();
                    var count = parseInt($badge.text());
                    $badge.text(count - 1);

                    window.location.href =
                        redirectUrl; // Redirect to the visitor details page

                }
            });
        });
    </script>
@endpush
