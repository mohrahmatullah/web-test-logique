<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shop | Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Register</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">
          @include('pages_message.notify-msg-error')
          @include('pages_message.form-submit')
        </p>

        <form action="" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="reg_email_id" class="form-control" placeholder="Email" value="{{ old('reg_email_id')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @if(!empty($errors->first('reg_email_id')))
          <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('reg_email_id') }}</p>
          @endif
          <div class="input-group mb-3">
            <input type="text" name="user_reg_name" class="form-control" placeholder="Name" value="{{ old('user_reg_name')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if(!empty($errors->first('user_reg_name')))
          <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('user_reg_name') }}</p>
          @endif
          <div class="input-group mb-3">
            <input type="password" name="reg_password" class="form-control" placeholder="Password" value="{{ old('reg_password')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
            @if(!empty($errors->first('reg_password')))
            <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('reg_password') }}</p>
            @endif
          <div class="input-group mb-3">
            <input type="password" name="reg_password_confirmation" class="form-control" placeholder="Retype password" value="{{ old('reg_password_confirmation')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
            @if(!empty($errors->first('reg_password_confirmation')))
            <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('reg_password_confirmation') }}</p>
            @endif
          <div class="input-group mb-3">
            <input type="text" name="reg_telepon" class="form-control" placeholder="Telepon" value="{{ old('reg_telepon')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
            @if(!empty($errors->first('reg_telepon')))
            <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('reg_telepon') }}</p>
            @endif

          <div class="input-group mb-3">
            <label for="reg_jk" class="control-label">Jenis Kelamin </label>
            <select class="form-control" name="reg_jk">
              <option value="pria"> Pria</option>
              <option value="wanita"> Wanita</option>
            </select>
          </div>
            @if(!empty($errors->first('reg_telepon')))
            <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('reg_telepon') }}</p>
            @endif

          <div class="form-group">
            <label for="alamat" class="control-label">Alamat </label>
            <div class="col-sm-10">
                  <div class="table-responsive">  
                        <table class="table table-bordered" id="dynamic_field">

                            <tr>  
                                <td><input type="text" name="alamat[0]" class="form-control name_list" required="" /></td>  
                                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                            </tr>  
                        </table> 
                    </div>
            </div>
          </div>

          @if(!empty($errors->first('reg_alamat')))
            <p class="text-red"><i class="icon fa fa-ban"></i> {{ $errors->first('reg_alamat') }}</p>
            @endif
                
            

          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="{{ route('admin.login')}}" class="text-center">I already have a user</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){      
    var i=1;
    var b=0;
    $('#add').click(function(){  
         i++;  
         b++;
         $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">\
                        <td>\
                          <input type="text" name="alamat['+b+']" class="form-control name_list" required />\
                        </td>\
                        <td>\
                          <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">-</button>\
                        </td>\
                        </tr>');  
    });

    $(document).on('click', '.btn_remove', function(){  
         var button_id = $(this).attr("id");   
         $('#row'+button_id+'').remove();  
    });  

  });
  $(document).on('click', '.btn_remove_add', function(){  
       var button_id = $(this).attr("id");   
       $('#row_add'+button_id+'').remove();  
  }); 
</script>
</body>
</html>
