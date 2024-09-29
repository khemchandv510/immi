<?php
use App\Helpers\Helper;
?>
@extends('header')
@section('asign-client-list')
</div>
</div>
{{-- <a  class="btn btn-danger" data-toggle="modal" data-target="#import_client" style="color:#fff">
        <i class="" aria-hidden="true" style="color:#fff"></i> Import Client
        </a> --}}


       
        
<style>
          .table tr th{
            background: #d2d2d2;
            color:#595e86;
            padding: 17px 0;
          }
        .table tr td, .table tr th{
          border: 1px solid #e5dfdf;
    text-align: center;
    max-width: 300px;
        }
        .close{
          color:#000;
        }
        </style>

{{-- <div class="list-page-top-link">
<a  data-toggle="modal" data-target="#import_client" href =""  aria-hidden="true" style="color:#000"></i> Assign Task
</a>
</div> --}}


{{-- start modal --}}
<div class="modal" id="import_client">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Assign Task</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           
        <?php
  $agent  = DB::table('users')->where('status',1)->get();
  ?>
        <div>
          <div class="assign-all-task">
          <p>
            Assign all task to other Employee 
                </p>
                <div>
                        {{Form::open(array('url'=>"assign-all-client" , 'class' => 'form'))}}
                        <div class="form-group">
                    <select name="asign_client_from" id="" class="form-control">
                        <option disabled selected> --From-- </option>
                        @foreach($agent as $a)
                      <option value="{{$a->unique_id}}">{{$a->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <select name="asign_client_to" id="" class="form-control">
                          <option disabled selected> --To-- </option>
                          @foreach($agent as $a)
                        <option value="{{$a->unique_id}}">{{$a->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Comment" name="comment">
                      </div>
                        {{Form::submit('Asign', array('class' => ' w-10 my-3', 'id' =>'save_comment_button'))}}
                        <a    data-toggle="modal" data-target="#all_assign" href =""  aria-hidden="true"   id="hide_prev_modal"> Previous Assigned </a>


                        <script>
                            $(document).ready(function(){
                              $('#hide_prev_modal').click(function(){
                                var element = document.getElementById('import_client');
           element.setAttribute('style', 'display:none !important');
                              });
                            });
                            </script>

  {{Form::close()}}
                
              </div>
              </div>
            </div> 

          </div>      
        </div>
      </div>
    </div>
{{-- end modal --}}

<br>

{{ Form::open(array('url'=>'search-assign-client', 'class' => 'enquiry-agent-name', "method" =>"get" )) }}

<input type="hidden" name="type" value = "0">
         <div class="row enquiry-agent-name">
         {{-- <div class="col-md-2"> {{  Form::date('date',null, array('class' => 'form-control'))  }} </div>
         <div class="col-md-2"> {{  Form::text('date',null, array('class' => 'form-control'))  }} </div> --}}

           {{-- kaushik ul --}}

      
         
         <div class="col-md-4">
           <label for="csad">Assigned Employee</label>  
             <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                 {{  Form::hidden('id',Auth::user()->employee_id )  }} 

             @if( Auth::user()->usertype_status =='1')
                 <?php
                 
                  $agent_id2 = Helper::getTotalEmployee();
                  
               //   $agent_id  = $agent_id->pluck('name','unique_id');
               // $agent_id = $agent_id->toArray() ;
                   
                   ?>
             {{-- {{ Form::select('agent_id',  (['' => 'Select Agent']+$agent_id),'', ['class' => 'form-control','id'=>'agent_id'])}} --}}
             <select  class="form-control" name="agent_id">
               <option value="">select</option>
               @foreach($agent_id2 as $s )
           <option value="{{$s->unique_id}}" <?php echo (!empty($agent_id) && ($agent_id == $s->unique_id))  ? 'selected' : ''; ?>>{{$s->name}}</option>;
             @endforeach
           </select>
@endif 
                                     </div>
         </div>



         <div class="col-md-4">
          <label for="csad">Assign From</label>  
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                {{  Form::hidden('id',Auth::user()->employee_id )  }} 

            @if( Auth::user()->usertype_status =='1')
                <?php
                
                 $agent_id2 = Helper::getTotalEmployee();
                 
              //   $agent_id  = $agent_id->pluck('name','unique_id');
              // $agent_id = $agent_id->toArray() ;
                  
                  ?>
            {{-- {{ Form::select('agent_id',  (['' => 'Select Agent']+$agent_id),'', ['class' => 'form-control','id'=>'agent_id'])}} --}}
            <select  class="form-control" name="from_agent_unique_id">
              <option value="">select</option>
              @foreach($agent_id2 as $s )
          <option value="{{$s->unique_id}}" <?php echo (!empty($from_assign_id) && ($from_assign_id == $s->unique_id))  ? 'selected' : ''; ?>>{{$s->name}}</option>;
            @endforeach
          </select>
@endif 
                                    </div>
        </div>

        
         <div class="col-md-4">
           <label for="csad">Name, Email, Mobile....</label>  
             <div class="input-group">
               
                 <span class="input-group-addon"><i class="fas fa-school"></i></span>
                 {{  Form::text('searchbox',isset($searchbox)?$searchbox:null, array('class' => 'form-control', 'placeholder' => 'Search here Name, Email, Mobile...'))  }}
                                     </div>
         </div>
         <div class="col-md-12" style=" text-align: center; ">
             {{ Form::submit('Search', array('class'=>'btn btn-danger w-10', )) }}
            <!--   {{ Form::submit('Reset', array('url'=>'enquiry-list', 'class' => 'enquiry-agent-name btn btn-danger w-10')) }} -->
             
             {{-- {{ Form::reset('Reset', array('class'=>'btn btn-danger w-10', )) }} --}}
             <a class="btn btn-danger w-10" href="{{url('asign-client-list') }}">Reset</a>
             

         </div>
         {{-- kaushik ul end --}}

         
</div>
{{Form::close()}}

            <div class="clearfix"></div>   
<hr>
{{-- <span class="fa fa-refresh fa-spin"></span> --}}
<div>
<table class="table">
    <tr>
        <th>Client Id</th>
        <th>Client Name</th>
        <th> Assigned From </th>
        <th> Assigned To</th>
        <th>Date</th>
        
        <th>Comment</th>
    </tr>
    <?php


    
    ?>
    
    

    @foreach($assign_client as $c)
<?php 
$agent_detail = DB::table('enq_asign_clients')
                    ->where('client_enquiry_id',$c->client_enquiry_id)

                    ->orderBy('id','DESC')
                    ->get();
                    
?>


<tr>
        <td> IC{{$agent_detail[0]->id}}</td>
        <td> {{$c->client_name}}</td>
        <td> {{$agent_detail[0]->from_agent_name}}</td>
        <td> {{$agent_detail[0]->agent_name}}</td>
        <td> {{$agent_detail[0]->date}}</td>
        <td> {{$agent_detail[0]->comment}} </td>
        
    </tr>
    @endforeach 
    
</table>
{{$assign_client->links()}}
</div>











<!-- start comment modal-->

{{-- filter by range start model --}}
<div class="modal" id="import_clientj">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Import Clients</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
               ducimus!
    
    
                 
              @if(Session::has('message'))
              <p >{{ Session::get('message') }}</p>
              @endif
              
    
              <form method='post' action={{url('import-client')}} enctype='multipart/form-data' >
                {{ csrf_field() }}
                <div class="custom-file">
                  <input type="file" class="custom-file-inpu" id="customFil" name="import_client">
                  
    </div>
              
                    <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" data-ng-submit="modal" value="Submit" name="submit">
    
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>      
          </div>
        </div>
      </div>
      <!-- end of comment Modal -->




{{-- start modal --}}

      <div class="modal" id="all_assign" style="padding-right: 0px !important">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 600px !important;">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Assign Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body" style="max-height: 400px;overflow:auto;">
                <table class="table">
                  <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Comment</th>
                  </tr>
                  <?php $get  = DB::table('enq_asign_alls')
                                ->where('status',1)
                                // ->select('from_unique_id','to_unique_id','date')
                                // ->groupBy('from_unique_id','to_unique_id','date')
                                // ->where('id', DB::raw("(select max(`id`) from enq_asign_alls)"))
                                // ->paginate(50);
                                ->get();
                              
                                ?>
                      @if(!empty($get))
                      @foreach($get as $g)
                      <?php $get_client = DB::table('users')
                                          ->where('unique_id',$g->from_unique_id)
                                          ->get();
                                          ?>
                                        
                  <tr>
                    <td>  @foreach($get_client as $c)
                        {{$c->name}} 
                        @endforeach
                      </td>
                  
                  <td> <?php
                     $get_client2 = DB::table('users')
                        ->where('unique_id',$g->to_unique_id)
                        ->get();
                       foreach ($get_client2 as $get_c) {
                         echo $get_c->name;
                       } 
                        ?>
                        </td>
                        <td> {{$g->date}} </td>
                        <td> {{$g->comment}} </td>
                  </tr>
                 
                  @endforeach
                  @endif
                </table>
                </div>      
              </div>
            </div>
          </div>
          <!-- end of comment Modal -->
    

@endsection