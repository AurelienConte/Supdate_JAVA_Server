@extends("main")
@section("content")
    <br><br>
    <div class="row">


        <div class="col-md-12">
            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="home-box" style="color:black;">
                <form method="post" action="{{ url('login/') }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <h3 class="home-title">login</h3><hr>
                        <div class="form-group">
                            <input type="text" name="user_name" id="user_name" tabindex="1" class="form-control" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-block btn-info" value="Log In">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection