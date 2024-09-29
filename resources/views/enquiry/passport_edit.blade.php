 {{-- @dd($get_id_proof_details) --}}
@if($get_passport->count() >0)
                        <div id="passport_edit" class="modal fade " role="dialog">
                            <div class="modal-dialog">
                          
                              <!-- Modal content-->
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit Passport</h4>
                                  </div>
                                  <div class="modal-body">
                                    {{Form::open(array('url'=> 'add-update-passport', 'files'=> true))}}
                                    <input type="hidden" name="unique_id"  value="{{session()->get('unique_id_sess')}}">
                                    <table>
                                        <tr>
                                            <th>Name in Passport</td>
                              
                                            <td>  <input type="text" name="name_on_passport" value="{{isset($get_passport[0]->name_on_id_proof)?$get_passport[0]->name_on_id_proof:''}}" class="form-control" placeholder="Name of Passport"> </td>
                                            </tr>
                                
                                            <tr>
                                                <th>Passport Number</td>
                                            
                                            <td> <input type="text" name="passport_number" value="{{isset($get_passport[0]->id_proof_number)?$get_passport[0]->id_proof_number:''}}" class="form-control" placeholder="Passport Number"> </td>
                                            </tr>
                                            <tr>
                                                <th> Date of Birth </td>
                                            
                                            <td> <input type="text" class="date form-control" name="date_of_birth" value="{{isset($get_passport[0]->date_of_birth)?$get_passport[0]->date_of_birth:''}}" > </td>
                                            </tr>
                                            <tr>
                                                <th>Passport Issue City </td>
                                                    
                                            <td> <input type="text" name="place_of_issue" value="{{isset($get_passport[0]->place_of_issue)?$get_passport[0]->place_of_issue:''}}" class="form-control" placeholder="Passport Issue City "> </td>
                                                </tr>
                                <tr>
                                                <th> Date of Issue</td>
                                                    
                                            <td> <input type="text" class="date form-control" name="date_of_issue_passport" value="{{isset($get_passport[0]->date_of_issue_passport)?$get_passport[0]->date_of_issue_passport:''}}" > </td>
                                </tr>
                                <tr>
                                <th>
                                    Date of expiry
                                    
                                </th>
                                
                                <td> <input type="text" class="date form-control" name="date_of_expiry_passport" value="{{isset($get_passport[0]->date_of_expiry_passport)?$get_passport[0]->date_of_expiry_passport:''}}" > </td>
                                        </tr>
                                        
                                <tr>
                                    <th>Passport Front Image</th>
                                    {{-- @dd($get_passport[0]->id_image)   --}}
                                    <td>
                                        @if(isset($get_passport[0]->id_image))
        <a href="{{url("public/uploads/image/passport/".$get_passport[0]->enquiry_id.'/'.$get_passport[0]->id_image)}}" target="_blank"> 
    {{--<img style="width:80px;"  src={{url("public/uploads/image/passport/".$get_passport[0]->enquiry_id.'/'.$get_passport[0]->id_image)}} > --}}
    
    {{$get_passport[0]->id_image}} 
    </a>
    <br>
              <input type="hidden" value="{{$get_passport[0]->id_image}}" name="h_upload_passport">
                                    @endif
                                      
                                    {{-- <label for="passport_file" class="upload-file"> Upload Passport Image</label> --}}
                                         <input type="file" name="upload_passport" class="upload-file" id="passport_file" style="display:non">

                                         
                                </td>     
                                </tr>
                                
                                
                                
                                
                                
                                 <tr>
                                    <th>Passport Back Image</th>
                                    
                                    <td>
                                        @if(isset($get_passport[0]->passport_back_image))
     <a href="{{url("public/uploads/image/passport/".$get_passport[0]->enquiry_id.'/'.$get_passport[0]->passport_back_image)}}" target="_blank">
          {{--<img style="width:80px;"  src={{url("public/uploads/image/passport/".$get_passport[0]->enquiry_id.'/'.$get_passport[0]->passport_back_image)}} >--}}
          
          {{$get_passport[0]->passport_back_image}} 
          
          </a>
               <br>
         <input type="hidden" value="{{$get_passport[0]->passport_back_image}}" name="h_upload_back_passport">
                                    @endif
                                      
                                    {{-- <label for="passport_file" class="upload-file"> Upload Passport Image</label> --}}
         <input type="file" name="passport_back_image" class="upload-file" id="passport_back_image" style="display:non">

                                         
                                </td>     
                                </tr>
                                
                                
                                
                                
                                
                                    </table> 
                                    <input type="submit">   
                                    {{Form::close()}}
  
  
                                  </div></div></div></div>                                  

@else



          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Passport</h4>
          </div>
          <hr>
          <div class="modal-body">
            {{Form::open(array('url'=> 'add-update-passport', 'files'=> true))}}
            <input type="hidden" name="unique_id"  value="{{session()->get('unique_id_sess')}}">
            <table>
                <tr>
                    <th>Name in Passport</td>
      
                    <td>  <input type="text" name="name_on_passport" placeholder="Name on Passport" class="form-control"> </td>
                    </tr>
        
                    <tr>
                        <th>Passport Number</td>
                    
                    <td> <input type="text" name="passport_number" value="{{isset($get_passport[0]->id_proof_number)?$get_passport[0]->id_proof_number:''}}" class="form-control"> </td>
                    </tr>
                    <tr>
                        <th> Date of Birth </td>
                    
                    <td> <input type="text" class="date form-control" name="date_of_birth" placeholder="Date of Birth" > </td>
                    </tr>
                    <tr>
                        <th>Passport Issue City </td>
                            
                    <td> <input type="text" name="place_of_issue" placeholder="Passport Issue City" class="form-control"> </td>
                        </tr>
        <tr>
                        <th> Date of Issue</td>
                            
                    <td> <input type="text" class="date form-control" name="date_of_issue_passport" placeholder="Date of Issue" > </td>
        </tr>
        <tr>
        <th>
            Date of expiry
        </td>
        
        <td> <input type="text" class="date form-control" name="date_of_expiry_passport" placeholder="Date of expiry" > </td>
                </tr>
        
        <tr>
            <th>Image</th>
            {{--@dd($get_passport) --}}
            <td>
                {{-- @if(isset($get_passport[0]->id_image))
                <a href="{{url("public/uploads/image/passport/".$get_passport[0]->enquiry_id.'/'.$get_passport[0]->id_image)}}" target="_blank"> <img style="width:80px;"  src={{url("public/uploads/image/passport/".$get_passport[0]->enquiry_id.'/'.$get_passport[0]->enquiry_id.'/'.$get_passport[0]->id_image)}} alt="">{{$get_passport[0]->id_image}} </a>
                @endif
            <input type="hidden" value="{{$get_passport[0]->id_image}}" name="h_upload_passport">
             --}}
        
        
                 <input type="file" name="upload_passport" class="upload-file" id="passport_file" >

                 
        </td>     
        </tr>
        
            </table> 
            <input type="submit">   
            {{Form::close()}}


          </div>
        
@endif
                                  

                                  @if($get_id_proof_details->count() > 0)
                                  @foreach($get_id_proof_details as $e) 
<div id="id_proof_detail_edit{{$e->id}}" class="modal fade " role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Id Proof</h4>
          </div>
          <div class="modal-body">
                {{Form::open(array('url' =>'update-idproof', 'files' => 'true'))}}
            <table class="table add-more-document-paren">
                <tr><th>Id Proof</th>
                <td>
                    <input type="text" name="id_proof" value="{!!$e->id_proof!!}" class="form-control" required readonly>  

                   


    </td>
                </tr>
                <tr>
                <th>
                  Name (Name In ID Proof)</th>
                
                
<td>
    <input type="text" name="name_on_id_proof" value="{!! $e->name_on_id_proof !!}" class="form-control" required>  
     </td>                
                <tr>
                  <th >
                    ID Proof No</th>
                    <td>
                        <input type="text" name="id_proof_number" value="{!! $e->id_proof_number !!}" class="form-control" required> 

                    </td>
                </tr>



                {{-- <input type="text" name="id_proof_number[]" value="{!! $e->id_proof_number !!}" class="form-control" required>  --}}

                <tr>
<th >Upload</th>
                <td>

                    <a href="{{url('public/uploads/image/passport/other/'.$e->enquiry_id.'/'.$e->id_image)}}" target="_blank"> <img style="width:80px;"  src="{{url('public/uploads/image/passport/other/'.$e->enquiry_id.'/'.$e->id_image)}}" > </a> 


                     <input type="file" id="{{'a'.$e->id}}" name="id_image_hidden" value="{!! $e->id_image!!}" class="form-control upload-file" img-id="{{$e->id}}"  onchange="set_hidden_image_data(this);">  


                     


                </td>
                </tr>
                             <input type="hidden" name="id_image_hidden1" value="{{$e->id_image}}"  >
            <input type="hidden" name="unique_id"  value="{{$e->enquiry_id}}"> 
</table>                
                {{Form::submit('Update')}}
{{Form::close()}}
          </div></div></div></div>

          @endforeach
          @endif
          






          
<div id="other_id_add" class="modal fade " role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Other Id Proof</h4>
          </div>
          <div class="modal-body">
            {{Form::open(array('url' =>'update-idproof', 'files' => 'true'))}}
            <table class="table add-more-document-parent">
                <tr>
                <th>Id Proof</th>
                <td>
                    {{-- <input type="text" name="id_proof" value="" class="form-control" required>   --}}
                    <select name="id_proof" id="" required>
                       

                        <option value="Aadhar Card">Aadhar Card</option>
                        <option value="Voter Card">Voter Card</option>
                        <option value="Driving License">Driving License</option>
                    </select>
    </td>
                </tr>

                <tr>
                <th>
                  Name (Name In ID Proof</th>
                
                
<td>
    <input type="text" name="name_on_id_proof" value="" class="form-control" required>  
     </td>                
                <tr>
                  <th >
                    ID Proof No</th>
                    <td>
                        <input type="text" name="id_proof_number" value="" class="form-control" required> 

                    </td>
                </tr>



                {{-- <input type="text" name="id_proof_number[]" value="" class="form-control" required>  --}}

                <tr>
<th >Upload</th>
                <td>
                    <input type="file" name="id_image_hidden" value="" class="form-control" required accept="image/png, image/jpeg,application/pdf">         
                </td>
                </tr>


<input type="hidden" name="unique_id" id="" value="{{session()->get('unique_id_sess')}}"> 
</table>            

 
      {{Form::submit('Save')}} 
 
{{Form::close()}}


          </div></div></div></div>


<script>
          document.querySelector('#id_proof_detail .nav.nav-tabs').children[{{$get_id_proof_details->count()-1}}].firstElementChild.
    classList.add('active');
        document.querySelector('#id_proof_detail .tab-content.content-style').children[{{$get_id_proof_details->count()-1}}].className += " " + "active";
    </script>