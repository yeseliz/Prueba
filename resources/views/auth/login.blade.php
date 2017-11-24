@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 myform-cont" >
      <div class="myform-top">
         <div class="myform-top-left">
       <p></p>
       
        </div>
       </div>
 
  <div class="myform-bottom">
   <center><img src="imagenes/img.ico"  WIDTH=99 HEIGHT=102 ></center>
    <form class="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username" class="col-md-4 control-label">Carnet: </label>

            <div class="col-md-8">
                <div class="form-group has-feedback">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }} " required autofocus> <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
<!--
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="name" type="name" class="form-control" name="name" placeholder="Carnet">
  </div>-->
                 
               
                @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>
        </div>

       <div class="form-group has-feedback">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña: </label>


<br>

            <div class="col-md-8">
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

 <!--<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password">-->
  </div>


                </div>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
     
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            
                <button type="submit" class="btn btn-success btn-block btn-flat">
                    Acceder
                </button>
               <br>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    ¿Ha olvidado su contraseña?
                </a>
            </div>
        </div>
    </form>
</div>
</div>
</div>

@endsection
