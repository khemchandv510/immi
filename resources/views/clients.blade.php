

@extends('header')


@section('clients')

<!-- <div class="">  </div> -->

    
  

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
  
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div id="k3-addclient">
    <div class="container-fluid">
        <div class="row">
         <div class = "col-md-6">
           <button type = "button" class = "btn btn-color mx-1 my-2"> <a href="{{url('add-client')}}"> Add Client </a> </button>
           <button type = "button" class = "btn btn-color mx-1 my-2">Import</button>
           <button type = "button" class = "btn btn-color mx-1 my-2">Export</button>
           <button type = "button" class = "btn btn-color mx-1 my-2">Print</button>
       </div>

       {{ Form::open(array('url' => 'search-client')) }}    
       <div class="col-md-6 text-center">
           
               <!-- <input type="search" placeholder="Search" class="w-50 my-2 ph " name="client_search"> -->
               {!! Form::text('client_search') !!}
               <input type = "submit" class = "btn btn-color mx-1 my-2 align-baseline">
               <!-- <i class="fas fa-search"></i> -->
               <input type = "reset" class = "btn btn-color mx-1 my-2 align-baseline">
        
          </div>
        </div>
        
        <div class="row ">
            <div class="col-md-6 mx-auto py-4">
                Country</br>
                <select class="browser-default custom-select ">
                       <option selected>--Select Country--</option>
                       <option value="1">India</option>
                       <option value="2">Australia</option>
                       <option value="3">America</option>
                     </select>
            </div>
            
        </div>

        {{ Form::close() }} 
   
        <div class="row ">
               <div class="col-md-6 mx-auto ">
                   Source</br>
                   <select class="browser-default custom-select ">
                          <option selected>--Select--</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
               </div>
               
           </div>
   
           <div class="row ">
               <div class="col-md-6 mx-auto py-2">
                   Date
               </div>
           </div>
           
           <div class="row  ">
                   <div class="col-md-6 mx-auto ">
                      <div class="row"> 
                       <div class="col-md-6">   
                       
                       <input id="datepicker" placeholder="From" width="100%" />
                      </div>
                      <div class="col-md-6 ">   
                            
                           <input id="datepicker2"   placeholder="To" width="100%" />
                          </div>
                   </div>
               </div>
   
                   
                   
           </div>
         
           <div class="row pt-3 mx-auto">
               <table class="table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs" >
                   <thead>
                       <tr class="th-color">
                           <th scope="col">Client Ref No.</th>
                           <th scope="col"> Name</th>
                           
                           <th scope="col">Email </th>
                           <th scope="col">Mobile </th>
                           <th scope="col">Source </th>
                           <th scope="col">Status </th>
                           <th scope="col">Purpose </th>
                           <th scope="col">Action </th>
                       </tr>
                   </thead>
                   
                   <tbody>
                   @foreach($enquiries as $client)  
                       <tr>
                          <td><a class="client-detail" href={{url('client-enrolment/'.$client->unique_id )}}>{{ $client->unique_id }}</a></td>
                           <td>{{ $client->name }}</td>
                           
                           <td>{{ $client->email }}</td>
                           <td>{{ $client->contact }}</td>
                           <td>{{$client->agent_id}}</td>
                           <td>{{$client->disposition}}</td>
                           <td>{{$client->purpose_of_query}}</td>
                           
                           <td class="k3-icon-color"><i class="fas fa-trash-alt "></i></td>
                       </tr>
                       @endforeach
   
                                          
                   </tbody>
                       
               </table>
                 
                   
           </div>
       
              
       </div>
</div>
    
    



@endsection