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
                <form method="post" action="{{ url('administration/settings') }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <h3 class="home-title">Settings</h3><hr>
                    <div class="form-group">
                        <input type="checkbox" name="maintenance" @if(isset($informations) && $informations->maintenance) checked @endif> Maintenance
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-block btn-success" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection