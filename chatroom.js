var instance = false;
var currentstate;
var mes;
var file;

function Chatroom(){
	this.update = updateChatroom;
	this.send = sendChat;
	this.getState = getStateofChatroom;
}

//gets Current State of Chat
function getStateofChatroom(){
	if(!instance){
		instance = true;
		$.ajax({
				type: "POST",
				url: "processChat.php",
				data:{
					'function': 'getStateofChatroom',
					'file' : file
				},
				dataType: "json",
				success: function(data){
					currentstate = data.currentstate;
					instance = false;
				},
		});
	}
}

function updateChatroom(){
	if(!instance){
		instance = ture;
		$.ajax({
				type: "POST",
				url: "processChat.php",
				data:{
					'function': 'updateChatroom',
					'currentstate': currentstate,
					'file':file
				},
				dataType: "json",
				success: function(data){
					if(data.text){
						for(var i = 0; i < data.text.length; i++){
							$('#chat-area').append($("<p>"+ data.text[i] + "</p>"));
						}
					}
					document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
					instance = false;
					currentstate = data.currentstate;
				},
		});
	}
	else{
		setTimeout(updateChatroom, 2000);
	}
}

//send message
function sendChat(message, nickname){
	updateChatroom();
	$.ajax({
			type: "POST",
			url: "processChat.php",
			data:{
				'function': 'send',
				'message': message,
				'nickname': nickname,
				'file' : file
			},
			dataType:"json",
			success: function(data){
				updateChatroom();
			},
	});
}
