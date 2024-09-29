@extends('header')
@section('add-course')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h3>Add Course</h3>
        <div class="container my-5">
     
     {{ Form::open(array('url' => 'add-course', 'class' => 'aa')) }}
            <div class="row content-color">
                
                {!! Form::hidden('college_code',Session()->get('college_code_sass')) !!}
                
                
                  <div class="col-md-4 py-3 ">Course Code :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('course_code',null, array('placeholder' => 'Course Code', 'class' => 'form-control' )) !!}
                   </div>
       
                   {{-- <div class="col-md-4 py-3 ">Cricos Code :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('cricos_code',null, array('placeholder' => 'Cricos Code', 'class' => 'form-control' )) !!}
                   </div> --}}

                   <div class="col-md-4 py-3 ">Course Name :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::text('course_name',null, array('placeholder' => 'Course Name', 'class' => 'form-control' )) !!}
                   
                   </div>

                   <div class="col-md-4 py-3 ">Award Level :</div>
                   <div class="col-md-8 py-3 ">

                    <select name="award_level" id="" class="form-control">
                        <?php $award_level =   DB::table('award_levels')->get();  ?>
<option selected disabled> Award Level</option>
@foreach($award_level as $award)
                    <option value="{{$award->award_level_value}}"> {{$award->award_level_value}}</option>
@endforeach

                    </select>
                  {{-- {!! Form::select('award_level', array('1' => '1', '1' => '1'), '1', array('class'=>'form-control')); !!} --}}
                   
                      </div>

                   <div class="col-md-4 py-3 ">Duration (F/Y Year) :</div>
                   <div class="col-md-8 py-3 ">
                   
                   {!! Form::number('duration_year',null, array('placeholder' => 'Duration', 'class' => 'form-control','onKeyPress'=>'if(this.value.length == 1) return false;' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Duration (weeks) :</div>
                   <div class="col-md-8 py-3 ">
                   
                   {!! Form::number('duration_week',null, array('placeholder' => 'Duration (weeks)', 'class' => 'form-control','onKeyPress'=>'if(this.value.length == 3) return false;' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Teaching Periods :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::number('teaching_period',null, array('placeholder' => 'Teaching Periods', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-4 py-3 ">Total Free :</div>
                   <div class="col-md-8 py-3 ">
                   {!! Form::number('fees',null, array('placeholder' => 'Fees', 'class' => 'form-control' )) !!}
                   </div>

                   <div class="col-md-12 text-center my-4" >
                   
                   {!! Form::submit('Submit',array('class' => 'btn btn-danger w-10'  )) !!}
                   {!! Form::reset('Reset', array('class' => 'btn btn-danger w-10' )) !!}
                 
                  </div>
               
            </div>
           
           {{ Form::close() }} 
     </div>
    </div>
</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection