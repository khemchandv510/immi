
@extends('header')
@section('enquiry-desktop')
<div class="container my-5">
    <h3>Enquiry Form</h3>
    {{Form::open(array('url'  =>  'enquiry'))}}                   
        <div class="row content-color">
            
            
              <div class="col-md-4 py-3 ">Name :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) !!}
                </div>
   
               <div class="col-md-4 py-3 ">D.O.B :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::date('dob', null, array('class'=>'form-control', 'placeholder'=>'Dob')) !!}
                </div>

               <div class="col-md-4 py-3 ">Contact no :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::text('contact', null, array('class'=>'form-control', 'placeholder'=>'Contact Number')) !!}
                </div>

               <div class="col-md-4 py-3 ">Email Id :</div>
               <div class="col-md-8 py-3 ">
                    {!! Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) !!}
                
                </div>

               <div class="col-md-4 py-3 ">Current Address :</div>
               <div class="col-md-8 py-3 "> 
                   {!! Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) !!}
            </div>

            <div class="col-md-4 py-3 ">Country :</div>
            <div class="col-md-8 py-3 "> 
                  <select name="country" id="" class="form-control" onchange="getState(this.value);">
                        <option value="" Selected disabled>--Select--</option>
                        
                    @foreach($countries as $c)
                  <option value={{$c->country_id}}>  {{ $c->country_name }}</option>

                @endforeach
            </select>
        
            <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
            
<script>
function getState(val) {
	$.ajax({
	type: "get",
	url: "{{url('getState')}}?id="+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}

function getcity(val) {
	$.ajax({
	type: "post",
	url: "{{url('getcity')}}?id="+val,
	
	success: function(data){
		$("#city-list").html(data);
		
	}
	});
}


    </script>
              
                    
         </div>

         <div class="col-md-4 py-3 ">State :</div>
            <div class="col-md-8 py-3 "> 
                    <select name="country" id="state-list" class="form-control" onchange="getcity(this.value);">
                            <option value="" Selected disabled>--Select--</option>
                            @if(!empty($states))
                        @foreach($states as $c)
                      <option value={{$c->state_id}}>  {{ $c->state_name }}</option>
    
                    @endforeach
                    @endif
                </select>
         </div>


         <div class="col-md-4 py-3 ">City :</div>
         <div class="col-md-8 py-3 "> 
             {!! Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City')) !!}
      </div>


               <div class="col-md-12 py-3 ">Education :</div>
               <div class="col-md-12 py-3 "><table class="table">
                <thead>
                  <tr>
                    <td></td>
                    <th scope="col"></th>
                    <th scope="col">Year of Passing</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Name of Education</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">10</th>
                    <td></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                  </tr>
                  <tr>
                    <th scope="row">Bachelor's</th>
                    <td></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                  </tr>
                  <tr>
                    <th scope="row">Master's</th>
                    <td></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                    <td><input type="number" class="form-control"></td>
                  </tr>
                </tbody>
            </table></div>

            <div class="col-md-12">Work Experience :</div>
            <div class="col-md-12"><table class="table">
                <thead>
                  <tr>
                    <td></td>
                    <th scope="col"></th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Company 1</th>
                    <td></td>
                    <td><input type="date" class="form-control"></td>
                    <td><input type="date" class="form-control"></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Company 2</th>
                    <td></td>
                    <td><input type="date" class="form-control"></td>
                    <td><input type="date" class="form-control"></td>
                    
                  </tr>
                </tbody></table></div>

               <div class="col-md-4 py-3">TOEFL / IELTS / PTE SCORE (if taken) :</div>
               <div class="col-md-8 py-3 k0label"><label><input type="checkbox"> Overall</label>
               <label> <input type="checkbox"> Listening</label>
               <label><input type="checkbox"> Reading</label>
               <label><input type="checkbox"> Writing</label>
               <label><input type="checkbox"> Speaking</label></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Listening :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Listening"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Reading :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Reading"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Writing :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Writing"></div>

               <div class="col-md-4 py-2 "></div>
               <div class="col-md-2 py-2 ">Speaking :</div>
               <div class="col-md-6 py-2 "><input type="text" class="form-control" placeholder="Speaking"></div>

               <div class="col-md-4"></div>
               <div class="col-md-8">(R-, W-, S- and L- scores to be mentioned separately) also Mention whether the student intends to take TOEFL/IELTS /PTE or not</div>

               <div class="col-md-4 py-3">How student will show financials?</div>
               <div class="col-md-8 py-3"><input type="text" class="form-control"></div>

               <div class="col-md-4"></div>
               <div class="col-md-8">Give complete details (Bank loan, Personal Funds, Family Sponsorship, Third Party Sponsorship)</div>

               <div class="col-md-4 py-3">Total Family Income</div>
               <div class="col-md-8 py-3"><input type="text" class="form-control"></div>

               <div class="col-md-4 py-3">Married / Single</div>
               <div class="col-md-8 py-3 k0label"><label><input type="radio" name="kaushik"> Married</label>
                <label><input type="radio" name="kaushik" > Single</label></div>




               <div class="col-md-12 text-center my-4" >
               <input type="submit" class="btn btn-danger w-25 " value="Save">
              </div>
           
        </div>
       </form>
 </div>

 @endsection()