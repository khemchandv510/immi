

<div class="modal" id="update_doc">

    <div class="modal-dialog" style="width:1000px;max-width:1000px;">
    <div class="modal-content" style="width:1000px !important; min-height:
    300px;max-width:1000px; ">
    <!-- Modal Header -->
    <div class="modal-header" style="
    border: none;">
    <button type="button" class="close" data-dismiss="modal" style="
    font-size: 38px;
    color: #383838; padding:0px" >&times;</button>
    

    <h3 style="width:100%;text-align:center"> Document Upload Again </h3>    

    {{Form::open(array('url' => 'documents-upload-again', 'files' =>'true' ) )}}
        {{Form::hidden('check_status',$check_document_status[0]->client_unique_id)}}
    


        <div class="modal-body" style=";width: 80%;margin: auto;">
            <table class="table" id="join">
            <tbody >
            

                
        @if($ch->count() > 0)
        @if(($check_document_status->count() == $chech_status->count()) && ($ch[0]->approve_or_not == 2))
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
                style="display:none" />
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
    @endif


