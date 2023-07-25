@extends('layouts.app')
@section('title')
   Create Employee |
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
                            <li class="breadcrumb-item active">Create Employee</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Employee</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="create_employee" class="needs-validation" novalidate>
                            <div class="row mb-2">
                                <h5 class="mb-2 mt-2">Personal Details</h5>
                                <div class="m-2">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="name" name="name" class="form-control" id="name" placeholder="" value="">
                                                <label for="floatingInputGrid">Name of the Employee</label>
                                                <div class="invalid-feedback ">
                                                   <span class="name"> Please provide name.</span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating" id="datepicker4">
                                                <input type="text" onkeypress="return limitInput(event)" onchange="return limitInput(event)" data-type="date" id="dob" name="dob" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4">
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
                                                <input type="email" onkeypress="return limitInput(event)" data-type="email" name="email" id="email" name="example-email" class="form-control" placeholder="">
                                                <label for="floatingInputGrid">Personal Email</label>
                                                <div class="invalid-feedback email">
                                                    Please provide email.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="phone" name="phone" id="phone" class="form-control">
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
                                                <select onchange="return limitInput(event)" class="form-select" name="bloodgroup" id="bloodgroup" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="a+">A +ve</option>
                                                    <option value="a1+">A1 +ve</option>
                                                    <option value="a-">A -ve</option>
                                                    <option value="a1-">A1 -ve</option>
                                                    <option value="b+">B +ve</option>
                                                    <option value="b-">B -ve</option>
                                                    <option value="ab+">AB +ve</option>
                                                    <option value="a1b+">A1B +ve</option>
                                                    <option value="a2b+">A2B +ve</option>
                                                    <option value="ab-">AB -ve</option>
                                                    <option value="a1b-">A1B -ve</option>
                                                    <option value="a2b-">A2B -ve</option>
                                                    <option value="o+">O +ve</option>
                                                    <option value="O-">O -ve</option>
                                                </select>
                                                <label for="floatingInputGrid">Blood Group</label>
                                                <div class="invalid-feedback bloodgroup">
                                                    Please provide blood group.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="address" name="address" id="address" class="form-control">
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
                                <h5 class="mb-2 mt-2">Bank Details</h5>
                                <div class="m-2">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="name" name="bankName" id="bankName" class="form-control">
                                                <label for="floatingInputGrid">Bank Name</label>
                                                <div class="invalid-feedback bankName">
                                                    Please provide bank name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="name" name="branch" id="branch" class="form-control">
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
                                                <input type="text" onkeypress="return limitInput(event)" data-type="ifsc" name="ifscCode"  id="ifscCode" class="form-control">
                                                <label for="floatingInputGrid">IFSC Code</label>
                                                <div class="invalid-feedback ifscCode">
                                                    Please provide IFSC code.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="number" name="accountNumber" id="accountNumber" class="form-control">
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
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="number" name="eID" id="eID" class="form-control">
                                                <label for="floatingInputGrid">Employee ID ( Last Employee ID: <span>{{ $last_eID }}</span> )</label>
                                                <div class="invalid-feedback eID">
                                                    Please provide Employee ID.
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <div class="col-md-6">
                                            <div class="form-floating" id="datepicker4">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="date" name="dateOfJoining" id="dateOfJoining" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" disabled>
                                                <label for="floatingInputGrid" >Date of Relieving</label>
                                                <div class="invalid-feedback dateOfJoining">
                                                    Please provide date of joining.
                                                </div>
                                            </div>
                                        </div>     
                                       
                                        
                                    </div>
                                    <div class="row g-2 mb-2">
                                       
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <select class="form-select" onchange="return limitInput(event)" id="employeeType" name="employeeType" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="fulltime">Full Time</option>
                                                    <option value="parttime">Part Time</option>
                                                    <option value="freelancer">Freelancer</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                                <label for="floatingInputGrid">Employee Type</label>
                                                <div class="invalid-feedback designation">
                                                    Please provide Employee Type.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="email" onkeypress="return limitInput(event)" data-type="email" name="officeEmail" id="officeEmail" name="example-email" class="form-control" placeholder="" >
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
                                                <input type="text" onkeypress="return limitInput(event)" data-type="text" name="department" id="department" class="form-control" >
                                                {{-- <select class="form-select" onchange="return limitInput(event)" id="department" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="1">Developing</option>
                                                    <option value="2">Testing</option>
                                                    <option value="3">Project Management</option>
                                                    <option value="4">HR</option>
                                                </select> --}}
                                                <label for="floatingInputGrid">Department</label>
                                                <div class="invalid-feedback department">
                                                    Please provide department.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="text" name="designation" id="designation" class="form-control" >
                                                {{-- <select class="form-select" onchange="return limitInput(event)" id="designation" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="1">Fresher / Trainee</option>
                                                    <option value="2">Junior</option>
                                                    <option value="3">Senior</option>
                                                    <option value="4">Manager</option>
                                                    <option value="5">Team Lead</option>
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
                                                <input type="text" onkeypress="return limitInput(event)" data-type="date" name="dateOfJoining" id="dateOfJoining" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4">
                                                <label for="floatingInputGrid">Date of Joining</label>
                                                <div class="invalid-feedback dateOfJoining">
                                                    Please provide date of joining.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" onkeypress="return limitInput(event)" onkeyup="getComma(this, this.id)" data-type="number" id="ctc" name="ctc" class="form-control">
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
                                                <input type="text" onkeypress="return limitInput(event)" onkeyup="getComma(this, this.id)" name="PBorOA" id="PBorOA" class="form-control">
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
                                                    <option value="grinfotech">GR Infotech</option>
                                                    <option value="axecode">Axe Code</option>
                                                    <option value="zoneflux">Zone Flux</option>
                                                </select>
                                                <label for="floatingInputGrid">Company</label>
                                                <div class="invalid-feedback designation">
                                                    Please provide Company.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="row g-2 mb-2">
                                            <div class="col-md-6">
                                            <div class="form-floating" id="datepicker4">
                                                <input type="text" onkeypress="return limitInput(event)" data-type="date" name="dateOfJoining" id="dateOfJoining" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" disabled>
                                                <label for="floatingInputGrid" >Date of Relieving</label>
                                                <div class="invalid-feedback dateOfJoining">
                                                    Please provide date of joining.
                                                </div>
                                            </div>
                                            </div>    
                                       </div> -->
                                    </div>
                                    
                                    <!-- <div class="row g-2 mb-2">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <select class="form-select" onchange="return limitInput(event)" id="company" name="company" aria-label="Floating label select example">
                                                    <option disabled selected value=""></option>
                                                    <option value="grinfotech">GR Infotech</option>
                                                    <option value="axecode">Axe Code</option>
                                                    <option value="zoneflux">Zone Flux</option>
                                                </select>
                                                <label for="floatingInputGrid">Company</label>
                                                <div class="invalid-feedback designation">
                                                    Please provide Company.
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                {{-- <div class="m-2">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label for="example-fileinput" class="form-label">Address proof</label>
                                                <input type="file" id="addressProof" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-fileinput" class="form-label">PAN Card</label>
                                                <input type="file" id="addressProof" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- end row-->
                            <div class="button-list">
                                <button type="button" onclick="validate()" class="btn btn-success">Create employee</button>
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

        function checkBoxValue(id){
            var value = $(`#${id}[type="checkbox"]:checked`).val();
            
            return value == undefined ? 'off' : value;
        }

        function getComma(e, element){
            if(element == 'ctc'){
                $('#ctc').val(numberWithCommas(e.value.replace(',', '')))
            }

            if(element == 'PBorOA'){
                $('#PBorOA').val(numberWithCommas(e.value.replace(',', '')))
            }
        }

        function validate() {
            var name = $('#name').val();
            if(name == ''){
                $('.name').html('Name Field is Required');
                return false;
            }else{

            //    var form = document.querySelector('#create_employee')
            //    var data = new FormData (form);
            //    let value = Object.fromEntries(data.entries());
                var data = $('form').serialize();

                // var ctc = $('#ctc').val().replaceAll(',','');
                // var PBorOA = $('#PBorOA').val().replaceAll(',','');
                // data['ctc'] = ctc;
                // data['PBorOA'] = PBorOA ;
        
            
                $.ajax({
                    type: 'POST',
                    url: "{{ route('employee.create') }}",
                    data: data,
                    success: function(data){
                        if(data){
                            $.NotificationApp.send(data.status, data.message,"top-right", "rgba(0,0,0,0.2)", data.status);
                        }
                        if(data.status == 'success'){
                            setTimeout(() => {
                                window.location.href = "{{ route('employee.access') }}"
                            }, 3000);
                        }
                    }
                })

            }
          
                

        }

       
        function limitInput(event){
            var type = $(event.target);
            var ASCIICode = (event.which) ? event.which : event.keyCode
            if(type.val() != '' || type.val() != null){
                type.next().next().css('display', 'none');
                type.css('border', '1px solid var(--ct-input-border-color)');
            }
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
                if ((ASCIICode > 96 && ASCIICode < 123) || (ASCIICode > 64 && ASCIICode < 91 || ASCIICode == 32)){
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
                alert(event.which);
                alert(ASCIICode);
                if ((ASCIICode > 47 && ASCIICode < 58) || (ASCIICode > 64 && ASCIICode < 91)){
                    return true;
                } else {
                    return false;
                }
            }
        }
    </script>
@endsection
