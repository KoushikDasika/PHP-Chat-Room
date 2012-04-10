<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title> ChatRoom </title>

	<link rel="stylesheet" href="mystyle.css" type="text/css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/l/jquery.min.js"></script>
	<script type="text/javascript" src="chatroom.js"></script>
	<script type="text/javascript" src="chatstart.js"></script>
</head>

<body onload="setInterval('chatroom.update()', 250)">
	<div id="page-wrap">
		<h2> ChatRoom </h2>
		<p id="name-position"></p>
		<div id="chat-wrap"><div id="chat-area">
		</div>
	</div>

	<form id="send-message-area">
		<p>Your Message: </p>
		<textarea id="sender" maxlength = '200'></textarea>
	</form>
</div>
</body>
</html>

