@extends('admin.body.main_layout')
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
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('admin')
                    <!-- End Page-content -->
                    @include('admin.body.footer')

                </div>
            </div>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
@endsection
