@extends('layouts.app')
@section('title')
    Employee Access |
@endsection
@section('style')
    <style>
        tbody tr td:nth-child(12),
        tbody tr td:nth-child(13){
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">GR-Infotech</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Employee Access</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employee Access</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Login Access</th>
                                </tr>
                            </thead>
                            <tbody id="employeeSalaryList">
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->eID }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input  id="{{ $employee->id }}" {{ $employee->employeeLogin == 'on' ? 'checked' : '' }} onchange="giveAccess(this.id, '{{ $employee->name }}', '{{ $employee->eID }}', '{{ $employee->email }}')" type="checkbox" class="form-check-input" id="customSwitch1">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fixedColumns.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fixedHeader.bootstrap5.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
    <!-- end demo js-->
    <script>

        function giveAccess(id, name, eID, email){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            console.log($(`#${id}:checked`).val());
            var access_data = {
                name: name,
                eID: eID,
                email: email,
                isDeleted: $(`#${id}:checked`).val() == 'on' ? '0' : '1',
            };
            // console.log(access_data);
            $.ajax({
                method: 'POST',
                url: '{{ route("employee.create_access") }}',
                data: access_data,
                success: function(data){
                    console.log(data);
                    $('body').css('opacity', '');
                    $('#preloader, #status').css('display', 'none');
                    $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.message);
                }
            })
        }
    </script>
@endsection