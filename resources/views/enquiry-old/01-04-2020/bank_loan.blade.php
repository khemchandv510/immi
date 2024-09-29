
    
    
    
    
    
            <table id="">
              
                
                <?php $enquiries =    DB::table('enquiries')
                ->where('unique_id',Session::get('unique_id_sess'))
                ->get();
// dd(Session::get('unique_id_sess'))
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
    
                                                 
    
     


        