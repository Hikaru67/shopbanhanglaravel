@extends('layout2')
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            echo '<br>';
                            Session::put('message', null);
                        }
                        ?>
                        <form action="{{URL::to('/login2')}}" method="post">

                            {{--@if($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback" style="display:block; color:red">
                                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                </span>
                            @endif--}}
                            {{csrf_field()}}
                            <input type="text" name="customer_username" placeholder="Tài khoản" />
                            <input type="password" name="customer_password" placeholder="Mật khẩu" />
                            {{--<a href="/login-google">
                                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                            </a>--}}
                            <span>
								<input type="checkbox" class="checkbox" name="login_remember" value="1">
								Ghi nhớ đăng nhập
							</span>
                            <div class="col s12 m6 offset-m3 center-align">
                                <a class="oauth-container btn darken-4 white black-text" href="/login-google" style="text-transform:none">
                                    <div class="left" style="float: left">
                                        <img width="20px" style="margin-top:7px; margin-right:8px" alt="Google sign-in"
                                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                    </div>
                                    <p style="float: left; margin-top:7px">Login with Google</p>
                                </a>
                            </div>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Người dùng mới!</h2>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            echo '<br>';
                            Session::put('message', null);
                        }
                        ?>
                        <form action="{{URL::to('/add-customer')}}" method="post">
                            {{csrf_field()}}
                            @foreach($errors->all() as $error)
                                <span class="text-alert">{{$error}}</span>
                                <br>
                            @endforeach
                            <input type="text" name="customer_username" placeholder="Tên tài khoản"/>
                            <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                            <input type="text" name="customer_name" placeholder="Họ và tên"/>
                            <input type="email" name="customer_email" placeholder="Email Address"/>
                            <input type="text" name="customer_phone" placeholder="sđt"/>

                            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                            <br/>

                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
