@extends('header')
@section('recruitment')

</div>
{{Form::open(array('url' => 'lhjkh'))}}
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Name
                {{Form::text('name', null, array('class' => 'form-control'))}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Date
                {{Form::date('date', null ,array('class' => 'form-control'))}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Designation
                {{Form::text('designation[]', null, array('class' => 'form-control'))}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">
                {{Form::text('designation[]', null, array('class' => 'form-control'))}}
        </div>
    </div>
</div>
{{Form::close()}}

@endsection