@extends('layouts.app')
@section('title')
    Leave |
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
                            <li class="breadcrumb-item active">Leave</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Leave</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="row mb-2">
                                {{-- <h5 class="mb-2 mt-2">Personal Details</h5> --}}
                                <div class="m-2">
                                    <div class="row g-2 mb-2">
                                        <div class="col-md">
                                            <div class="form-floating" id="datepicker4">
                                                {{-- <input type="text" data-type="date" id="dob" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4"> --}}
                                                <input type="text" data-type="date" class="form-control date" id="leaveDate" data-toggle="date-picker" data-cancel-class="btn-warning">
                                                <label for="floatingInputGrid">Date of leave</label>
                                                <div class="invalid-feedback leaveDate">
                                                    Please provide date of birth.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" data-type="name" class="form-control" id="reason" placeholder="" value="">
                                                <label for="floatingInputGrid">Reason</label>
                                                <div class="invalid-feedback reason">
                                                    Please provide name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End row -->
                            <div class="button-list">
                                <button type="button" onclick="validate()" class="btn btn-success">Apply for leave</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
@endsection

@section('script')
    <script>
        function validate() {
            var inputs = $('.form-floating > .form-control[id], .form-floating > .form-select[id], .form-check > input[type="checkbox"]');
            var errors = $('.invalid-feedback');
            var errorcount = 0;
            var jsonData = {};
            for(var i=0; i<inputs.length; i++){
                if((inputs.eq(i).val() == '' || inputs.eq(i).val() == null) && inputs.eq(i).attr('id') != 'PBorOA'){
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
                    } else if(inputs.eq(i).attr('id') == 'eID'){
                        if(inputs.eq(i).val() == ''){
                            inputs.eq(i).next().next().css('display', 'block');
                            inputs.eq(i).css('border', '1px solid red');
                            errorcount = errorcount+1;
                        } else {
                            inputs.eq(i).next().next().css('display', 'none');
                            inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                        }
                    } else {
                        inputs.eq(i).next().next().css('display', 'none');
                        inputs.eq(i).css('border', '1px solid var(--ct-input-border-color)');
                    }
                }
                // jsonData[inputs.eq(i).attr('id')]= inputs.eq(i).val();
                jsonData[inputs.eq(i).attr('id')]= inputs.eq(i).attr('type') == 'checkbox' ? checkBoxValue(inputs.eq(i).attr('id')) : inputs.eq(i).val().replace(',', '');
            }

            if(errorcount < 1){
                $('body').css('opacity', '0.5');
                $('#preloader, #status').css('display', 'block');
                console.log(jsonData);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('employee.leave') }}",
                    data: jsonData,
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
    </script>
@endsection