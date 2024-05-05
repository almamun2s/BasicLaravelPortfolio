@extends('admin.main_layout')
@section('page_content')
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.body.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.body.sidebar_left')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content"  style="margin-top: 5rem;margin-left: 255px">

            @yield('admin')
            <!-- End Page-content -->
            @include('admin.body.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
@endsection
