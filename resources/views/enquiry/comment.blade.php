{{-- comment section --}}
<div style="" id="detail_page_comments">
    <br>
    <br>
    <h4>Comments</h4>
    <p> </p>
    @if(!empty($enq_comments))
    
    <table class="table">
    <tr>
    <th>Agent Name</th>
    <th>Last Update</th>
    <th>Calling Date</th>
    <th>Calling Time</th>
    <th> Status</th>
    <th> Comment</th>
    </tr>
    @foreach($enq_comments as $e)
    <tr>
    <td> {{$e->agent_name}} </td>
    <td>
    <?php
    if($e->calling_date != null){
    echo $e->calling_date;
    }
    else{
    echo$e->date;
    }
    ?>
    </td>
    <td> {{$e->calling_date}} </td>
    <td> {{$e->callbacklater_time}} </td>
    <td> {{$e->status}} </td>
    <td style="max-width: 300px"> {{$e->comment}} </td>
    
    </tr>
    @endforeach
    </table>
    
    @endif
    </div>
    {{-- end of comment --}}
    