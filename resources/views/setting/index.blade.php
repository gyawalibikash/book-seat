@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
          <div class="col-lg-6">
              {!! Form::open(['url' => 'setting/passwordchange', 'class' => 'form-horizontal' ,'method'=>'post']) !!}
                  <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }} ">
                      <label for="old_password" class="col-md-4 control-label">Enter Your Old Password :</label>
                      <div class="col-md-6">
                          {!! Form::password('old_password',['class'=>'form-control']) !!}

                          @if ($errors->has('old_password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('old_password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} ">
                      <label for="password" class="col-md-4 control-label">Enter New Password :</label>
                      <div class="col-md-6">
                          {!! Form::password('password',['class'=>'form-control']) !!}

                          @if ($errors->has('password'))
                              <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }} ">
                      <label for="password_confirmation" class="col-md-4 control-label">Confirm New Password :</label>
                      <div class="col-md-6">
                          {!! Form::password('password_confirmation',['class'=>'form-control']) !!}

                          @if ($errors->has('password_confirmation'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

              {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
          {{ Form::close() }}
          </div>
      </div>
    </div>
@endsection