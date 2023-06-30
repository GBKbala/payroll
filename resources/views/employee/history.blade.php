@extends('layouts.app')
@section('title')
    All Employees |
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
                            <li class="breadcrumb-item active">All Employee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Employee</h4>
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
                                    <th>Employee Type</th>
                                    <th>Date of Birth</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Date of Joining</th>
                                    <th>CTC</th>
                                    <!-- <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->eID }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ucfirst($employee->employeeType)}}</td>
                                        <td>{{ $employee->dob }}</td>
                                        <td>{{ $employee->department->department }}</td>
                                        <td>{{ $employee->department->designation }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->department->dateOfJoining }}</td>
                                        <td data-data="ctc">{{ $employee->department->ctc }}</td>
                                        <!-- <td>
                                            @if($employee->employeeType != 'freelancer')
                                                <a href="{{ route('employee.id', $employee->eID) }}">
                                                    <i class="mdi mdi-eye"></i>
                                                    View
                                                </a>
                                            @elseif($employee->employeeType =='freelancer')   
                                                <a href="{{ route('freeancer_pay', $employee->eID) }}">
                                                    <i class="mdi mdi-eye"></i>
                                                    View
                                                </a>
                                            @endif
                                          </td>
                                        <td>
                                            <a href="{{ route('employee.update', $employee->eID) }}">
                                                <i class="dripicons-document-edit"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a style="color:red" href="{{ route('employee.delete', $employee->eID) }}">
                                                <i class="dripicons-trash"></i>
                                                Delete
                                            </a>
                                        </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end">
                            <div class="form-switch">
                                <input type="checkbox" class="form-check-input" value="all" id="allEmployees">
                                <label class="form-check-label" for="customSwitch1">Current Employees</label>
                            </div>
                        </div>
                        
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
        var ctc = $('td[data-data="ctc"]');
        for(i=0; i<ctc.length; i++){
            ctc.eq(i).html(numberWithCommas(ctc.eq(i).html()))
        }

    </script>

    <script>
        $(document).ready(function(){
            $('#allEmployees').change(function(){
                if($('#allEmployees').prop('checked')){
                    window.location.href='{{route('employee.all')}}';
                }
            });
        });
    </script>
@endsection
