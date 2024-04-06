<!DOCTYPE html>
<head>
	<title>Massplug Admin Login</title>
</head>

<style type="text/css">
	body{
	padding-top:10%;
	background-color:#000011;
	}

	p{
		font-family:Century Gothic;
		color:#808080;
		font-size:2em;
	}

	form{
	font-family:Century Gothic;	
	}

	button{
		height:30px;
		width:308px;
		background-color:#0e0e11;
		color:#fff;
		border:none;
	}

	input{
		background-color:#fffff1;
		color:#000;
		height: 25px;
		width:300px;
	}

	


</style>

<body>

	<p align="center">MassPlug Admin</p>
	<br>
	<!--Login Form-->
	<table align="center" id="login">
		<tr>
			<td>
		<?php echo form_open_multipart('login/login_user')?> 
		<input type="text" name="username" placeholder="Username" required><br><br>
		<input type="password" name="password" placeholder="Password" required=><br>
		</tr>
	
		<tr>
			<td>
		<button name="submit" value="LOGIN">LOGIN</button>
		</form>

		</tr>
	</table>

</body>

</html>
