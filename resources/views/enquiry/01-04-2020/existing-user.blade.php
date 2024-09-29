@extends('header')
@section('existing-user')


</div>
<div style="text-align: right;font-size: 18px;"> <a class="nav-link2" href="{{ url('new-user') }}" > New User    </a> </div>

<div class="container-fluid my-2">
        
        {{ Form::open(array('url'=>'existing-user' ,'files'=>'true', 'class' =>'existing-user-form')) }}
        <h3>Existing User</h3>
    <div class="row">
        <div class="col-md-12">
            <label for=""> Candidate Id  </label>
            {{Form::text('candidate_id',null, array('class' => 'form-control'))}}
        </div>
        {{-- <h4>OR</h4>
        <div class="col-md-12">
                <label for="">Mobile  </label>
                {{Form::text('Contact',null, array('class' => 'form-control'))}}
            </div> --}}

            <div class="col-md-12">
                    <label for=""> Status  </label>
                    <select name="status" id="" class="form-control">
                        @foreach($enq_status as $status)
                    <option value="{{$status->status}}">{{$status->status}}  </option>
                    @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                        <label for=""> Purpose </label>
                        <select name="purpose" id="" class="form-control">
                            @foreach($enq_purposes as $purpose)
                        <option value="{{$purpose->purpose}}">{{$purpose->purpose}}  </option>
                        @endforeach
                        </select>
                    </div>
         
    </div>
    <br>
    <div class="col-md-12" style="text-align: right">
    {{Form::submit('Submit', array('class'=>'btn btn-danger w-10'))}} {{Form::reset('Reset', array('class'=>'btn btn-danger w-10'))}}
    </div>
        {{Form::close()}}            
</div>


@endsection