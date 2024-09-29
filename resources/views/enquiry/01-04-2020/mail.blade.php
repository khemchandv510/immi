





        
       
       <div class="container">
           <div class="row">
               <?php 
            //         $get_detail = DB::table('enquiries')
            //         ->where('unique_id',session()->get('unique_id_sess'))
            //         ->join('enq_educations', 'enquiries.unique_id', '=', 'enq_educations.enquiry_id')
            // ->crossJoin('enq_exam_scores', 'enquiries.unique_id', '=', 'enq_exam_scores.enquiry_id')
            // ->select('*')
            // ->get();
    //    $get_detail =   DB::table('enquiries')
    //         ->where('unique_id',session()->get('unique_id_sess'))
    //     ->join('enq_educations', function ($join) {
    //         $join->on('enquiries.unique_id', '=', 'enq_educations.enquiry_id')
    //         ->orOn('enquiries.unique_id', '=', 'enq_exam_scores.enquiry_id');
    //     })
    //     ->get();


    $enquiries = DB::table('enquiries')
                    ->where('unique_id',session()->get('unique_id_sess'))
                    ->where('delete_client',1)
                    ->get();
$education  = DB::table('enq_educations')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get();

                    $experiences  = DB::table('enq_experiences')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get();

                    $enq_exam_scores  = DB::table('enq_exam_scores')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get();

                    $enq_oet_scores  = DB::table('enq_oet_scores')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get();

                    $enq_course_enrolls = DB::table('enq_course_enrolls')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get(); 

                    $enq_financials = DB::table('enq_financials')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get(); 

                    $enq_travelled_historys = DB::table('enq_travelled_historys')
                    ->where('enquiry_id',session()->get('unique_id_sess'))
                    ->get(); 


            
                ?>
                        {{Form::open(array('url' => 'bank-loan', 'files' =>'true'))}}
                <table>
                        @if(!empty($enquiries))
                        @foreach($enquiries as $e)
                        <tr>
                        <td style="padding-top: 20px;" >  {{$e->name}}  </td>
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
        @endif
                                <tr>
                                        <td style="padding-top: 20px;" >Date:-  {{date('d-m-Y')}} </td>
                                </tr>

                                <tr>
                                        <td style="padding-top: 20px;">  National Bank</td>
                                        </tr>
                                        <tr>
                                        <td>2390 Line </td>
                                        </tr>
                                        <tr>
                                                <td>New Delhi India</td>
                                        </tr>
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
                                                                <td> {{$e->name}}</td>
                                                                </tr>
                
                                                                
        <tr>
        <td>
                <table> 
                <tr>
                        @if(!empty($enquiries))
                        @foreach($enquiries as $e)
                <td> <strong> Id Proof: </strong> </td>   
                <td>  
                        
                        <a href="{{url('public/uploads/image/'.$e->image)}}" target="_blank">
                                <img src="{{url('public/uploads/image/'.$e->image)}}" alt=""> 
                        </a>
                {{Form::hidden('id_proof', url('public/uploads/image/'.$e->image) )}}
                        </td>    
                @endforeach
                @endif
                </tr>  

                <tr>
                <td> <strong> Educational Documents </strong> </td>            
                </tr>  
                @if(!empty($check_document_status))
                @foreach($check_document_status as $c)
                <tr>
                        <td>
                                {{$c->qualification}}        
                        </td>
                <td> 
                        <a href="{{url('public\uploads\enrolment_documents/'.$c->document_name)}}" target="_blank">
                                <img src=" {{url('public\uploads\enrolment_documents/'.$c->document_name)}}" alt=""> 
                        
                        </a>  
                        {{Form::hidden('quelification', url('public\uploads\enrolment_documents/'.$c->document_name))}}
                </td>
                </tr>
                @endforeach
                @endif
        
        
                </table>    
        </td>    
        </tr>      

