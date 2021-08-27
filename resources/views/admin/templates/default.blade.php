<!DOCTYPE html>
<html lang="en">

@include('admin.templates.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Navbar -->
    @include('admin.templates.partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.templates.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      @include('admin.templates.partials.header')

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    @include('admin.templates.partials.footer')

    <!-- Control Sidebar -->
    @include('admin.templates.partials.control')
    <!-- /.control-sidebar -->
  </div>
<!-- ./wrapper -->
  @include('admin.templates.partials.script')

</body>
</html>
