@extends('layouts.app')


@section('content')

    <div class="content">
        <div class="row">
            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Site Settings</strong>
                    </div>
                    <div class="card-body card-block">
                        {!! Form::open(['url' => url('/sitesetting'), 'method' => 'post', 'files' => 'true']) !!}
                        @foreach($settings as $setting)
                        <div class="form-group">
                            <label class=" form-control-label">{{ $setting->namesetting }}</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-dashboard"></i></div>
                                {!! Form::text($setting->namesetting, sitesetting($setting->namesetting), ['placeholder' => $setting->namesetting, 'class' => 'form-control']) !!}
                            </div>
                            @if ($errors->has($setting->namesetting))
                                <span class="help-block">
                                        <strong>{{ $errors->first($setting->namesetting) }}</strong>
                                    </span>
                            @endif
                            <small class="form-text text-muted">ex. Boudlal Dev</small>
                        </div>
                        @endforeach
                        <div class="form-group">
                            <label class=" form-control-label">Company logo</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                {!! Form::file('logo', null, ['class' => 'form-control']) !!}
                            </div>
                            <small class="form-text text-muted">ex. 999-99-9999</small>
                        </div>

                        <br>
                        <div class="form-group pull-right">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary ">Update Settings</button>
                            </div>
                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="ol-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-header">Update Username</div>
                    <div class="card-body card-block">
                         {{ Form::open(['url' => url('/updateUser'), 'method' => 'patch']) }}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input id="password" name="password" placeholder="Confirm Password" class="form-control" type="password">
                                </div>
                                @if($errors->has('userPassword') )
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first() }}</strong>
                                    </span>
                                @endif
                            </div>

                            <br>
                            <div class="form-group pull-right">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary ">Update Email</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Update Password</div>
                    <div class="card-body card-block">
                        {{ Form::open(['url' => url('/updatePassword'), 'method' => 'patch']) }}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input  name="old_password" placeholder="Old Password" class="form-control" type="password" required>
                                </div>
                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input  name="password" placeholder="New Password" class="form-control" type="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input  name="password_confirmation" placeholder="Confirm New Password" class="form-control" type="password" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <br>
                            <div class="form-group pull-right">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary ">Update Password</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection