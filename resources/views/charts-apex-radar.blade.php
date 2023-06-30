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
                            <li class="breadcrumb-item active">Radar Charts</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Radar Charts</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Basic Radar Chart</h4>
                        <div dir="ltr">
                            <div id="basic-radar" class="apex-charts" data-colors="#727cf5"></div>
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
                        <h4 class="header-title mb-3">Radar with Polygon-fill</h4>
                        <div dir="ltr">
                            <div id="radar-polygon" class="apex-charts" data-colors="#FF4560"></div>
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
                        <h4 class="header-title mb-3">Radar – Multiple Series</h4>
                        <div dir="ltr">
                            <div id="radar-multiple-series" class="apex-charts" data-colors="#727cf5,#02a8b5,#fd7e14"></div>
                            <div class="text-center mt-2">
                                <button onclick="update()" class="btn btn-sm btn-primary">Update</button>
                            </div>
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
    <script src="{{ asset('assets/js/pages/demo.apex-radar.js') }}"></script>
    <!-- demo end -->
@endsection
