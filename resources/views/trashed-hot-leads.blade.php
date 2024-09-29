@extends('header')
@section('trash-student')
</div>

<style>
  .table tr td, .table tr th{
    text-align: center;
    border: 1px solid #f7ecec;
    padding: 10px;
    border-right: 1px solid #e8e8e8 !important;
  }
.trash-table tr:nth-child(1) {
    background: #458bbb;
    color: #fff;
}
.trash-table .fa, .trash-table .fas{
    color:#ffffff;
}
.trash-table th{
        position: sticky;
    top: -5px;
}
#example .fa-edit,  #example .fa-trash,  #example .fa-tasks   {
      color: #ffffff !important;
      font-size: 13px;
    }
    .btn-danger{
    background: #c51f1a !important;
    border:1px solid #c51f1a !important;
    }
    
    .btn-primary{
      background: #3490dc !important;
      border:1px solid #3490dc !important;
    }
</style>
<div class="row">
  <div class="col-md-4"></div>
<div class="col-md-8 col-xs-8 col-sm-12 col-lg-8 " style=" text-align: end; ">
  <ul>
    <a href="{{ url(Request::segment(1).'/hot-lead') }}">
    <li class="btn-special btn-icon btn-googleplus" id=""><i class="fa fa-file-excel-o" aria-hidden="true"></i><span   id="exportexcell" style="padding-left: 5px; padding-right: 5px;" >Back</span></li>
  </a>
    
    
  
  
  </ul>
</div>
</div>
          <center> <h2 class="text-primary">Trashed Hot Leads</h2></center>
        <table class="table trash-table">
          
        <tr>
           <th>#</th>
            <th> Source </th>
            <th>Date</th>
            <th>Name</th>
            <th>Contact No</th>
            <th>Country</th>
            <th>Action</th>
            
        </tr>
        <?php
        if(isset($_GET['page'])){
        $a =  $_GET['page'] * 10;
        }else{
          $a = 10;
        }
        $b = $a-9
        ?>
        @foreach($get as $get2 )
        <tr>
          
            <td>{{ $b++ }}</td>
            <td> {{$get2->source}} </td>
            <td> {{date('d-m-Y', strtotime($get2->date))}}</td>
            <td> {{$get2->name}} </td>
            <td> {{$get2->number}} </td>
            <td> {{$get2->country}} </td>
            
            <td> 
                 
            <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <a href="{{ url(Request::segment(1).'/'.'undo-hot-lead/'.$get2->unique_id) }}" title="Undo Delete" onclick="return confirm('Are you sure to Undo Trash this?')">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" > <i class="fa fa-undo"></i></button>
                       </a>       
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ url(Request::segment(1).'/'.'permanent-delete-hot-lead/'.$get2->unique_id) }}" title="Permanent Delete" onclick="return confirm('Are you sure to Permanent Delete this?')">
                            <button type="button" class="btn btn-danger btn-sm rounded-0" > <i class="fa fa-trash"></i></button>
                           </a>       
                        </li>
            </ul>

        </td>

            
        </tr>

        @endforeach
        <tr>
          <td colspan="7"> {{ $get->links() }}</td>
        </tr>
</table>


@endsection