@extends('layouts.app')
@section('title')
    All Freelancers |
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
                            <li class="breadcrumb-item active">Freelancers</li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Freelancers</h4>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Bank Name</th>
                                    <th>Branch</th>
                                    <th>Account Number</th>
                                    <th>Ifsc Code</th>
                                    <th>Project Name</th>
                                    <th>Amount Paid</th>
                                    <th>Paid Date</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($freelancers as $freelancer)
                                    <tr>
                                        <td>{{ $freelancer->eID }}</td>
                                        <td>{{ $freelancer->name }}</td>
                                        <td>{{ $freelancer->email }}</td>
                                        <td>{{ $freelancer->phone }}</td>
                                        <td>{{ $freelancer->bankName }}</td>
                                        <td>{{ $freelancer->branch }}</td>
                                        <td>{{ $freelancer->accountNumber }}</td>
                                        <td>{{ $freelancer->ifscCode }}</td>
                                        <td>{{ $freelancer->projectName }}</td>
                                        <td>{{ $freelancer->amountPaid }}</td>
                                        <td>{{ $freelancer->paidDate }}</td>
                                        <td>
                                            <a href="{{ route('freelancer.id', $freelancer->id) }}">
                                                <i class="mdi mdi-eye"></i>
                                                View
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('freelancer.update', $freelancer->id) }}">
                                                <i class="dripicons-document-edit"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a style="color:red" href="{{ route('freelancer.delete', $freelancer->id) }}">
                                                <i class="dripicons-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <div class="button-list text-end">
                                <a  href="{{ route('freelancer.add')}}" class="btn btn-success">Create Freelancer</a>
                        </div> -->
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
@endsection
