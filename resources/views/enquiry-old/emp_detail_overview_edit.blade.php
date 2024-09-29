<style>

#emp_detail_overview_edit table td, #emp_detail_overview_edit  table th{
  padding: 4px;border: 1px solid #ecebeb ;
}
#emp_detail_overview_edit  table th{
    padding: 8px 11px;
}
#emp_detail_overview_edit  table select{
    width:100%;
}
</style>

                <!-- Modal -->
                <div id="emp_detail_overview_edit" class="modal fade " role="dialog">
                    <div class="modal-dialog">
          
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Edit Overview</h4>
                          </div>
                          <div class="modal-body">



<table class="table">
<tbody>
    {{Form::open(array('url'=>'edit-client-detail' , 'files' => "true"))}}
    @foreach($enquiries as $get)
    <input type="hidden" value="{{session()->get('unique_id_sess')}}" name="unique_id">
    <tr>
    <th>Gender </th>
    <td>
        <select name="gender" id=""class="form-control">
            {{-- <option value="{{$get->gender}}"  selected>  Male</option>
            @if($get->gender == "Male")
            <option value="female">Female</option>
            @elseif($get->gender == "Female")
            <option value="Other">Other</option>
            @else
            <option value="Male">Male</option>
            @endif --}}
    
    <?php
    switch ($get->gender){
        case"Male":
    ?>
     <option value="{{$get->gender}}">{{$get->gender}}</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    <?php
    break;
    case"Female":
    ?>
    <option value="{{$get->gender}}">{{$get->gender}}</option>
      <option value="Male">Male</option>
      <option value="Other">Other</option>
      <?php
      break;
      case"Other":
      ?>
    <option value="{{$get->gender}}">{{$get->gender}}</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <?php
    default:
    ?>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other"> Other</option>
    <?php
    }
      ?>
        </select>
    </td>
    
     
    </tr>
    <tr>
    <th>DOB </th>
    
    <td> 
        <input type="text" name="dob" value="{{$get->dob}}"class="form-control date">     
 </td>
    </tr>



    <tr>
    <th>Contact No </th>
    <td> <input type="number" name="number" value = "{{$get->contact}}" class="form-control" onkeypress="if(this.value.length==10)return false" placeholder="Contact No"> </td>
    </tr>
    
    
    
    <tr><th>Alternate No </th>
        <td> <input type="number" name="alternate_contact" value = "{{$get->alternate_contact}}" class="form-control" onkeypress="if(this.value.length==10)return false" placeholder="Alternate No"> </td>
    </tr>
    
    
    
    
    
    <tr>
        <th>Residence Phone No </th>
        <td> <input type="number" name="residence_phone_no" value="{{$get->residence_phone_no}}" class="form-control" placeholder="Alternate No"> </td>
        </tr>
    
    
    
    
    <tr>
    <th>Email </th>
    <td> <input type="email" name="email" value=" {{$get->email}}" class="form-control" placeholder="Email"> </td>
    </tr>
    
    
    
    <tr>
        <th>Alternate Email Id </th>
        <td> <input type="email" name="alterate_email" value=" {{$get->alterate_email}}" class="form-control" placeholder="Alternate Email Id"> </td>
        </tr>
    
    
    
    
    <tr>
        <th>Whatsapp No </th>
        <td> <input type="number" name="whatsapp_no" value="{{$get->whatsapp_no}}" class="form-control" placeholder="Whatsapp No"> </td>
        </tr>
    
    
    
    
        <tr>
            <th>Skype Id </th>
            <td> <input type="text" name="skype_id" value="{{$get->skype_id}}" class="form-control" placeholder="Skype Id"> </td>
            </tr>
    
            
    
    
        
    
        
    
    
     
    <tr>
    <th>Country </th>
    <td>
       
        <select name="country" id="" class="form-control" onChange="getState(this.value);" class="form-control">
                @if($get->country != null)
                
              <option value="{{$get->country}}" Selected >--{{$countries[$get->country-1]->country_name}}--</option>
                @endif
          @foreach($countries as $c)
        <option value={{$c->country_id}}>  {{ $c->country_name }} </option>
      @endforeach
  </select>
  </td>
    </tr>
      
            <tr>
                    <th>State </th>
                    <td> 
                        <select name="state" class="state-list form-control" onChange="getCity(this.value);" >
                            <option value="{{$get->state}}">{{$get->state}}</option> 
                                @if(($states->count() > 0 ))
                                <option selected value="{{$get->state}}" >--{{$states[0]->state_name}}--</option>
                                @endif
                               </select> 
                            </td>
    </tr>
    
    
     
            <tr>
                    <th>City </th>
                    
<td>    <select name="city" id="" class="form-control city-list" >
    <option value="{{$get->city}}">{{$get->city}}</option>
    @if(($cities->count() > 0))
    <option value={{$cities[0]->city_name}}>--{{$cities[0]->city_name}}--</option>
    @endif
</select>  </td>
            </tr>
    
    
    
    <tr>
    <th>Ho No / Street </th>
    <td> <input name="street"  type="text" value="{{$get->address_line1}}" class="form-control" placeholder="Ho No / Street"> </td>
    </tr>
    
    
    
    
    
    <tr>
        <th>Postal Code </th>
        <td> <input name="Pincode"  type="text" value="{{$get->pincode}}" class="form-control"  onkeypress="if(this.value.length==6)return false" placeholder="Pincode"> </td>
        </tr>
    
    <tr>
            <th>Country Of Birth </th>
            <td> <input name="country_of_birth"  type="text" value="{{$get->country_of_birth}}" class="form-control" placeholder="Country Of Birth"> </td>
            </tr>
    
            
    <tr>
            <th>State Of Birth </th>
            <td> <input name="satate_of_birth"  type="text" value="{{$get->satate_of_birth}}" class="form-control" placeholder="State Of Birth"> </td>
            </tr>
    
    
            <tr>
                    <th>Place Of Birth </th>
                    <td> <input name="place_of_birth"  type="text" value="{{$get->place_of_birth}}" class="form-control"  placeholder="Place Of Birth"> </td>
                    </tr>
    
                    <tr>
                            <th>Religioun  </th>
                            <td> <input name="religoius"  type="text" value="{{$get->religoius}}" class="form-control" placeholder="Religioun" > </td>
                            </tr>
    
    
                            <tr>
                                    <th>Current Country of residence  </th>
                                    <td> <input name="current_country_of_residence"  type="text" value="{{$get->current_country_of_residence}}" class="form-control" placeholder="Current Country of residence"> </td>
                                    </tr>
            
    
                                    <tr>
                                            <th> Nationality </th>
                                            <td> <input name="nationility"  type="text" value="{{$get->nationility}}" class="form-control" placeholder="Nationality" > </td>
                                            </tr>
    
                                            <tr>
                                                    <th> Medical history/illness </th>
                                                    <td> <input name="medical_histoty"  type="text" value="{{$get->medical_histoty}}" class="form-control" placeholder="Medical history/illness" > </td>
                                                    </tr>                                  
                                                    <tr>
                                                        <th> Criminal History/Cases </th>
                                                        <td> <input name="criminal_histry"  type="text" value="{{$get->criminal_histry}}" class="form-control" placeholder=" Criminal History/Cases" > </td>
                                                        </tr>  
                                                        <tr>
                                                            <th> Do you hold any other Nationalities ? </th>
                                                            <td> <input name="hold_other_nationality"  type="text" value="{{$get->hold_other_nationality}}" class="form-control" placeholder="Do you hold any other Nationalities ?" > </td>
                                                            </tr>                                                      
    
    @endforeach
    
    </tbody>
    
</table>
{{Form::submit("Update")}}
    {{Form::close()}}
                          </div></div></div></div>