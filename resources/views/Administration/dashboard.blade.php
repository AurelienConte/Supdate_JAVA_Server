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

            <div class="home-box" style="color:black;">
                    <h3 class="home-title">Welcome</h3><hr>
                Welcome on the dashboard :)
            </div>
                <div class="home-box" style="color:black;">
                    <h3 class="home-title">List directory</h3><hr>
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
    </div>
@endsection