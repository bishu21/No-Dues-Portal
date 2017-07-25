<!DOCTYPE html>
<html>
	<head>
		<title>NO DUES</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
<body>

<div class="header">
	<div id="head1"><img src="logo.png"></div>
	<!-- <div id="head2"><span>NO DUES PORTAL</span></div> -->
</div>

<div class="middle">
	<img src="bg.jpg" style="width:100%;height:500px">
	<div id="content">
		<span style="font-size:30px"><b>Log in</b></span>
  		
  		<form action="login.php" method="POST">
    	<label for="username"><b>Username</b></label>
		<input type="text" id="username" placeholder="Webmail Id" name="username" required="">

	    <label for="password"><b>Password</b></label>
	    <input type="password" id="password" placeholder="Password" name="password" required="">

	    <label for="login_server"><b>Login Server</b></label>
	    <select id="login_server" name="login_server">
	    	<option value="Teesta">Teesta</option>
	     	<option value="Naambor">Naambor</option>
	      	<option value="Tamdil">Tamdil</option>
	      	<option value="Disang">Disang</option>
	      	<option value="Dikrong">Dikrong</option>
	    </select>
	    <input type="submit" value="Log in">
	    <input type="checkbox" name="login_remember" value="login_remember" unchecked="">

    	<label id="login_remem" for="login_remember"><b>Remember login server</b></label>
    	<br/>
    	<input type="checkbox" name="userpass_remember" value="userpass_remember"> 
    	<label id="user_remem" for="userpass_remember" onclick="check(user_remem)"><b>Remember Username and Password</b></label>

	    <span class="psw"><br/>Forgot <a href="#">password?</a></span>
	  </form>
	</div>
</div>

<div class="footer">
	<span id="foot">Webmaster: Shubham Jindal</span>
</div>

</body>

</html>

