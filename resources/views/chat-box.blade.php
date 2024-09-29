
<?php 
$jsonarr;
  $get_chat = DB::table('chat_client_to_employees')->where('employee_unique_id',AUTH::user()->unique_id)
  ->where('client_unique_id',session()->get('unique_id_sess'))
  ->orderBy('id','DESC')->get();
if(!empty($get_chat->count() > 0)){
  // dd($get_chat,AUTH::user()->unique_id,session()->get('unique_id_sess'));
}
else{
  $get_chat = DB::table('chat_client_to_employees')->where('client_unique_id',AUTH::user()->unique_id)
  ->orwhere('employee_unique_id',session()->get('unique_id_sess'))
  ->orderBy('id','DESC')->get();
  // dd($get_chat,AUTH::user()->unique_id,session()->get('unique_id_sess'));
}
// dd($get_chat,AUTH::user()->unique_id,session()->get('unique_id_sess'));
  // $get_chat = DB::select(DB::raw("SELECT * from chat_client_to_employees where (employee_unique_id=".AUTH::user()->unique_id."AND client_unique_id =".session()->get('unique_id_sess'))." OR hjg"))
  // dd($get_chat,AUTH::user()->unique_id,session()->get('unique_id_sess'));
  if(!empty($get_chat->count() > 0)){

		$i = 0;
	$chat=array();
	foreach($get_chat as $get){
	$jsonarr = json_decode($get->message,true);
	array_push($chat,json_decode($get->message));
	$i++;
  }
  }
  // dd($get_chat,session()->get('unique_id_sess'));
  
    //   $get_name_emp =  DB::table('users')->select('name')->where('unique_id',AUTH::user()->unique_id)->get(); 

    //  $get_name_client = 	DB::table('enquiries')->select('name')->where('unique_id',AUTH::user()->unique_id)->get();	
    // dd($get_name_client, $get_name_emp);
   
	// foreach($get_name as $get_name2){}
	// }
  	?>
          <?php
          if(AUTH::user()->unique_id == session()->get('unique_id_sess')){
          $getId=  DB::table('enquiries')->select('name','agent_unique_id')->where('unique_id',AUTH::user()->unique_id)->get();  
          $getName = DB::table('users')->select('name','unique_id')->where('unique_id',$getId[0]->agent_unique_id)->get();
        }
          else{
          $getName=  DB::table('enquiries')->select('name','unique_id')->where('unique_id', session()->get('unique_id_sess')) ->where('agent_unique_id',AUTH::user()->unique_id)->get();  
          }
        //  dd($getName);
         
         ?>

	<script >  
  
	function showMessage(messageHTML) {      
		$('#chat-box').append(messageHTML);
    var count = document.querySelectorAll('#chat-box .message-box-holder.chat-box-html').length
   var id = document.querySelectorAll('#chat-box .message-box-holder.chat-box-html')[count-1].firstElementChild.textContent;
    if(id != "<?=AUTH::user()->unique_id?>"){
    var a = document.querySelectorAll('#chat-box .message-box-holder.chat-box-html')[count-1].firstElementChild;
   a.nextElementSibling.classList.add('message-partner');
   document.querySelectorAll('#chat-box .message-box-holder.chat-box-html')[count-1].firstElementChild;
   document.querySelectorAll('#chat-box .message-box-holder.chat-box-html')[count-1].firstElementChild.style="display:none !important";
}
    document.querySelector('.chat-messages').scrollTop = document.querySelector('.chat-messages').scrollHeight 
//     var a = document.querySelectorAll('.message-box-holder.chat-box-html');
//     var count = a.length;
//     alert(count);
// for(var i=0;i<=count-1; i++){
//   console.log(a[i].firstElementChild.textContent)
//   if(a[i].firstElementChild.textContent != "<?=AUTH::user()->unique_id ?>" );

//     a[i].lastElementChild.classList.contains('message-box message-partner chat-box-message');
// }
	}

	$(document).ready(function(){
		document.querySelector('.chat-messages').scrollTop = document.querySelector('.chat-messages').scrollHeight
		var websocket = new WebSocket("ws://localhost:8090/php-socket.php"); 
		// websocket.onopen = function(event) { 
			// showMessage("<div class='chat-connection-ack'>Connection is established!</div>");		
			// showMessage("<div class='chat-connection-ack'></div>");		
		// }

		websocket.onmessage = function(event) {
			var Data = JSON.parse(event.data);
   		showMessage("<div class='"+Data.message_type+"'>"+Data.message+"</div>");
			$('#chat-message').val('');
		};
    
		
		websocket.onerror = function(event){
			// showMessage("<div class='error'>Problem due to some Error</div>");
			// showMessage("<div class='error'></div>");
		};
		websocket.onclose = function(event){
			// showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
			// showMessage("<div class='chat-connection-ack'></div>");
		}; 
		
		$('#frmChat').on("submit",function(event){
			event.preventDefault();
			$('#chat-user').attr("type","hidden");
        
			$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

			var messageJSON = {
				chat_user:"<?php echo AUTH::user()->unique_id ?>",
				chat_message: $('#chat-message').val()
                
			};
			// var messageJSON = 			$('#chat-message').val();

		var	client_unique_id =  "<?php  if(AUTH::user()->unique_id == session()->get('unique_id_sess')){echo AUTH::user()->unique_id ; } else { echo isset($getName[0]->unique_id)?$getName[0]->unique_id:''; } ?>";
        
		var	emp_unique_id    = "<?php  if(AUTH::user()->unique_id == session()->get('unique_id_sess')){echo $getName[0]->unique_id ; } else { echo isset($getName[0]->unique_id)?$getName[0]->unique_id:'' ; } ?>";
			
			websocket.send(JSON.stringify(messageJSON));
			messageJSON  = JSON.stringify(messageJSON);
            
	$.ajax({

        type: "get",
        url: "{{url('chat_to_client')}}?client_unique_id="+client_unique_id+"&emp_unique_id="+emp_unique_id+"&messageJSON="+messageJSON,
                success: function(data){
                    
		}
			});
});
	});
</script>
	

<div class="chatbox-holder" >
    <div class="chatbox chatbox-min">
      <div class="chatbox-top">
        <div class="chatbox-avatar">
          <a target="_blank" href=""><img src="" /></a>
        </div>
        <div class="chat-partner-name">
          <span class="status donot-disturb"></span>
        
@if(isset($getName[0]->name))

          <a target="_blank" href="">{{ $getName[0]->name }}</a>
          
          @endif
        </div>
        <div class="chatbox-icons">
          <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
          <a href="javascript:void(0);"><i class="fa fa-close"></i></a>       
        </div>      
      </div>
      <div class="chat-messages ">
        
        @if(!empty($jsonarr))
        {{-- @dd($jsonarr['chat_user']) --}}
      @foreach($jsonarr as $a)
      
      @if(Auth::user()->unique_id == $a['chat_user'])

      
         <div class="message-box-holder chat-box-html">
          <div class="message-box chat-box-message">
            {{  $a['chat_message']}}
          </div>
        </div>

        @else
        <?php
       
	?>
        <div class="message-box-holder chat-box-html">
          <div class="message-sender">
            
            {{-- {{ $get_name[0]->name }} --}}
           </div>
          <div class="message-box message-partner chat-box-message">
            {{ $a['chat_message']}} 
          </div>
        </div>
        
      @endif
@endforeach
@endif
<form name="frmChat" id="frmChat" style="width:100%">
    <div id="chat-box">
    
{{-- <div class="message-box-holder chat-box-html">
    <div class="message-box chat-box-message"></div>
  </div> --}}
</div>

      <div class="chat-input-holder">
        <input class="chat-input" name="chat-input chat-message" id="chat-message" placeholder="Message">
        <input type="submit" value="Send" class="message-send"  id="btnSend" name="send-chat-message"/>

        

      </div>
    
      <div class="attachment-panel">
        <a href="#" class="fa fa-thumbs-up"></a>
        <a href="#" class="fa fa-camera"></a>
        <a href="#" class="fa fa-video-camera"></a>
        <a href="#" class="fa fa-image"></a>
        <a href="#" class="fa fa-paperclip"></a>
        <a href="#" class="fa fa-link"></a>
        <a href="#" class="fa fa-trash-o"></a>
        <a href="#" class="fa fa-search"></a>
      </div>
    </div>
  </div>
  
</div></form>
  <style>
  /* @import url('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i'); */
  
  * {
      margin: 0;
      padding: 0;
    box-sizing: border-box;
  }
  
  /* body {
      font-family: 'Lato', sans-serif;
      font-size: 14px;
      color: #999999;
      word-wrap: break-word;
  } */
  
  ul {
      list-style: none;
  }
  
  .chatbox-holder {
    position: fixed;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: flex-end;
    height: 0;
  }
  
  .chatbox {
    width: 400px;
    height: 400px;
    margin: 0 20px 0 0;
    position: relative;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
    display: flex;
    flex-flow: column;
    border-radius: 10px 10px 0 0;
    background: white;
    bottom: 0;
    transition: .1s ease-out;
  }
  
  .chatbox-top {
    position: relative;
    display: flex;
    padding: 10px 0;
    border-radius: 10px 10px 0 0;
    background: rgba(0, 0, 0, .05);
  }
  
  .chatbox-icons {
    padding: 0 10px 0 0;
    display: flex;
    position: relative;
  }
  
  .chatbox-icons .fa {
    background: rgba(220, 0, 0, .6);
    padding: 3px 5px;
    margin: 0 0 0 3px;
    color: white;
    border-radius: 0 5px 0 5px;
    transition: 0.3s;
  }
  
  .chatbox-icons .fa:hover {
    border-radius: 5px 0 5px 0;
    background: rgba(220, 0, 0, 1);
  }
  
  .chatbox-icons a, .chatbox-icons a:link, .chatbox-icons a:visited {
    color: white;
  }
  
  .chat-partner-name, .chat-group-name {
    flex: 1;
    padding: 0 0 0 95px;
    font-size: 15px;
    font-weight: bold;
    color: #30649c;
    text-shadow: 1px 1px 0 white;
    transition: .1s ease-out;
  }
  
  .status {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: inline-block;
    box-shadow: inset 0 0 3px 0 rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(0, 0, 0, 0.15);
    background: #cacaca;
    margin: 0 3px 0 0;
  }
  
  .online {
    background: #b7fb00;
  }
  
  .away {
    background: #ffae00;
  }
  
  .donot-disturb {
    background: #ff4343;
  }
  
  .chatbox-avatar {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
    background: white;
    padding: 3px;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
    position: absolute;
    transition: .1s ease-out;
    bottom: 0;
    left: 6px;
  }
  
  .chatbox-avatar img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
  }
  
  .chat-messages {
    border-top: 1px solid rgba(0, 0, 0, .05);
    padding: 10px;
    overflow: auto;
    display: flex;
    flex-flow: row wrap;
    align-content: flex-start;
    flex: 1;
  }
  
  .message-box-holder {
    width: 100%;
    margin: 0 0 15px;
    display: flex;
    flex-flow: column;
    align-items: flex-end;
  }
  
  .message-sender {
    font-size: 12px;
    margin: 0 0 15px;
    color: #30649c;
    align-self: flex-start;
  }
  
  .message-sender a, .message-sender a:link, .message-sender a:visited, .chat-partner-name a, .chat-partner-name a:link, .chat-partner-name a:visited {
    color: #30649c;
    text-decoration: none;
  }
  
  .message-box {
    padding: 6px 10px;
    border-radius: 6px 0 6px 0;
    position: relative;
    background: rgba(100, 170, 0, .1);
    border: 2px solid rgba(100, 170, 0, .1);
    color: #6c6c6c;
    font-size: 12px;
  }
  
  .message-box:after {
    content: "";
    position: absolute;
    border: 10px solid transparent;
    border-top: 10px solid rgba(100, 170, 0, .2);
    border-right: none;
    bottom: -22px;
    right: 10px;
  }
  
  .message-partner {
    background: rgba(0, 114, 135, .1);
    border: 2px solid rgba(0, 114, 135, .1);
    align-self: flex-start;
  }
  
  .message-partner:after {
    right: auto;
    bottom: auto;
    top: -22px;
    left: 9px;
    border: 10px solid transparent;
    border-bottom: 10px solid rgba(0, 114, 135, .2);
    border-left: none;
  }
  
  .chat-input-holder {
    display: flex;
    border-top: 1px solid rgba(0, 0, 0, .1);
  }
  
  .chat-input {
    resize: none;
    padding: 5px 10px;
    height: 40px;
    font-family: 'Lato', sans-serif;
      font-size: 14px;
    color: #999999;
    flex: 1;
    border: none;
    background: rgba(0, 0, 0, .05);
     border-bottom: 1px solid rgba(0, 0, 0, .05);
  }
  
  .chat-input:focus, .message-send:focus {
    outline: none;
  }
  
  .message-send::-moz-focus-inner {
      border:0;
      padding:0;
  }
  
  .message-send {
    -webkit-appearance: none;
    background: #9cc900;
    background: -moz-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: -webkit-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: -o-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: -ms-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: linear-gradient(180deg, #00d8ff, #00b5d6);
    color: white;
    font-size: 12px;
    padding: 0 15px;
    border: none;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
  }
  
  .attachment-panel {
    padding: 3px 10px;
    text-align: right;
  }
  
  .attachment-panel a, .attachment-panel a:link, .attachment-panel a:visited {
    margin: 0 0 0 7px;
    text-decoration: none;
    color: rgba(0, 0, 0, 0.5);
  }
  
  .chatbox-min {
    margin-bottom: -362px;
  /*   height: 46px; */
  }
  
  .chatbox-min .chatbox-avatar {
    width: 60px;
    height: 60px;
  }
  
  .chatbox-min .chat-partner-name, .chatbox-min .chat-group-name {
    padding: 0 0 0 75px;
  }
  
  .settings-popup {
    background: white;
      border-radius: 20px/10px;
      box-shadow: 0 3px 5px 0 rgba(0, 0, 0, .2);
    font-size: 13px;
      opacity: 0;
      padding: 10px 0;
      position: absolute;
      right: 0;
      text-align: left;
      top: 33px;
      transition: .15s;
      transform: scale(1, 0);
      transform-origin: 50% 0;
      width: 120px;
    z-index: 2;
    border-top: 1px solid rgba(0, 0, 0, .2);
    border-bottom: 2px solid rgba(0, 0, 0, .3);
  }
  
  .settings-popup:after, .settings-popup:before {
    border: 7px solid transparent;
      border-bottom: 7px solid white;
      border-top: none;	
      content: "";
      position: absolute;
      left: 45px;
      top: -10px;
    border-top: 3px solid rgba(0, 0, 0, .2);
  }
  
  .settings-popup:before {
    border-bottom: 7px solid rgba(0, 0, 0, .25);
    top: -11px;
  }
  
  .settings-popup:after {
    border-top-color: transparent;
  }
  
  #chkSettings {
      display: none;
  }
  
  #chkSettings:checked + .settings-popup {
      opacity: 1;
      transform: scale(1, 1);
  }
  
  .settings-popup ul li a, .settings-popup ul li a:link, .settings-popup ul li a:visited {
    color: #999;
    text-decoration: none;
    display: block;
    padding: 5px 10px;
  }
  
  .settings-popup ul li a:hover {
    background: rgba(0, 0, 0, .05);
  }
  
  </style>
  
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"> --}}
  </script>
  <script>
  $(function(){
    $('.fa-minus').click(function(){    $(this).closest('.chatbox').toggleClass('chatbox-min');
    });
    $('.fa-close').click(function(){
      $(this).closest('.chatbox').hide();
    });
  });
  
  
  
  
  </script>
  
  
  


  <style>.user-id{display:none;}</style>