@extends('layouts.app')
@section('title')
    Update Employee |
@endsection
@section('style')
    <style>
        #appraisalDateColumn{
            display: none;
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
                            <li class="breadcrumb-item active">Update Employee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Update Employee</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($employees as $employee)
                            <form id="create_employee" class="needs-validation" novalidate>
                                <div class="form-floating">
                                    <input type="hidden" id="id" class="form-control" value="{{ $employee->eID }}" />
                                </div>
                                <div class="row mb-2">
                                    <h5 class="mb-2 mt-2">Personal details</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="name" class="form-control" id="name" placeholder="" value="{{ $employee->name }}">
                                                    <label for="floatingInputGrid">Name of the Employee</label>
                                                    <div class="invalid-feedback name">
                                                        Please provide name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating" id="datepicker4">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="date" id="dob" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" value="{{ $employee->dob }}">
                                                    <label for="floatingInputGrid">Date of Birth</label>
                                                    <div class="invalid-feedback dob">
                                                        Please provide date of birth.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="email" onkeypress="return limitInput(event)" data-type="email" id="email" name="example-email" class="form-control" placeholder="" value="{{ $employee->email }}">
                                                    <label for="floatingInputGrid">Personal Email</label>
                                                    <div class="invalid-feedback email">
                                                        Please provide email.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="phone" id="phone" class="form-control" value="{{ $employee->phone }}">
                                                    <label for="floatingInputGrid">Phone Number</label>
                                                    <div class="invalid-feedback phone">
                                                        Please provide phone number.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <select class="form-select" id="bloodgroup" aria-label="Floating label select example">
                                                        <option disabled value=""></option>
                                                        <option value="a+" {{ $employee->bloodgroup == 'a+' ? 'selected' : '' }}>A +ve</option>
                                                        <option value="a+" {{ $employee->bloodgroup == 'a1+' ? 'selected' : '' }}>A1 +ve</option>
                                                        <option value="a-" {{ $employee->bloodgroup == 'a-' ? 'selected' : '' }}>A -ve</option>
                                                        <option value="a-" {{ $employee->bloodgroup == 'a1-' ? 'selected' : '' }}>A1 -ve</option>
                                                        <option value="b+" {{ $employee->bloodgroup == 'b+' ? 'selected' : '' }}>B +ve</option>
                                                        <option value="b-" {{ $employee->bloodgroup == 'b-' ? 'selected' : '' }}>B -ve</option>
                                                        <option value="ab+" {{ $employee->bloodgroup == 'ab+' ? 'selected' : '' }}>AB +ve</option>
                                                        <option value="ab+" {{ $employee->bloodgroup == 'a1b+' ? 'selected' : '' }}>A1B +ve</option>
                                                        <option value="ab+" {{ $employee->bloodgroup == 'a2b+' ? 'selected' : '' }}>A2B +ve</option>
                                                        <option value="ab-" {{ $employee->bloodgroup == 'ab-' ? 'selected' : '' }}>AB -ve</option>
                                                        <option value="ab-" {{ $employee->bloodgroup == 'a1b-' ? 'selected' : '' }}>A1B -ve</option>
                                                        <option value="ab-" {{ $employee->bloodgroup == 'a2b-' ? 'selected' : '' }}>A2B -ve</option>
                                                        <option value="o+" {{ $employee->bloodgroup == 'o+' ? 'selected' : '' }}>O +ve</option>
                                                        <option value="O-" {{ $employee->bloodgroup == 'O-' ? 'selected' : '' }}>O -ve</option>
                                                    </select>
                                                    <label for="floatingInputGrid">Blood Group</label>
                                                    <div class="invalid-feedback bloodgroup">
                                                        Please provide blood group.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="address" id="address" class="form-control" value="{{ $employee->address }}">
                                                    <label for="floatingInputGrid">Address</label>
                                                    <div class="invalid-feedback address">
                                                        Please provide address.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row-->
                                <div class="row mb-2">
                                    <h5 class="mb-2 mt-2">Bank details</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="name" id="bankName" class="form-control" value="{{ $employee->bankdetail->bankName }}">
                                                    <label for="floatingInputGrid">Bank Name</label>
                                                    <div class="invalid-feedback bankName">
                                                        Please provide bank name.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="name" id="branch" class="form-control" value="{{ $employee->bankdetail->branch }}">
                                                    <label for="floatingInputGrid">Branch Name</label>
                                                    <div class="invalid-feedback branch">
                                                        Please provide branch name.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="ifsc" id="ifscCode" class="form-control" value="{{ $employee->bankdetail->ifscCode }}">
                                                    <label for="floatingInputGrid">IFSC Code</label>
                                                    <div class="invalid-feedback ifscCode">
                                                        Please provide IFSC code.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="number" id="accountNumber" class="form-control" value="{{ $employee->bankdetail->accountNumber }}">
                                                    <label for="floatingInputGrid">Account Number</label>
                                                    <div class="invalid-feedback accountNumber">
                                                        Please provide account number.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row-->
                                <div class="row mb-2">
                                    <h5 class="mb-2 mt-2">Office Use</h5>
                                    <div class="m-2">
                                        <div class="row g-2 mb-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <select class="form-select" onchange="return limitInput(event)" id="employeeType" name="employeeType" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="fulltime" {{$employee->employeeType =='fulltime' ? 'selected' : ''}}>Full Time</option>
                                                    <option value="parttime" {{$employee->employeeType =='parttime' ? 'selected' : ''}}>Part Time</option>
                                                    <option value="freelancer" {{$employee->employeeType =='freelancer' ? 'selected' : ''}}>Freelancer</option>
                                                </select>
                                                <label for="floatingInputGrid">Employee Type</label>
                                                <div class="invalid-feedback designation">
                                                    Please provide Employee Type.
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="email" onkeypress="return limitInput(event)" data-type="email" id="officeEmail" name="example-email" class="form-control" placeholder="" value="{{ $employee->department->officeEmail }}">
                                                    <label for="floatingInputGrid">Office Email</label>
                                                    <div class="invalid-feedback officeEmail">
                                                        Please provide mail.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="text" id="department" class="form-control" value="{{ $employee->department->department }}">
                                                    {{-- <select class="form-select" id="department" aria-label="Floating label select example">
                                                        <option disabled selected value=""></option>
                                                        <option value="1" {{ $employee->department == '1' ? 'selected' : '' }} >Developing</option>
                                                        <option value="2" {{ $employee->department == '2' ? 'selected' : '' }} >Testing</option>
                                                        <option value="3" {{ $employee->department == '3' ? 'selected' : '' }} >Project Management</option>
                                                        <option value="4" {{ $employee->department == '4' ? 'selected' : '' }} >HR</option>
                                                    </select> --}}
                                                    <label for="floatingInputGrid">Department</label>
                                                    <div class="invalid-feedback department">
                                                        Please provide department.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="text" id="designation" class="form-control" value="{{ $employee->department->designation }}">
                                                    {{-- <select class="form-select" id="designation" aria-label="Floating label select example">
                                                        <option disabled selected value=""></option>
                                                        <option value="1" {{ $employee->designation == '1' ? 'selected' : '' }} >Fresher / Trainee</option>
                                                        <option value="2" {{ $employee->designation == '2' ? 'selected' : '' }} >Junior</option>
                                                        <option value="3" {{ $employee->designation == '3' ? 'selected' : '' }} >Senior</option>
                                                        <option value="4" {{ $employee->designation == '4' ? 'selected' : '' }} >Manager</option>
                                                        <option value="5" {{ $employee->designation == '5' ? 'selected' : '' }} >Team Lead</option>
                                                    </select> --}}
                                                    <label for="floatingInputGrid">Designation</label>
                                                    <div class="invalid-feedback designation">
                                                        Please provide designation.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-floating" id="datepicker4">
                                                    {{-- <input type="text" id="dateOfJoining" class="form-control"> --}}
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="date" id="dateOfJoining" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" value="{{ $employee->department->dateOfJoining }}">
                                                    <label for="floatingInputGrid">Date of Joining</label>
                                                    <div class="invalid-feedback dateOfJoining">
                                                        Please provide date of joining.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="number" onkeyup="getComma(this, this.id)" id="ctc" class="form-control" value="{{ $employee->department->ctc }}">
                                                    <label for="floatingInputGrid">CTC (per month)</label>
                                                    <div class="invalid-feedback ctc">
                                                        Please provide CTC.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" onkeypress="return limitInput(event)" onkeyup="getComma(this, this.id)" id="PBorOA" class="form-control" value="{{ $employee->department->perfomance_bonus }}">
                                                    <label for="floatingInputGrid">Perfomance Bounse / Other Allowance</label>
                                                    <div class="invalid-feedback PBorOA">
                                                        Please provide Perfomance Bounse / Other Allowance.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-floating">
                                                <select class="form-select" onchange="return limitInput(event)" id="company" name="company" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="grinfotech" {{$employee->company =='grinfotech' ? 'selected' : ''}}>GR Infotech</option>
                                                    <option value="axecode" {{$employee->company =='axecode' ? 'selected' : ''}}>Axe Code</option>
                                                    <option value="zoneflux" {{$employee->company =='zoneflux' ? 'selected' : ''}}>Zone Flux</option>
                                                </select>
                                                <label for="floatingInputGrid">Company</label>
                                                <div class="invalid-feedback designation">
                                                    Please provide Company.
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md">
                                                <div class="form-check">
                                                    <input type="checkbox" onclick="showAppraisalDateColumn()" class="form-check-input" id="appraisal">
                                                    <label class="form-check-label" for="customCheck1">This is Appraisal</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-check">
                                                    <input type="checkbox" name="employeeLogin" class="form-check-input" id="employeeLogin">
                                                    <label class="form-check-label" for="customCheck1">Create Employee Login</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-2">
                                            <div class="col-md" id="appraisalDateColumn">
                                                <div class="form-floating" id="datepicker4">
                                                    <input type="text" onkeypress="return limitInput(event)" data-type="date" id="appraisalDate" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" value="" data-id="appraisalDate">
                                                    <label for="floatingInputGrid">Appraisal take effect from</label>
                                                    <div class="invalid-feedback dob">
                                                        Please provide Appraisal date.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row-->
                                <div class="button-list">
                                    <button type="button" onclick="validate()" class="btn btn-success">Update employee</button>
                                </div>
                            </form>
                        @endforeach
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

        function getComma(e, element){
            if(element == 'ctc'){
                $('#ctc').val(numberWithCommas(e.value.replace(',', '')))
            }

            if(element == 'PBorOA'){
                $('#PBorOA').val(numberWithCommas(e.value.replace(',', '')))
            }
        }
        function validate() {
            var inputs = $('.form-floating > .form-control[id], .form-floating > .form-select[id]');
            var errors = $('.invalid-feedback');
            var errorcount = 0;
            var jsonData = {};
            for(var i=0; i<inputs.length; i++){
                if((inputs.eq(i).val() == '' || inputs.eq(i).val() == null) && inputs.eq(i).attr('data-id') != 'appraisalDate'){
                    inputs.eq(i).next().next().css('display', 'block');
                    inputs.eq(i).css('border', '1px solid red');
                    errorcount = errorcount+1;
                } else {
                    var emailRegex =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                    if(inputs.eq(i).attr('type') == 'email'){
                        if(inputs.eq(i).val().match(emailRegex)){
                            inputs.eq(i).next().next().css('display', 'none');
                            inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                        } else {
                            inputs.eq(i).next().next().css('display', 'block');
                            inputs.eq(i).css('border', '1px solid red');
                            errorcount = errorcount+1;
                        }
                    } else if(inputs.eq(i).attr('id') == 'phone'){
                        if(inputs.eq(i).val().length < 10){
                            inputs.eq(i).next().next().css('display', 'block');
                            inputs.eq(i).css('border', '1px solid red');
                            errorcount = errorcount+1;
                        } else {
                            inputs.eq(i).next().next().css('display', 'none');
                            inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                        }
                    } else if(inputs.eq(i).attr('data-id') == 'appraisalDate'){
                        if($('#appraisal:checked').val() == 'on'){
                            if(inputs.eq(i).val() == '' || inputs.eq(i).val() == null){
                                inputs.eq(i).next().next().css('display', 'block');
                                inputs.eq(i).css('border', '1px solid red');
                                errorcount = errorcount+1;
                            } else {
                                inputs.eq(i).next().next().css('display', 'none');
                                inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                            }
                        }
                    } else {
                        inputs.eq(i).next().next().css('display', 'none');
                        inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                    }
                }
                jsonData[inputs.eq(i).attr('id')]= inputs.eq(i).val().replace(',', '');
            }
            if($('#appraisal:checked').val() == 'on'){
                jsonData['appraisal'] = 'yes';
            } else {
                jsonData['appraisal'] = 'no';
            }

            if(errorcount < 1){
                // console.log(window.location.href)
                // console.log(jsonData)
                $('body').css('opacity', '0.5');
                $('#preloader, #status').css('display', 'block');
                // console.log(jsonData);
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: jsonData,
                    success: function(data){
                        if(data){
                            $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                        }
                        if(data.status == 'success'){
                            setTimeout(() => {
                                window.location.href = "{{ route('employee.all') }}"
                            }, 1000);
                        }
                    }
                })
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
            if(type.attr('data-type') == 'phone'){

                if (ASCIICode > 47 && ASCIICode < 58 && type.val().length < 10){
                    return true;
                } else {
                    return false;
                }
            }
            if(type.attr('data-type') == 'text'){
                var ASCIICode = (event.which) ? event.which : event.keyCode
                if ((ASCIICode > 96 && ASCIICode < 123) || (ASCIICode > 64 && ASCIICode < 91)){
                    return true;
                } else {
                    return false;
                }
            }
            if(type.attr('data-type') == 'date'){
                var ASCIICode = (event.which) ? event.which : event.keyCode
                if (ASCIICode){
                    return false;
                }
            }
            if(type.attr('data-type') == 'name'){
                var ASCIICode = (event.which) ? event.which : event.keyCode
                if ((ASCIICode > 96 && ASCIICode < 123) || (ASCIICode > 64 && ASCIICode < 91) || ASCIICode == 32 || ASCIICode == 46){
                    return true;
                } else {
                    return false;
                }
            }
            if(type.attr('data-type') == 'address'){
                var ASCIICode = (event.which) ? event.which : event.keyCode
                if (ASCIICode){
                    return true;
                }
            }
            if(type.attr('data-type') == 'ifsc'){
                var ASCIICode = (event.which) ? event.which : event.keyCode
                if ((ASCIICode > 47 && ASCIICode < 58) || (ASCIICode > 64 && ASCIICode < 91)){
                    return true;
                } else {
                    return false;
                }
            }
        }

        function showAppraisalDateColumn(){
            if($('#appraisal:checked').val() == 'on'){
                $('#appraisalDateColumn').css('display', 'block')
            } else {
                $('#appraisalDateColumn').css('display', 'none')
            }
        }

        $('#ctc').val(numberWithCommas($('#ctc').val()))
        $('#PBorOA').val(numberWithCommas($('#PBorOA').val()))
    </script>
@endsection
