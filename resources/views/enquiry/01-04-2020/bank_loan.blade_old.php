

<div role="tabpane" class="tab-pane " id="bank_loan">
    {{Form::open(array('url' => 'request-bank-loan'))}}
    <div class="bank-name">
        <label class="control control--checkbox">ICICI BANK
            <input type="checkbox" checked="checked" value="icici" name="icici"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">HDFC
            <input type="checkbox" value="hdfc"  name="hdfc"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">SBI
            <input type="checkbox" value="SBI"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">KOTAK MAHINDRA BANK
            <input type="checkbox" value="kotak"/>
            <div class="control__indicator"></div>
            <input type="text" value="{{Session()->get('unique_id_sess')}}" name="unique_id">
          </label>
        </div>
          
          {{-- <label class="control control--checkbox">Disabled
            <input type="checkbox" disabled="disabled"/>
            <div class="control__indicator"></div>
          </label>
          <label class="control control--checkbox">Disabled & checked
            <input type="checkbox" disabled="disabled" checked="checked"/>
            <div class="control__indicator"></div>
          </label> --}}
        
    {{--     
          <div> 
            <input type="checkbox" name="">    
            </div> --}}
    
    
    
    
    
    
    
    
            <table id="">
              
                
                <?php $enquiries =    DB::table('enquiries')
                ->where('unique_id',Session::get('unique_id_sess'))
                ->get();

                ?>
                @foreach($enquiries as $e)
            <tr>
                <td>  {{$e->name}}  </td>
            </tr>
            <tr>
                 <td> {{$e->address_line1}} {{$e->address_line2 }}  </td>
             </tr>
             <tr>
                     <td> {{$e->city}} 
                         <?php 
                                 $st = DB::table('states')
                                         ->where('state_id',$e->state)
                                         ->get();
                                         
                                        
                                 ?>
                 @if($st->count() > 0)
                 {{$st[0]->state_name}}
                 @endif
                  </td>
                 </tr>
    @endforeach
    
                 <tr>
                         <td style="padding-top: 20px;" >Date:-  {{date('d-m-Y')}} </td>
                     </tr>
    
                     {{-- <tr>
                             <td style="padding-top: 20px;">  National Bank</td>
                         </tr>
                         <tr>
                              <td>2390 Line </td>
                          </tr>
                          <tr>
                                  <td>New Delhi India</td>
                              </tr> --}}
                              <tr>
                                     <td style="padding-top: 20px;"> Attn: Student Loans/Lending Department </td>
                                 </tr>
                              
                                 <tr>
                                         <td style="padding-top: 20px;"> Dear Lending Department, </td>
                                     </tr>
    
                                     <tr>
                                             <td style="padding-top: 20px;">
                                                 <p>
                                                 I have been a customer of Huntington National Bank for 3 years and my family has done business with your bank for more than 30 years. I have decided to peruse my education at the Ohio State University.  
                                             </p>
                                             <p>
                                                     I want to have the full college experience and life on campus. The cost of an education from such an Ivy League school is expensive and I would like to look to you for financing. For my freshman year, I expect costs to be somewhere between $21,000-$25,000. 
                                             </p>
                                             </td>
                                         </tr>                        
    
    
                                         <tr>
                                                 <td> Sincerely, </td>
                                             </tr>
                                             <tr>
                                                     <td>
                                                          <p style="margin-bottom:0 !important">  <span style="font-weight:600;"> Name:- </span>   <span> {{$e->name}}  </span> </p>
                                                          <p style="margin-bottom:0 !important"> <span style="font-weight:600;"> Mobile:- </span>   <span> {{$e->contact}} </span> </p>
                                                          <p style="margin-bottom:0 !important">  <span style="font-weight:600;"> Email:- </span>  <span> {{$e->email}} </span> </p>
                                                          <p style="margin-bottom:0 !important"> <span style="font-weight:600;"> Alternate Email:- </span>   <span> {{$e->alterate_email}} </span> </p>
                                                    </td>

                                                 </tr>
    
                                                 
    <tr>
    <td>
    <table  class="attech-doc-mail" border="1" style="border: none !important;
    border-top: 1px solid #ded5d5!important;"> 
    <tbody style="border:none !important;border-top: 1px solid #ded5d5 !important;">
     <tr>

      
<td> <strong> Id Proof: </strong> </td>   
      <td>  
             
              {{-- <a href="{{url('public/uploads/image/'.$e->image)}}" target="_blank">
                 <img src="{{url('public/uploads/image/'.$e->image)}}" alt="" width="50px;"> 
         </a> --}}


         <label class="custom-control material-checkbox">
          <input type="checkbox" class="material-control-input" name="addIdProof" value="addIdProof">
          <span class="material-control-indicator"></span>
      </label>

       {{-- {{Form::hidden('id_proof', url('public/uploads/image/'.$e->image) )}} --}}
          </td>    
    
    
     
     </tr>  
    
     <tr>
    <td> <strong> Educational Documents </strong> </td>   
    <td> 
     
      <label class="custom-control material-checkbox">
        <input type="checkbox" class="material-control-input"  name="educationalDocuments" value="educationalDocuments">
        <span class="material-control-indicator"></span>
    </label>
    </td>

    </tr>  
    
    
<tr>
  <th> Attech Offer Letter  </th>
  <td><label class="custom-control material-checkbox">
    <input type="checkbox" class="material-control-input"  name = "offerLetter" value="offerLetter">
    <span class="material-control-indicator"></span>
</label></td>
</tr>

   
    
  </tbody>
    </table>    
    </td>    
    </tr>      

    <tr>  <td> {{Form::submit('Send Mail')}}  </td> </tr>
    </table>
    
    
    
    
    
    
    
    
    
        
    {{Form::close()}}
    
        </div>
     


        