@extends('layouts.app')
@section('style')
    <style>
        .hide{
            display: none;
        }
    </style>
@endsection
@section('title')
   {{ $freelancer->name }} 
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
                            <li class="breadcrumb-item active">PaySlip</li>
                        </ol>
                    </div>
                    <h4 class="page-title">
                       
                        {{ $freelancer->name }}
            
                    </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                            <form id="create_employee" class="needs-validation" novalidate>
                                <div class="form-floating">
                                    <!-- <input type="hidden" id="eid" class="form-control" value="{{ $freelancer->eID }}" /> -->
                                    <input type="hidden" id="employeeType" class="form-control" value="{{ $freelancer->employeeType }}" />
                                    <input type="hidden" id="salary" class="form-control" value="{{ $freelancer->ctc }}" />
                                </div>
                                <div class="row mb-2">
                                    <h5 class="mb-2 mt-2">Freelancer Details</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="name" class="form-control" id="name" placeholder="" value="{{ $freelancer->name }}" readonly>
                                                    <label for="floatingInputGrid">Name of the Freelancer</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="name" class="form-control" id="phone" placeholder="" value="{{ $freelancer->phone }}" readonly>
                                                    <label for="floatingInputGrid">Freelancer Phone Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="number" id="eID" class="form-control" value="{{ $freelancer->eID }}" readonly>
                                                    <label for="floatingInputGrid">Employee ID</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="text" id="email" class="form-control" value="{{ $freelancer->email }}" readonly>
                                                    <label for="floatingInputGrid">Freelancer Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <!-- <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="text" id="designation" class="form-control" value="" readonly>
                                                    {{-- <select class="form-select" id="department" aria-label="Floating label select example" disabled>
                                                        <option disabled selected value=""></option>
                                                        <option value="1" {{ $employee->department == '1' ? 'selected' : '' }} >Developing</option>
                                                        <option value="2" {{ $employee->department == '2' ? 'selected' : '' }} >Testing</option>
                                                        <option value="3" {{ $employee->department == '3' ? 'selected' : '' }} >Project Management</option>
                                                        <option value="4" {{ $employee->department == '4' ? 'selected' : '' }} >HR</option>
                                                    </select> --}}
                                                    <label for="floatingInputGrid">Department</label>
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="text" id="department" class="form-control" value="" readonly>
                                                    {{-- <select class="form-select" id="designation" aria-label="Floating label select example" disabled>
                                                        <option disabled selected value=""></option>
                                                        <option value="1" {{ $employee->designation == '1' ? 'selected' : '' }} >Fresher / Trainee</option>
                                                        <option value="2" {{ $employee->designation == '2' ? 'selected' : '' }} >Junior</option>
                                                        <option value="3" {{ $employee->designation == '3' ? 'selected' : '' }} >Senior</option>
                                                        <option value="4" {{ $employee->designation == '4' ? 'selected' : '' }} >Manager</option>
                                                        <option value="5" {{ $employee->designation == '5' ? 'selected' : '' }} >Team Lead</option>
                                                    </select> --}}
                                                    <label for="floatingInputGrid">Designation</label>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="name" id="bankName" class="form-control" value="{{ $freelancer->bankdetail->bankName }}" readonly>
                                                    <label for="floatingInputGrid">Bank Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="number" id="accountNumber" class="form-control" value="{{ $freelancer->bankdetail->accountNumber }}" readonly>
                                                    <label for="floatingInputGrid">Account Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="name" id="ifscCode" class="form-control" value="{{ $freelancer->bankdetail->ifscCode }}" readonly>
                                                    <label for="floatingInputGrid">IFSC Code</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="text" id="branch" class="form-control" value="{{ $freelancer->bankdetail->branch }}" readonly>
                                                    <label for="floatingInputGrid">Branch Name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <h5 class="mb-2 mt-2">Payment Details</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                        <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="text" id="projectName" class="form-control validate" value="">
                                                    <label for="floatingInputGrid">Project Name</label>
                                                    <div class="invalid-feedback eID">
                                                        Please provide Project Name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input  type="text" onkeypress="return limitInput(event)" data-type="number" class="form-control validate" id="amountPaid" placeholder="" value="">
                                                    <label for="floatingInputGrid">Amount Paid</label>
                                                    <div class="invalid-feedback name">
                                                        Please provide Amount.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md-6">
                                                <div class="form-floating" id="datepicker4">
                                                    <input type="text" data-type="date" id="paidDate" class="form-control validate" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4">
                                                    <label for="floatingInputGrid">Paid Date</label>
                                                </div>
                                                <div class="invalid-feedback name">
                                                    Please provide Date.
                                                </div>
                                            </div>
                                            <!-- <div class="col-md">
                                                <div class="form-floating" id="datepicker4">
                                                    <input maxlength="2" type="text" onkeypress="return limitInput(event)" data-type="number" id="leave_days" class="form-control validate">
                                                    <label for="floatingInputGrid">Leave taken</label>
                                                    <div class="invalid-feedback dateOfJoining">
                                                        Please provide leave taken.
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="4" type="text" onkeypress="return limitInput(event)" data-type="number" class="form-control" id="performance_bonus" placeholder="" value="">
                                                    <label for="floatingInputGrid">Performance Bonus ({{ $freelancer->perfomance_bonus }})</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating" id="datepicker5">
                                                    <input type="text" id="forTheMonth"  data-date-autoclose="true" class="form-control validate" data-provide="datepicker" data-date-format="MM yyyy" data-date-min-view-mode="1" data-date-container="#datepicker5">
                                                    <label for="floatingInputGrid">Salary for the Month</label>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div class="row mb-2">
                                    <h5 class="mb-2 mt-2">Deductions</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="number" class="form-control validate" id="professional_tax" placeholder="" value="">
                                                    <label for="floatingInputGrid">Professional Tax</label>
                                                    <div class="invalid-feedback dateOfJoining">
                                                        Please provide professional tax.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="number" id="tds" class="form-control validate" value="">
                                                    <label for="floatingInputGrid">TDS</label>
                                                    <div class="invalid-feedback dateOfJoining">
                                                        Please provide TDS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="row mb-2 hide" id="earnings">
                                    <h5 class="mb-2 mt-2">Earnings</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="basic_wage" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">Basic wage</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="hra" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">HRA</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="conveyance_allowances" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">Conveyance Allowances</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="medical_allowances" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">Medical Allowances</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="other_allowances" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">Other Allowances</label>
                                                </div>
                                            </div>
                                            <div class="col-md"></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row mb-2 hide" id="salary_div">
                                    <h5 class="mb-2 mt-2">Net Salary</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="total_earnings" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">Total Earnings</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" data-type="number" id="total_deductions" class="form-control" value="" readonly>
                                                    <label for="floatingInputGrid">Total Deductions</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input maxlength="2" type="text" data-type="number" class="form-control" id="net_salary" placeholder="" value="" readonly>
                                                    <label for="floatingInputGrid">Net Salary</label>
                                                </div>
                                            </div>
                                            <div class="col-md"></div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" name="send_email" class="form-check-input" id="sendMail">
                                                    <label class="form-check-label" for="send_email">Send Mail</label>
                                                </div>
                                            </div>
                                            <div class="col-md"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row-->
                                <div class="button-list">
                                    <button type="button" onclick="validate()" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-success hide" id="payslipGenerate">Print Pay Slip</button>
                                </div>
                            </form>
            
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div> <!-- container -->
@endsection

@section('script')
<!-- Typehead -->
    <script src="{{ asset('assets/js/vendor/handlebars.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/typeahead.bundle.min.js') }}"></script>
    <script type="text/javascript">
        function getMonthFromString(mon){
            var d = Date.parse(mon + "1, 2012");
            if(!isNaN(d)){
                return new Date(d).getMonth() + 1;
            }
            return -1;
        }

        $("#payslipGenerate").click(function(){
            $('body').css('opacity', '0.5');
            $('#preloader, #status').css('display', 'block');
            var data1 = {
                name: $('#name').val(),
                eID: $('#eID').val(),
                department: $('#department').val(),
                designation: $('#designation').val(),
                doj: $('#dateOfJoining').val(),
                bankName: $('#bankName').val(),
                accountNumber: $('#accountNumber').val(),
                working_days: $('#working_days').val(),
                paid_days: $('#paid_days').val(),
                lop: $('#lop').val(),
                leave_days: $('#leave_days').val(),
                basic_wage: stringToNumber($('#basic_wage').val()),
                hra: stringToNumber($('#hra').val()),
                conveyance_allowances: stringToNumber($('#conveyance_allowances').val()),
                medical_allowances: stringToNumber($('#medical_allowances').val()),
                other_allowances: stringToNumber($('#other_allowances').val()),
                professional_tax: $('#professional_tax').val(),
                tds: $('#tds').val(),
                total_earnings: stringToNumber($('#total_earnings').val()),
                total_deductions: stringToNumber($('#total_deductions').val()),
                performance_bonus: $('#performance_bonus').val(),
                net_salary: stringToNumber($('#net_salary').val()),
                forTheMonth: $('#forTheMonth').val(),
                sendMail: $('#sendMail:checked').val() == 'on' ? 'yes' : 'no',
            };
            console.log(data1);
            $.ajax({
                type: 'POST',
                url: "{{ route('employee.print_paySlip', '0') }}",
                data: data1,
                success: function(data){
                    if(data.code == '302'){
                        $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                        setTimeout(() => {
                            window.location.href= "{{ route('salary.all') }}";
                        }, 2000);
                    }else{
                        $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                        var route = "{{ route('employee.print_paySlip', 'id') }}";
                        route = route.replace('id', data.id);
                        // console.log(route);
                        // window.open(
                        //     route,
                        //     '_blank'
                        // );
                        window.location.href = "{{ route('employee.all') }}";
                    }
                }
            })
            //
        });

        function validate() {

            var inputs = $('.form-floating > .form-control.validate[id]');
            var errors = $('.invalid-feedback');
            var errorcount = 0;
            var jsonData = {};
            for(var i=0; i<inputs.length; i++){
                if(inputs.eq(i).val() == '' || inputs.eq(i).val() == null){
                    inputs.eq(i).next().next().css('display', 'block');
                    inputs.eq(i).css('border', '1px solid red');
                    errorcount = errorcount+1;
                } else {
                    inputs.eq(i).next().next().css('display', 'none');
                    inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                }
                jsonData[inputs.eq(i).attr('id')]= inputs.eq(i).val();
                // if($('#appraisal:checked').val() == 'on'){
                //     jsonData['appraisalSalary'] = 'yes';
                // }
            }

            if(errorcount < 1){
                var paidDate =  $('#paidDate').val();
                var month = getMonthFromString(paidDate.split(' ')[0]);
                $('body').css('opacity', '0.5');
                $('#preloader, #status').css('display', 'block');
                var jsonData = {
                    eID: $('#eID').val(),
                    id: $('#id').val(),
                    name: $('#name').val(),
                    employeeType: $('#employeeType').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    bankName: $('#bankName').val(),
                    branch:$('#branch').val(),
                    ifscCode:$('#ifscCode').val(),
                    accountNumber: $('#accountNumber').val(),
                    projectName: $('#projectName').val(),
                    amountPaid: $('#amountPaid').val(),
                    paidDate : paidDate,

                }
                console.log(jsonData);
                // $('#earnings, #deductions, #salary_div, #payslipGenerate').addClass('hide');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("freelancer.payment") }}',
                    data: jsonData,
                    success: function(data){
                        if(data.status == 'success'){
                            $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                            setTimeout(() => {
                                window.location.href= "{{ route('salary.all') }}";
                            }, 2000);
                        }
                        // $('body').css('opacity', '');
                        // $('#preloader, #status').css('display', 'none');
                        // if(data){
                        //     $('#earnings, #salary_div, #payslipGenerate').removeClass('hide');
                        //     $('#basic_wage').val(numberWithCommas(data.basic_wage));
                        //     $('#hra').val(numberWithCommas(data.hra));
                        //     $('#conveyance_allowances').val(numberWithCommas(data.conveyance_allowances));
                        //     $('#medical_allowances').val(numberWithCommas(data.medical_allowances));
                        //     $('#other_allowances').val(numberWithCommas(data.other_allowances));
                        //     $('#total_earnings').val(numberWithCommas(data.total_earnings));
                        //     $('#total_deductions').val(numberWithCommas(data.total_deductions));
                        //     $('#net_salary').val(numberWithCommas(data.net_salary));
                        // }
                    }
                })
            } else {
                $('#earnings, #salary').addClass('hide');
            }
        }

        function limitInput(event){
            var type = $(event.target);
            var ASCIICode = (event.which) ? event.which : event.keyCode
            if(type.attr('data-type') == 'number'){
                if (ASCIICode > 47 && ASCIICode < 58){
                    return true;
                } else {
                    return false;
                }
            }
        }
    </script>
@endsection
