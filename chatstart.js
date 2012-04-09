//Prompt user for username
var name = prompt("Enter your user name:", "Guest");
		
//Check to see if a name was entered
if(!name || name === ' '){
	name = "Guest User";
}

//Use to display name
$("#name-position").html("You are: <span>" + name + "</span>");

//start off chat room
var chatroom = new Chatroom();
$(function(){
	chatroom.getState();
	
	$("#sender").keydown(function(event){
			var keydown = event.which;

			if(keydown >34){
				var maxLength = $(this).attr("maxlength");
				var length = this.value.length;
				
				if(length > maxLength){
					event.preventDefault();
				}
			}
	});
	//handle cases of what the value entered is
	$('#sender').keyup(function(e){
		if(e.keyCode == 13){
			var text = $(this).val();
			var maxLength = $(this).attr("maxlength");
			var length = text.length;

			//send message
			if(length < maxLength){
				chat.send(text, name);
				$(this).val("");
			}
			else{
				$(this).val(text.substring(0.maxLength));
			}
		}
	});
});
	
