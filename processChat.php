<?php
	$function = $_POST['function'];
	$log = array();
	
	switch($function){
	case('getStateofChatroom'):
		if(file_exists('chat.txt')){
			$lines = file('chat.txt');
		}
		$log['currentstate'] = count($lines);
		break;
		
	case('updateChatroom'):
		$state = $_POST['currentstate'];
		if(file_exists('chat.txt')){
			$lines = file('chat.txt');
		}
		if($state == $count){
			$log['currentstate'] = $state;
			$log['text'] = false;
		}
		else{
			$text = array();
			$log['currentstate'] = $state + count($lines) - $state;
			foreach($lines as $linenumbers=>$line){
				if($linenumbers >= $state){
					$text[] = $line = str_replace("\n", "", $line);
				}
			}
			$log['text'] = $text;
		}
		break;
	case('send'):
		$nickname = htmlentities(strip_tags($_POST['nickname']));
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$message = htmlentities(strip_tags($_POST['message']));
		if(($message) != "\n"){
			if(preg_match($reg_exUrl, $message, $url)) {
				$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
			}
			fwrite(fopen('chat.txt', 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
		}
		break;
	}
	
	echo json_encode($log);
?>
