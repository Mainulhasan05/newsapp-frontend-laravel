@extends('layouts.master')
@section('title',"Login | Kawsar News Portal")
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div>
            <h6 class="text-uppercase font-weight-bold mb-3">Welcome Back, Login Here</h6>
            <form method="POST" action="#" id="login_form">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control p-4" placeholder="Your Email" required="required"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" class="form-control p-4" placeholder="Password" required="required"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex d-grid justify-content-around">
                    <button class="btn btn-primary btn-block font-weight-semi-bold px-4" style="height: 50px;"
                        type="submit" id="login_btn">Login</button>
                        
                </div>
                <a class="my-3 text-secondary" href="{{url('register')}}">New Here? Register</a>
            </form>
        </div>
    </div>
</div>
    
@endsection