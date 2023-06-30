@extends('layouts.app')
@section('title')
    Salary |
@endsection
@section('style')
    <style>
        tbody tr td:nth-child(12),
        tbody tr td:nth-child(13){
            text-align: center;
        }
        .hide{
            display: none;
        }
        .allSalary{
            display: flex;
            justify-content: flex-end;
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
                            <li class="breadcrumb-item active">Salary</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Salary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-right">
                            <form class="d-flex">
                                <div class="form-floating" id="datepicker5">
                                    <input type="text" id="month" onchange="getData()"  data-date-autoclose="true" class="form-control" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1" data-date-container="#datepicker5">
                                    <label for="floatingInputGrid">Select Month</label>
                                    <div class="invalid-feedback dob">
                                        Please provide date of birth.
                                    </div>
                                </div>
                                {{-- <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                    <i class="mdi mdi-autorenew"></i>
                                </a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                    <th>Days</th>
                                    <th>Paid days</th>
                                    {{-- <th>Leave</th> --}}
                                    <th>LOP</th>
                                    <th>Account Number</th>
                                    <th>Performance Bonus</th>
                                    <th>Employee Contribution</th>
                                    <th>PT</th>
                                    <th>Salary</th>
                                    <th>Net salary</th>
                                    <th>Edit</th>
                                    <th>Print</th>
                                    <th>Mail</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody id="employeeSalaryList">
                                
                            </tbody>
                            <!-- <tr>
                                <td colspan="" style="">Total:</td>
                                <td></td>
                            </tr> -->
                          
                        </table>
                        <div class="hide" id="salary">
                            <h5>Total: <span id="totalSalary"></span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row hide" id="salary">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered border-primary table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody id="totalSalary"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}

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
        $.NotificationApp.send('', 'Please select month',"top-right", "rgba(0,0,0,0.2)");

        function getMonthFromString(mon){
            var d = Date.parse(mon + "1, 2012");
            if(!isNaN(d)){
                return new Date(d).getMonth() + 1;
            }
            return -1;
        }

        function capitalize(word) {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }

        function mail_payslip(id){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            var mailPayslip = "{{ route('employee.mail_payslip', 'id') }}";
            mailPayslip = mailPayslip.replace('id', id);

            $.ajax({
                method: 'GET',
                url: mailPayslip,
                redirect: 'follow',
                success: function(data){
                    $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                    $('body').css('opacity', '');
                    $('#preloader, #status').css('display', 'none');
                }
            })
        }

        function delete_payslip(id){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            var deletePayslip = "{{ route('salary.delete', 'id') }}";
            deletePayslip = deletePayslip.replace('id', id);

            $.ajax({
                method: 'GET',
                url: deletePayslip,
                redirect: 'follow',
                success: function(data){
                    $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                    setTimeout(() => {
                        getData();
                    }, 2000);
                }
            })
        }
        

        function getData(){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            $('#month').attr('disabled', 'true');
            var monthName = $('#month').val();
            var month = getMonthFromString(monthName.split(' ')[0]);
            console.log(month)
            var table = $("#datatable-buttons").dataTable();
            console.log(table);
            var column = table.api().column(1).header();
            // $(column).text('Amount');
            // console.log(column);
            // console.log(table.api().column().footer());
            
            // var t =table.api().column(1).data();
            // console.log(t);
            
            // var t = $("#datatable-buttons").DataTable();
            // console.log(t);
            
            $.ajax({
                method: 'POST',
                url: '{{ route("salary.all") }}',
                data: {
                    salaryMonth: monthName
                },
                success: function(response){
                    $('body').css('opacity', '');
                    $('#preloader, #status').css('display', 'none');
                    if(response){
                        $('#month').removeAttr('disabled');
                    }
                    if(response.allEmployeeSalary.length > 0){
                        $('#salary').removeClass('hide');
                        $('#salary').addClass('allSalary');
                        $('#totalSalary').empty();
                        table.fnClearTable();
                        var TotalSalary = 0;
                        response.allEmployeeSalary.forEach(data => {
                            // console.log(data.freelancerAmount);
                            console.log(data);
                            if(data.employeeType == 'freelancer'){
                                var updateURL = "{{ route('freelancer.update', 'ID') }}";
                                updateURL = updateURL.replace('ID', data.id);
                            }else{
                                var updateURL = "{{ route('salary.update', 'ID') }}";
                                updateURL = updateURL.replace('ID', data.id);
                            }
                            // var updateURL = "{{ route('salary.update', 'ID') }}";
                            // updateURL = updateURL.replace('ID', data.id);

                            var printPayslip = "{{ route('employee.print_paySlip', 'id') }}";
                            printPayslip = printPayslip.replace('id', data.id);
                            if(data.employeeType == 'freelancer'){
                                // console.log(data.freelancerAmount);
                                // console.log(data.employeeType);
                                data.net_salary = data.freelancerAmount; 
                            }
                            TotalSalary = Number(TotalSalary)+Number(data.net_salary);
                            TotalSalary=Math.round(TotalSalary);
                            // console.log(TotalSalary);
                            console.log(data.net_salary);
                            table.fnAddData([
                                data.eID,
                                data.name,
                                capitalize(data.employeeType),
                                data.working_days,
                                data.paid_days,
                                // data.leave_days,
                                data.lop,
                                data.accountNumber,
                                numberWithCommas(data.performance_bonus),
                                numberWithCommas(0),
                                numberWithCommas(Number(data.professional_tax) + Number(data.tds)),
                                numberWithCommas(data.ctc),
                                numberWithCommas(data.net_salary),
                                '<a href="'+updateURL+'"><i class="dripicons-document-edit"></i></a>',
                                '<a href="'+printPayslip+'"><i class="dripicons-print"></i></a>',
                                '<a href="javascript:void(0)" onclick="mail_payslip('+data.id+')"><i class="dripicons-mail"></i></a>',
                                '<a style="color:red" href="javascript:void(0)" onclick="delete_payslip('+data.id+')"><i class="dripicons-trash"></i></a>'
                            ]);
                        });

                        $('#totalSalary').html(numberWithCommas(TotalSalary));
                        // console.log(table.api().column(9).data().toArray());

                        // var section = table.api().column( 9 );
 
                        //     $( section.footer() ).html(
                        //         section.data().reduce( function (a,b) {
                        //             // console.log(a+b)
                        //             return a+b;
                        //         } )
                        //     );
                        
                        var column = table.api().column(11, { page: 'current' });
                        var total = column.data().reduce(function(a, b) {

                            b = b && b.replace(/,/g, '');
                            return parseInt(a) + parseInt(b);

                        }, 0);
                        // console.log(total);
                        total = numberWithCommas(total);


                        var newRowData = ['Total', '', '','','','', '', '', '', '','',total, '<a href=""><i class="dripicons-document-edit"></i></a>',
                                '<a href=""><i class="dripicons-print"></i></a>',
                                '<a href="javascript:void(0)" onclick=""><i class="dripicons-mail"></i></a>',
                                '<a style="color:red" href="javascript:void(0)" onclick=""><i class="dripicons-trash"></i></a>'];
                        table.fnAddData(newRowData);
                        
                        // var sum = table.api().column(9).data().reduce(function (a, b) {
                        //          return parseFloat(a) + parseFloat(b);
                        //         }, 0);
                        // console.log(sum);

                        // table().api().column('columnName:Total').footer()).html('Sum: ' + sum);

                    } else {
                        table.fnClearTable();
                        // $('#salary').addClass('hide');
                        $.NotificationApp.send('', 'There is no salary details in '+monthName+' month',"top-right", "rgba(0,0,0,0.2)");
                    }
                }
            })

    
        }

    


    </script>
@endsection