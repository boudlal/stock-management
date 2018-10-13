<div class="form-group">
    <label for="name" class="control-label mb-1">Item name</label>
    {{ Form::text('goods_name', null, ['class' => 'form-control', 'id' => 'name', 'required']) }}
    @if ($errors->has('goods_name'))
        <span class="help-block">
                <strong>{{ $errors->first('goods_name') }}</strong>
            </span>
    @endif
</div>



<div class="form-group has-success">
    <label for="quantity" class="control-label mb-1">Quantity</label>
    {{ Form::text('quantity', null, ['class' => 'form-control', 'id' => 'quantity', 'required']) }}
    @if ($errors->has('quantity') )
        <span class="help-block">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
    @endif
</div>


<div class="form-group">
    <label for="base_price" class="control-label mb-1">Base price</label>
    {{ Form::text('base_price', null, ['class' => 'form-control', 'id' => 'name', 'required']) }}
    @if ($errors->has('base_price'))
        <span class="help-block">
                <strong>{{ $errors->first('base_price') }}</strong>
            </span>
    @endif
</div>


<div class="form-group">
    <label for="selling_price" class="control-label mb-1">selling price</label>
    {{ Form::text('selling_price', null, ['class' => 'form-control', 'id' => 'selling_price', 'required']) }}
    @if ($errors->has('selling_price'))
        <span class="help-block">
                <strong>{{ $errors->first('selling_price') }}</strong>
            </span>
    @endif
</div>


<div class="form-group">
    <label for="status" class="control-label mb-1">status</label>
    {{ Form::select('status', stockStatus(), null, ['placeholder' => 'select ' ,'class' => 'form-control', 'id' => 'status', 'required']) }}
    @if ($errors->has('status'))
        <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
    @endif
</div>

<div class="row form-group pull-right">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Submit
    </button>
    <button type="reset" class="btn btn-danger btn-sm" :click="clearInput">
        <i class="fa fa-ban"></i> Reset
    </button>
</div>



