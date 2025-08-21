<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.css')
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    {{-- <!-- Site wrapper --> --}}

    <div class="wrapper">

        {{-- <!-- Navbar --> --}}
        @include('partials.navbar')
        {{-- <!-- /.navbar --> --}}
        {{-- <!-- Main Sidebar Container --> --}}
        @include('partials.sidebar')
        {{-- <!-- Content Wrapper. Contains page content --> --}}
        <div class="content-wrapper">
            {{-- <!-- Content Header (Page header) --> --}}

            {{-- @include('partials.header') --}}
            {{-- <!-- Main content --> --}}
            @yield('main_content')
            {{-- <!-- /.content --> --}}
        </div>
        {{-- <!-- /.content-wrapper --> --}}
        @include('partials.footer')
        

        {{-- <!-- Control Sidebar --> --}}
        <aside class="control-sidebar control-sidebar-dark">
            {{-- <!-- Control sidebar content goes here --> --}}
        </aside>
        {{-- <!-- /.control-sidebar --> --}}
    </div>
    
    {{-- <!-- ./wrapper --> --}}
    @include('partials.script')
    @yield('script')
</body>

</html>
