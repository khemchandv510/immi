
<?php 
use App\Helpers\Helper;
?>        
        <div class="col-md-3">
            <div class="immigration">
            <div class="client_indicator_heading"> <p> Activity </p></div>
            <ul name="" id="client_indicator">
              @if(!empty($enquiries))
                @foreach($enquiries as $get)

                

                @if(($get->name != "") )
                <li class="list-group-control">
                       <label class="custom-control material-checkbox">
                           <input type="checkbox" class="material-control-input" checked disabled>
                           <span class="material-control-indicator"></span>
                           <span class="material-control-description">0.0 Contact Student</span>
                       </label>
                </li>
                @else
                <li class="list-group-control">
                       <label class="custom-control material-checkbox">
                           <input type="checkbox" class="material-control-input">
                           <span class="material-control-indicator"></span>
                           <span class="material-control-description">0.0 Cintact Students</span>
                       </label>
                </li>
                @endif

              @if(($get->name != "") && ($get->contact != ""))
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
							<input type="checkbox" class="material-control-input" checked disabled>
							<span class="material-control-indicator"></span>
							<span class="material-control-description">0.1 Collect General Information</span>
                        </label>
                 </li>
                 @else
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
							<input type="checkbox" class="material-control-input">
							<span class="material-control-indicator"></span>
							<span class="material-control-description">0.1 Collect General Information</span>
                        </label>
                 </li>
                 @endif

                 @if(($get->set_priority != "0") )
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
							<input type="checkbox" class="material-control-input" checked disabled>
							<span class="material-control-indicator"></span>
							<span class="material-control-description">0.2 Classify Lead(H,W,C)</span>
                        </label>
                 </li>
@else
<li class="list-group-control">
        <label class="custom-control material-checkbox">
            <input type="checkbox" class="material-control-input" >
            <span class="material-control-indicator"></span>
            <span class="material-control-description">0.2 Classify Lead(H,W,C)</span>
        </label>
 </li>
@endif


@if(($get->appointment_done == "1") )
{{-- @dd($get->disposition) --}}
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
							<input type="checkbox" class="material-control-input " disabled checked>
							<span class="material-control-indicator"></span>
							<span class="material-control-description">0.3 Schedule Appoinment (if required)</span>
                        </label>
                 </li>
                 @else
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
                        <input type="checkbox" class="material-control-input checked-activity " data-id="Appoinment" id="{{$get->unique_id}}">
							<span class="material-control-indicator"></span>
							<span class="material-control-description">0.3 Schedule Appoinment (if required)</span>
                        </label>
                 </li>

@endif

@if(($get->get_complete_info == "1") )

<li class="list-group-control">
    <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input  " disabled checked>
        <span class="material-control-indicator"></span>
        <span class="material-control-description">1.0 Collect Personal Information </span>
    </label>
</li>
@else
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
							<input type="checkbox" class="material-control-input checked-activity " data-id="personal_info" id="{{$get->unique_id}}">
							<span class="material-control-indicator"></span>
							<span class="material-control-description">1.0 Collect Personal Information </span>
                        </label>
                 </li>

@endif




@if(($get->complete_visa_form == "1") )
                 
                 <li class="list-group-control">
						<label class="custom-control material-checkbox">
							<input type="checkbox" class="material-control-input " disabled checked>
							<span class="material-control-indicator"></span>
							<span class="material-control-description">1.1 Complete Visa Suitability Form</span>
                        </label>
                 </li>
@else

                 <li class="list-group-control">
                    <label class="custom-control material-checkbox">
                        <input type="checkbox" class="material-control-input checked-activity" data-id="visa_comp" id="{{$get->unique_id}}">
                        <span class="material-control-indicator"></span>
                        <span class="material-control-description">1.1 Complete Visa Suitability Form</span>
                    </label>
             </li>
@endif


@if(($get->complete_study_preference == "1") )

                 <li class="list-group-control">
                    <label class="custom-control material-checkbox">
                        <input type="checkbox" class="material-control-input" disabled checked>
                        <span class="material-control-indicator"></span>
                        <span class="material-control-description">1.2 Classify Prospect (Star Rating)</span>
                    </label>
             </li>
@else
             <li class="list-group-control">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input checked-activity" data-id="star_rat" id="{{$get->unique_id}}">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">1.2 Classify Prospect (Star Rating)</span>
                </label>
         </li>
@endif


             <li class="list-group-control">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input" >
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">1.3 Search Course</span>
                </label>
         </li>
         <?php
         $get_client_list_course  = Helper::get_client_list_course(session()->get('unique_id_sess'));
         if($get_client_list_course->count() > 0){
         ?>
         <li class="list-group-control">
            <label class="custom-control material-checkbox">
                <input type="checkbox" class="material-control-input " checked disabled>
                <span class="material-control-indicator"></span>
                <span class="material-control-description">1.4 Short List Courses</span>
            </label>
     </li>
    <?php 
    } else{
?>
<li class="list-group-control">
    <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input " disabled>
        <span class="material-control-indicator"></span>
        <span class="material-control-description">1.4 Short List Courses</span>
    </label>
</li>
     <?php
    }
     $get_rank_course  = Helper::get_client_rank_course(session()->get('unique_id_sess'));
     
     if($get_rank_course->count() > 0){
     ?>
     <li class="list-group-control">
        <label class="custom-control material-checkbox">
            <input type="checkbox" class="material-control-input" checked  disabled>
            <span class="material-control-indicator"></span>
            <span class="material-control-description">1.5 Rank Courses</span>
        </label>
 </li>
     <?php }
     else{
         ?>
        <li class="list-group-control">
        <label class="custom-control material-checkbox">
            <input type="checkbox" class="material-control-input" disabled>
            <span class="material-control-indicator"></span>
            <span class="material-control-description">1.5 Rank Courses</span>
        </label>
 </li>
 <?php 
}

     ?>

 <li class="list-group-control">
    <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input">
        <span class="material-control-indicator"></span>
        <span class="material-control-description">2.0 Complete Application Form</span>
    </label>
</li>



<li class="list-group-control">
    <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input" >
        <span class="material-control-indicator"></span>
        <span class="material-control-description"> 2.1 Collect Documnets </span>
    </label>
</li>


<li class="list-group-control">
    <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input">
        <span class="material-control-indicator"></span>
        <span class="material-control-description"> 2.2 Review  & Apply</span>
    </label>
</li>




<li class="list-group-control">
    <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input">
        <span class="material-control-indicator"></span>
        <span class="material-control-description"> 2.3 Application Payment (if required) </span>
    </label>
</li>


                @endforeach
                @endif
            </ul>
        </div>
</div>

