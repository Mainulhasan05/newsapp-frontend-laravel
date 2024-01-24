@extends('layouts.master')
@section('title', 'Login | Kawsar News Portal')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div>
                <h6 class="text-uppercase font-weight-bold mb-3">Welcome Back, Login Here</h6>
                <form method="POST" id="login_form">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <div id="login_alert"></div>
                            <div class="form-group">
                                <input id="email" type="text" class="form-control p-4" placeholder="Your Email"
                                    required="required" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control p-4" placeholder="Password"
                                    required="required" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex d-grid justify-content-around">
                        <button class="btn btn-primary btn-block font-weight-semi-bold px-4" style="height: 50px;"
                            type="submit" id="login_btn">Login</button>

                    </div>
                    <a class="my-3 text-secondary" href="{{ url('register') }}">New Here? Register</a>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
        $("#login_form").submit(function(e) {
        e.preventDefault();
        $("#login_btn").val('Please wait...');
        $.ajax({
            url: "{{ route('login.post') }}",
            method: "POST",
            data: {
                email: $("#email").val(),
                password: $("#password").val(),
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                if (response.status==200) {
                    $("#login_btn").val('Login');
                    $("#login_form").trigger('reset');
                    $("#login_alert").html(showMessage('success', response.message));
                    setTimeout(function() {
                        window.location.href = "{{ url('profile') }}";
                    }, 2000);
                    
                }
                else if(response.status == 400){
                    showError('email', response.message.email);
                    showError('password', response.message.password);
                    $("#login_btn").val('Login');
                }
                 else {
                    $("#login_btn").val('Login');
                    $("#login_alert").html(showMessage('danger', response.message));
                }
            }
        });
        });
        });
        
        
    </script>

@endsection
