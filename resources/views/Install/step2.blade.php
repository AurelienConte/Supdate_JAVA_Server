@extends("main")
@section("content")
    <div class="row">
        <form method="post" action="{{ url('install/') }}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_step" value="2">
            <div class="col-md-12">
                <div class="home-box" style="color:black;">
                    <h3 class="home-title">ACCOUNT</h3><hr>
                    <div class="form-group">
                        <input type="text" name="USERNAME"tabindex="2" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" name="PASSWORD"tabindex="2" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" name="submit" tabindex="4" class="form-control btn btn-block btn-success" value="Finish install">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection