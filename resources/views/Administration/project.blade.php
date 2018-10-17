@extends("main")
@section("content")
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                Select files you want include in your downloader and click on generate xml :)
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
                <h3 class="home-title">Project files</h3>
                <hr>
                <button type="submit" id="check_all" class="btn btn-primary">Select all</button> | <button type="submit" name="see" class="btn btn-success">Generate xml</button>
                <hr>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Selected</th>
                        <th scope="col">Need extract ?</th>
                        <th scope="col">File name</th>
                    </tr>
                    </thead>
                    <form method="post" action="{{ url('administration') }}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($folders as $f)
                          <?php $type = filetype(public_path() . '\JAVA_UPDATER\files/' . $FOLDER_NAME . '/' . $f); ?>
                          <?php $i = $i + 1; ?>
                          <tr>
                              <th scope="row">{{$i}}</th>
                              <td>@if($type != 'dir') <input type="checkbox" id="selected" name="SELECTED[]"> @endif</td>
                              <td>
                                  <?php
                                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                                $MIM = finfo_file($finfo, public_path() . '\JAVA_UPDATER\files/' . $FOLDER_NAME . '/' . $f); // This will return the mime-type
                                finfo_close($finfo);
                                ?>
                                  @if($MIM == "application/x-rar" || $MIM == "application/octet-stream")
                                          <input type="checkbox" id="selected" name="EXTRACT[]">
                                  @endif
                              </td>
                              <td>
                                  @if($type == 'dir')
                                    <i class="far fa-folder"></i>
                                  @else
                                    <i class="far fa-file"></i>
                                  @endif
                                  {{$f}}
                                  @if($type == 'dir')
                                      <span style="color: red;">(FOLDER ARE NOT ALLOWED /!\ PUT IN A ZIP ARCHIVE)</span>
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

    <script>
      var checked = false;

      $("#check_all").click(function(){
        if(checked === false) {
          var list = document.getElementsByName("SELECTED[]");
          for (var i = 0; i < list.length; i++) {
            list[i].checked = true;
          }
          checked = true;
        } else {
          var list = document.getElementsByName("SELECTED[]");
          for (var i = 0; i < list.length; i++) {
            list[i].checked = false;
          }
          checked = false;
        }
      });
    </script>
@endsection