@extends('layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apex</a></li>
                            <li class="breadcrumb-item active">Mixed Charts</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Mixed Charts</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Line & Column Chart</h4>
                        <div dir="ltr">
                            <div id="line-column-mixed" class="apex-charts" data-colors="#727cf5,#0acf97"></div>
                        </div>
                    </div>
                    <!-- end card body-->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Multiple Y-Axis Chart</h4>
                        <div dir="ltr">
                            <div id="multiple-yaxis-mixed" class="apex-charts" data-colors="#727cf5,#39afd1,#fa5c7c"></div>
                        </div>
                    </div>
                    <!-- end card body-->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->
        </div>
        <!-- end row-->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Line & Area Chart</h4>
                        <div dir="ltr">
                            <div id="line-area-mixed" class="apex-charts" data-colors="#0acf97,#fa5c7c"></div>
                        </div>
                    </div>
                    <!-- end card body-->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Line, Column & Area Chart</h4>
                        <div dir="ltr">
                            <div id="all-mixed" class="apex-charts" data-colors="#727cf5,#39afd1,#fa5c7c"></div>
                        </div>
                    </div>
                    <!-- end card body-->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection
@section('script')
        <!-- third party:js -->
        <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
        <!-- third party end -->

        <!-- demo:js -->
        <script src="{{ asset('assets/js/pages/demo.apex-mixed.js') }}"></script>
        <!-- demo end -->
@endsection
