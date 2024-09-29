

<!-- The Modal -->
<div class="modal" id="add_doc_again">

    <div class="modal-dialog" style="width:1000px;max-width:1000px;">
    <div class="modal-content" style="width:1000px !important; min-height:
    300px;max-width:1000px; ">
    <!-- Modal Header -->
    <div class="modal-header">
        <h4 style="width: 100%;
        text-align: center;"> Document Uploaded </h4>
    <button type="button" class="close" data-dismiss="modal" style="
    color: #383838;" >&times;</button>
    </div>
    <div>
        <form action="">
            <table class="table" id="join">
                <tbody>
@if($upload_documents_again->count() > 0)
{{-- @dd($upload_documents_again); --}}
@foreach($ch as $c)
@if(($upload_documents_again[0]->upload_documents_again == 1) &&($c->approve_or_not == 2))
@foreach($check_document_status as $tm)

    
<tr style="background: #fff;" class="center">
    <td><p> {{$tm->qualification}}  </p></td>   
    <td> <a href = "{{url('public/uploads/enrolment_documents/'.$tm->document_name)}}" target=_blank> <img src="{{url('public/uploads/enrolment_documents/'.$tm->document_name)}}" alt="{{$tm->document_name}}" style="width:50px;" >
    </a> </td> 
    <td> 
    @if($tm->approve_or_not == 2)
    <label class="switch toggle-button " >
                    <input type="checkbox" >
                    <span class="slider round  approve-documents"
                    data-id="{{$tm->unique_id}}" ></span>
                    </label>     
                    @elseif($tm->approve_or_not == 1)
                    <label class="switch toggle-button " style="pointer-events: none" >
                            <input type="checkbox" checked   disabled >
                            <span class="slider round "
                            data-id="{{$tm->document_name}}"  style="background:#b2bdb3" ></span>
                            </label>  
                            @endif   
    </td>
    @if($tm->approve_or_not == 2)
    <td> <p class="approve_or_not" id="{{'aa'.$tm->unique_id}}"> Disapproved</p> </td>
    @else <td><p class="approve_or_not" id="{{'aa'.$tm->unique_id}}"> Approved</p> </td>
    @endif
        </tr>

        

@endforeach
@endif

@endforeach
@endif
    </tbody>
</table>
<hr style="background: #fff;">

<div style="text-align: center">

    
        <input class="btn btn-danger" style="background: #616e62 !important; margin-bottom:20px" id="approve_button_disabled"  type="submit" value="Save">
        
        </div>
    </form>
    </div>
    </div>
    </div>
</div>






<!-- The Modal -->

<!-- The Modal -->

<div class="modal" id="enrolment_proceed">

<div class="modal-dialog" style="width:1000px;max-width:1000px;">
<div class="modal-content" style="width:1000px !important; min-height:
300px;max-width:1000px; ">
<!-- Modal Header -->
<div class="modal-header" style="
border: none;">
<button type="button" class="close" data-dismiss="modal" style="
font-size: 38px;
color: #383838;" >&times;</button>
<?php



if($ch->count() > 0){
if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2)){
    ?>
    <h3 style="width:100%;text-align:center"> Document Upload Again </h3>    
<?php
}
}

elseif($check_document_status->count() > 0){
?>
<h3 style="width:100%;text-align:center"> Documents Uploaded </h3>
<?php
} else{
?>
<h3 style="width:100%;text-align:center"> Upload Documents  </h3>
<?php }  ?>
</div>
<hr style="margin: 0; padding:0">
<!-- Modal body -->

@if(Auth::user()->usertype_status == "1")


@if($ch->count() > 0)
    @if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2))
        {{Form::open(array('url' => 'documents-upload-again', 'files' =>'true' ))}}
        {{Form::hidden('check_status',$check_document_status[0]->client_unique_id)}}
        {{-- @dd('sfsf'); --}}
@endif
@elseif($check_document_status->count() > 0)
{{Form::open(array('url' => 'enrol-documents-verify', 'files' =>'true' ) )}}
    {{Form::hidden('check_status',$check_document_status[0]->client_unique_id)}}
@else
{{Form::open(array('url' => 'enrol-documents', 'files' =>'true' ) )}}
@endif
@endif
<div class="modal-body" style=";width: 80%;margin: auto;">
<table class="table" id="join">
<tbody >


        @if($ch->count() > 0)
        @if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2))

        <?php $ab = 20; ?>
          @foreach($check_document_status as $tm)
        <tr style="background: #fff;">
            <td><p> {{$tm->qualification}}  </p></td>   
            <td> <img src="{{url('public\uploads\enrolment_documents/'.$tm->document_name)}}" alt="{{$tm->document_name}}" style="width:20px;"> </td> 


            <td> 
            @if($tm->approve_or_not == 2)


            <label class="switch toggle-button " >
                            <input type="checkbox" disabled>
                            <span class="slider round "
                            data-id="{{$tm->document_name}}" ></span>
                            </label>     
                            @elseif($tm->approve_or_not == 1)
                            
                            <label class="switch toggle-button " >
                                    <input type="checkbox" checked disabled>
                                    <span class="slider round "
                                    data-id="{{$tm->document_name}}" ></span>
                                    </label>  
                                    @endif   

            </td>
            <td style="border-top:none !important">
 @if($tm->approve_or_not == 2)

            <label id="lab1" for="{{'files'.$ab}}" class="add-document-button"
                >Add Document</label>
                <input class="tes" id="{{'files'.$ab}}" name="document_name[]" type="file"
                style="display:none"  />
                {{Form::hidden('u_id[]', $tm->unique_id)}}
          
                @elseif($tm->approve_or_not == 1)
                <label style="color:seagreen" class="add-document-butto"
                >Approved</label>
                
           @endif
                </td>
                
                <?php $ab++;          ?>
                <td style="background: white;
                border: none;">
                
              
                </td>
                </tr>
@endforeach

    @endif




@elseif($check_document_status->count() > 0)
@foreach($check_document_status as $a)
<tr style="background: #fff;">
<td style="border-top:none !important">
<p> {{$a->qualification}} </p>
</td>
<td>
<div id="{{'a'.$a->id.'modal'}}" class="{{'a'.$a->id.'modal'}}">
<span class="{{'a'.$a->id.'close'}}">&times;</span>

<img class="{{'a'.$a->id}}" id="{{'a'.$a->id}}">
<div id="{{'a'.$a->id."cap"}}"></div>
</div>
<?php
$hol = $a->document_name;
$m= strstr($hol, '.pdf') ?>
{{-- @dd($hol); --}}
@if($m == ".pdf")
<a href="{{url('public\uploads\enrolment_documents/'.$hol)}}"
target="_blank" id="{{'a'.$a->id.'0oo'}}">
PDF </a>
@else
<img src="{{url('public\uploads\enrolment_documents/'.$hol)}}"
id="{{'a'.$a->id.'oo'}}" alt="" style="width:80px;">
@endif
</td>
{{-- <img id="myImg" src="img_snow.jpg" alt="Snow"
style="width:100%;max-width:300px"> --}}

<td class="" >
@if($a->approve_or_not == 1)
<label class="switch toggle-button " >
<input type="checkbox" checked >
<span class="slider round approve-documents"
data-id="{{$a->unique_id}}" ></span>
</label>
</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"
style="color:#47a14f">Approved </p> </td>
@elseif($a->approve_or_not == 2)
<label class="switch toggle-button " >
<input type="checkbox" >
<span class="slider round approve-documents"
data-id="{{$a->unique_id}}" ></span>
</label>
</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"
style="color:#d65f5f">Disapproved </p> </td>
@else
<label class="switch toggle-button " >
<input type="checkbox" >
<span class="slider round approve-documents "
data-id="{{$a->unique_id}}" ></span>
</label>
</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"> </p> </td>
@endif

</td>
<td> <p class="approve_or_not" id="{{'aa'.$a->unique_id}}"> </p> </td>
</tr>
<style>

#{{'a'.$a->id.'oo'}} {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}
#{{'a'.$a->id.'oo'}}:hover {opacity: 0.7;}
/* The Modal (background) */
.{{'a'.$a->id.'modal'}} {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
/* Modal Content (image) */
.{{'a'.$a->id}} {
margin: auto;
display: block;
width: 100%;
max-width: 700px;
}
/* Caption of Modal Image */
#{{'a'.$a->id."cap"}} {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}
/* Add Animation */
.{{'a'.$a->id}}, #{{'a'.$a->id."cap"}} {
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)}
to {-webkit-transform:scale(1)}
}
@keyframes zoom {
from {transform:scale(0)}
to {transform:scale(1)}
}
/* The Close Button */
.{{'a'.$a->id.'close'}} {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}
.{{'a'.$a->id.'close'}}:hover,
.{{'a'.$a->id.'close'}}:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
width: 100%;
}
}</style>
<script>
// Get the modal
var modal = document.getElementById("{{'a'.$a->id.'modal'}}");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("{{'a'.$a->id.'oo'}}");
var modalImg = document.getElementById("{{'a'.$a->id}}");
var captionText = document.getElementById("{{'a'.$a->id.'cap'}}");
img.onclick = function(){
modal.style.display = "block";
modalImg.src = this.src;
captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("{{'a'.$a->id.'close'}}")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
</script>
@endforeach
@else
<tr style="background: #fff;">
<td style="border-top:none !important">


<select name="qualification_name[]" id="qualification1"
class="choose-qualification"
onchange="hide_selected_value(this.value,$(this).attr('id'));" >
<option selected disabled> selected </option>
<option value="Certificate I"> Certificate I </option>
<option value="Certificate II"> Certificate II </option>
<option value="Certificate III"> Certificate III </option>
<option value="Certificate IV"> Certificate IV </option>
<option value="Diploma"> Diploma </option>
<option value="Advance Diploma"> Advance Diploma </option>
<option value="10"> 10 </option>
<option value="12"> 12 </option>
<option value="Graduate"> Graduate </option>
<option value="post Graduate"> Post Graduate </option>
</select>
<label id="lab1" for="files1" class="add-document-button"
onclick="get_select_length();" onchange="handleFileSelect();">Add Document</label>
<input class="tes" id="files1" name="document_name[]" type="file"
style="display:none"   disabled />
</td>


<td style="background: white;
border: none;">

<div class=" add-more-document" > <i class="fa fa-plus
add-more-document-plus" ></i> <i class="fa fa-minus
add-more-document-minus " style="display:none"></i> </div>
</td>
</tr>
@endif

</tbody>
</table>


<output id="result" style="display: flex;
overflow: auto; border: 1px solid #efefef;
border-radius: 7px;"></output>
{{-- <output id="result2" style="display: flex;
overflow: auto; border: 1px solid #efefef;
border-radius: 7px;"> --}}


{{-- <img id="myImg" src="img_snow.jpg" alt="Snow"
style="width:100%;max-width:300px"> --}}
{{-- <div id="myModal" class="modal">
<span class="close">&times;</span>
<img class="modal-content" id="img01">
<div id="caption"></div>
</div> --}}


</div>
<div style="text-align: center">

    <?php
    $disabled = DB::table('enrolment_documents')
  ->where('client_unique_id',session()->get('unique_id_sess'))
  ->where('approve_or_not', 0)
  ->get();
if($disabled->count()  >0 ){
  ?>

{{Form::submit('Save', array('class' => "btn btn-danger", 'style' =>
"background: #616e62 !important; margin-bottom:20px", 'id' => 'approve_button_disabled'))}}
<?php }
else{
    ?>
{{Form::submit('Save', array('class' => "btn btn-danger", 'style' =>
"background: #616e62 !important; margin-bottom:20px", 'id' => 'approve_button_disabled'))}}
<?php
}
?>

</div>
{{Form::close()}}
</div>
</div>
</div>
{{-- end modal --}}












<div style="text-align: right;
margin-right: 44px;">
<?php
$check_document_status = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))->get();


$ch = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('approve_or_not',2)
->get();

$upload_documents_again = DB::table('enrolment_documents')
->where('client_unique_id',session()->get('unique_id_sess'))
->where('upload_documents_again', 1)
->get();


if($upload_documents_again->count() > 0){
    if(($check_document_status->count() > 0) && ($upload_documents_again[0]->upload_documents_again == 1)){
        ?>
        <button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#add_doc_again" style=><i class="" aria-hidden="true"></i>
Documents Uploaded Again</button>
<?php
    }
}

elseif($ch->count() > 0){
if(($check_document_status->count() > 0) && ($ch[0]->approve_or_not == 2)){
    ?>
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Upload Again</button>
<?php
} 
}


elseif($check_document_status->count() > 0){

$approve = DB::table('enrolment_documents')
        ->where('client_unique_id', session()->get('unique_id_sess'))
        ->where('approve_or_not',1)
        ->get();
        // $approve-count()

if($approve->count()  == $check_document_status->count())
{}
else{
?> 
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Uploaded</button>
<?php
}
}
else{
?>
<br>
<br>
<br>
<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#enrolment_proceed"><i class="" aria-hidden="true"></i>
Proceed</button>
<?php }
?>

</div>










<script>
    $(document).ready(function(){
        $('.approve-documents').click(function(){  
            var unique_id  = "{{session()->get('unique_id_sess')}}";
            $.ajaxSetup({
headers:{
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:"get",
url:"{{url('disabled_button')}}?a="+unique_id,
success:function(data){
    if(data == 1){
    document.getElementById('approve_button_disabled').removeAttribute("disabled","");
    }
    // else{
    //     document.getElementById('approve_button_disabled').setAttribute("disabled","");
    // }
}
        });
    });
});

</script>



<script>

    $('.approve-documents').on('click',function(){
    var unique_id = $(this).attr("data-id");
    // alert('sd');     
    $.ajaxSetup({
    headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    type:"get",
    url:"{{url('client-document-approved')}}?a="+unique_id,
    success:function(data){
    // alert(data);
    var uid = data.substring(0, 10);
    var num = data.substring(10, 14);
    if(num == "num1"){
    document.getElementById(uid).style.color="#47a14f";
    document.getElementById(uid).innerHTML = " Approved";
    }
    else{
    document.getElementById(uid).style.color="#d65f5f";
    document.getElementById(uid).innerHTML = "Disapproved";
    }
    // $(this).html("Approved");
    // var parent_div = document.getElementById('join');
    // var p = document.createElement('p');
    // parent_div.getElementsByTagName('tr')[0].appendChild(p);
    // p.innerHTML = "Approved";
    }
    });
    });
    
    </script>
