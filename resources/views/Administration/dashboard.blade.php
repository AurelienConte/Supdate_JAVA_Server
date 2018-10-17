@extends("main")
@section("content")
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                <p>To create a project just make a folder here : [{{ public_path() . '\JAVA_UPDATER\files'  }}] with the name of project</p>
                <p>After it, put your files in project folder : [{{ public_path() . '\JAVA_UPDATER\files\{YOUR_PROJECT_NAME}'  }}]</p>
                <p>Finally come back here, refresh and select your directory bellow and generate your xml file ! :)</p>
            </div>

            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <div class="home-box" style="color:black;">
                    <h3 class="home-title">Welcome</h3><hr>
                Welcome on the dashboard :)
            </div>

            <div class="home-box" style="color:black;">
                <form method="post" action="{{ url('administration/create_project') }}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <h3 class="home-title">PROJECT</h3><hr>
                        <div class="form-group">
                            <input type="text" name="PROJECT_NAME" tabindex="2" class="form-control" placeholder="Project name">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="project-submit" tabindex="4" class="form-control btn btn-block btn-info" value="Create project">
                                </div>
                            </div>
                        </div>
                </form>
            </div>

                <div class="home-box" style="color:black;">
                    <h3 class="home-title">Project list</h3><hr>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Directory Name</th>
                            <th scope="col">XML exist ?</th>
                        </tr>
                        </thead>
                        <form method="post" action="{{ url('administration') }}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($folders as $f)
                                <?php $xml = file_exists(public_path() . '\JAVA_UPDATER\xml/' . $f . ".xml"); ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td><button type="submit" name="see" value="{{$f}}" class="btn btn-primary"><i class="fas fa-eye"></i></button> | <button type="submit" name="del" value="{{$f}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                    <td>{{$f}}</td>
                                    <td>
                                        @if($xml)
                                            <span style="color: green;">Yes</span>
                                        @else
                                            <span style="color: red;">No</span>
                                        @endif
                                     </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </form>
                    </table>
                </div>
        </div>
        <div class="col-md-4">
            <div class="home-box" style="color:black;">
                <h3 class="home-title">Server Status</h3><hr>
                @if(isset($informations) && !$informations->maintenance)
                <p class="validate" style="color:black;" align="center">Status : Online</p>
                @else
                    <p class="error" style="color:black;" align="center">Status : Maintenance</p>
                @endif
            </div>
        </div>
    </div>
@endsection