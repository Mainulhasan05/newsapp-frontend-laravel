@extends('layouts.master')
@section('title', "Register | Kawsar News Portal")
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div>
            <h6 class="text-uppercase font-weight-bold mb-3">New Here, Register Here</h6>
            <form id="register_form" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="name" type="text" class="form-control p-4" placeholder="Your name" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="email" type="email" class="form-control p-4" placeholder="Your Email" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="password" type="password" class="form-control p-4" placeholder="Password" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input id="cpassword" type="password" class="form-control p-4" placeholder="Confirm Password" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-around">
                    {{-- <button class="btn btn-primary btn-block font-weight-semi-bold px-4" style="height: 50px;"
                        type="submit">Register</button> --}}
                    <input type="submit" class="btn btn-primary btn-block font-weight-semi-bold px-4" value="Register" id="register_btn">
                </div>
                <a class="my-3 text-secondary" href="{{url('register')}}">New Here? Register</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#register_form").submit(function(e) {
            e.preventDefault();
            $("#register_btn").val('Please wait...');
            $.ajax({
                url: "{{ route('register.post')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: $("#name").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    cpassword: $("#cpassword").val(),
                },
                dataType: 'json',
                success: function(res){
                    if(res.status==400){
                        console.log(res.message)
                        console.log(res)
                        showError('name', res.message.name[0]);
                        showError('email', res.message.email);
                        showError('password', res.message.password);
                        showError('cpassword', res.message.cpassword);
                        $("#register_btn").val('Register');
                    }
                    else if(res.status==200){
                        $("#register_form")[0].reset();
                        $("#register_btn").val('Register');
                        $("#show_success_alert").html(showMessage('success', res.messages));
                        removeValidationClasses("#register_form");
                        // window.location.href = "{{ route('login') }}";
                    }
                }
            })
        });
    });
</script>
@endsection
