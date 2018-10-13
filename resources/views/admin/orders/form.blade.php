

<div class="row" id="add">
    <div class="col-6">
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Goods</label>
            {!! Form::select('stock[]', goods(), null, ['class' => 'form-control', 'id' => 'stock', 'required']) !!}
        </div>
    </div>
    <div class="col-6">
        <label for="cc-payment" class="control-label mb-1">Quantity</label>
        {!! Form::number('quantity[]', null, ['class' => 'form-control', 'required']) !!}

    </div>
</div>





<div class="form-group">
    <label for="cc-payment" class="control-label mb-1">Clients</label>
    {!! Form::select('client', clients(), null, ['class' => 'form-control']) !!}
</div>

<br>
