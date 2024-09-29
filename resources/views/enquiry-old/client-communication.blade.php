<?php 
$jsonarr;
	$get_chat = DB::table('chat_client_to_employees')->where('employee_unique_id','28812852')->orderBy('id','DESC')->get();
		$i = 0;
	$chat=array();
	foreach($get_chat as $get){
	$jsonarr = json_decode($get->message,true);
	array_push($chat,json_decode($get->message));
	$i++;
	}	
	?>

	<style>
	
	.error {color:#FF0000;}
	/* .chat-connection-ack{color: #26af26;} */
	.chat-message {border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;
	}
	#btnSend {background: #26af26;border: #26af26 1px solid;	border-radius: 4px;color: #FFF;display: block;margin: 15px 0px;padding: 10px 50px;cursor: pointer;
	}
	#chat-box {background: #fff8f8;border: 1px solid #ffdddd;border-radius: 4px;border-bottom-left-radius:0px;border-bottom-right-radius: 0px;min-height: 300px;padding: 10px;overflow: auto; max-height: 300px;
	}
	.chat-box-html{color: #09F;margin: 10px 0px;font-size:0.8em;}
	.chat-box-message{color: #09F;padding: 5px 10px; background-color: #fff;border: 1px solid #ffdddd;border-radius:4px;display:inline-block;}
	.chat-input{border: 1px solid #ffdddd;border-top: 0px;width: 100%;box-sizing: border-box;padding: 10px 8px;color: #191919;
	}
	</style>	
	
	<script>  
	function showMessage(messageHTML) {
		$('#chat-box').append(messageHTML);
	}

	$(document).ready(function(){
		
		var websocket = new WebSocket("ws://localhost:8090/php-socket.php"); 
		websocket.onopen = function(event) { 
			// showMessage("<div class='chat-connection-ack'>Connection is established!</div>");		
			showMessage("<div class='chat-connection-ack'></div>");		
		}
		websocket.onmessage = function(event) {
			var Data = JSON.parse(event.data);
			showMessage("<div class='"+Data.message_type+"'>"+Data.message+"</div>");
			$('#chat-message').val('');
		};
		
		websocket.onerror = function(event){
			// showMessage("<div class='error'>Problem due to some Error</div>");
			showMessage("<div class='error'></div>");
		};
		websocket.onclose = function(event){
			// showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
			showMessage("<div class='chat-connection-ack'></div>");
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

		var	client_unique_id =  "<?php echo session()->get('unique_id_sess') ?>";
		var	emp_unique_id    = "<?php echo AUTH::user()->unique_id ?>";
			
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
	
		<form name="frmChat" id="frmChat">
			<div id="chat-box">
<ul style="">
		@foreach($jsonarr as $a)
@if(Auth::user()->unique_id == $a['chat_user'])
<li style="padding:7px;list-style:none;">You: <span  style="color:
	#09F;
	padding: 5px 10px;
	background-color:
	#fff;
	border: 1px solid
	#ffdddd;
	border-radius: 4px;
	display: inline-block; "> {{  $a['chat_message']}}  </span></li>
@else
<li style="padding:7px;list-style:none;">
	<?php  $get_name =  DB::table('users')->select('name')->where('unique_id',$a['chat_user'])->get(); 
	if($get_name->count() == 0){
	$get_name = 	DB::table('enquiries')->select('name')->where('unique_id',$a['chat_user'])->get();	
	// foreach($get_name as $get_name2){}
	} 
	?>
{{-- {{ $get_name2->name }} :   --}}
 <span style="color:
#09F;
padding: 5px 10px;
background-color:
#fff;
border: 1px solid
#ffdddd;
border-radius: 4px;
display: inline-block;"> {{ $a['chat_message']}}  </span>
</li>

@endif
{{-- {{($jsonarr[$a]['chat_message'])}} --}}
@endforeach
<li class="chat-box-html" > </li>

	</ul>
			</div>
						<input type="text" name="chat-message" id="chat-message" placeholder="Message"  class="chat-input chat-message" required />
			<input type="submit" id="btnSend" name="send-chat-message" value="Send" >
		</form>
