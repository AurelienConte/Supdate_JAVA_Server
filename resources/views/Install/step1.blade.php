@extends("main")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="home-box" style="color:black;">
                <h3 class="home-title">Java Updater Install</h3><hr>
                <p>Welcome to the install panel, here you gonna choose an database configuration and set your user / password</p>
            </div>
        </div>
    </div>
    <div class="row">
        <form method="post" action="{{ url('install/') }}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_step" value="1">
            <div class="col-md-12">
                <div class="home-box" style="color:black;">
                    <h3 class="home-title">DATABASE</h3><hr>
                    <div class="form-group">
                        <input type="text" name="DB_HOST"tabindex="2" class="form-control" placeholder="Database Host">
                    </div>
                    <div class="form-group">
                        <input type="text" name="DB_PORT"tabindex="2" class="form-control" placeholder="Database Port">
                    </div>
                    <div class="form-group">
                        <input type="text" name="DB_INFO"tabindex="2" class="form-control" placeholder="Database">
                    </div>
                    <div class="form-group">
                        <input type="text" name="DB_USERNAME"tabindex="2" class="form-control" placeholder="Database Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="DB_PASS"tabindex="2" class="form-control" placeholder="Database Password">
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" name="submit" tabindex="4" class="form-control btn btn-block btn-success" value="Validate & next step">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection