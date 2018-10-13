
<div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Name</label></div>
    <div class="col-12 col-md-9">
        {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'v-bind' => 'name']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <br>
    </div>
</div>


<div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
    <div class="col-12 col-md-9">
        {!! Form::text('email',null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <br>
    </div>
</div>


<div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">CIN</label></div>
    <div class="col-12 col-md-9">
        {!! Form::text('cin',null, ['class' => 'form-control', 'placeholder' => 'Enter CIN']) !!}
        @if ($errors->has('cin'))
            <span class="help-block">
                <strong>{{ $errors->first('cin') }}</strong>
            </span>
        @endif
        <br>
    </div>
</div>


<div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Phone Number</label></div>
    <div class="col-12 col-md-9">
        {!! Form::text('phone',null, ['class' => 'form-control', 'placeholder' => 'Enter phone number']) !!}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        <br></div>
</div>


<div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Address</label></div>
    <div class="col-12 col-md-9">
        {!! Form::text('address',null, ['class' => 'form-control', 'placeholder' => 'Enter address',]) !!}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
        <br></div>
</div>


<div class="row form-group">
    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">City</label></div>
    <div class="col-12 col-md-9">
        {!! Form::text('city',null, ['class' => 'form-control', 'placeholder' => 'Enter city']) !!}
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
        <br>
    </div>
</div>

<div class="row form-group pull-right">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Submit
    </button>
    <button type="reset" class="btn btn-danger btn-sm" :click="clearInput">
        <i class="fa fa-ban"></i> Reset
    </button>
</div>




