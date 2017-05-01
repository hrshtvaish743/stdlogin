<html>
	<head>
		<title>Attendence Portal</title>
		<form action="loginnewadd.php" method="POST">
		<style>
			.button {
				background-color: #ff9933 ;
				border-radius: 12px;
				border: none;
				color: white;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				-webkit-transition-duration: 0.4s;
				transition-duration: 0.4s;
			}

			.button1 {
				box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		}
		</style>
	</head>
	<body>
		<div>
			<img id="logo" src="./picture/logo.png" alt="Vellore Institute of Technology"  style="width:175px;height:33px;">
			<div>     
			<center>
				<span style="color:#00366C; font-size:30px; display:block; letter-spacing:2px;"> Department of</span>
				<span style="font-size:50px; letter-spacing:1px; line-height:1.2em; color:#000"> Computer Science Engineering </span>
			</center>
			<hr>     
			</div>
			<center>
				<table border="2px" width="50%" height="40%" style="font-size:160%;" >
					<tr align="center">
						<td >
							<form  method="post" style="width: 50%;"> 
								<label for="username">Username     :     </label>
								<input type="text" name="username"  placeholder="Enter username" required="" autofocus="" maxlength="20">       
								<br>
								<br>  
								<label for="password">Password     :     </label>
								<input type="password" name="password" placeholder="Enter Password" required="" maxlength="20">
								<br>
								<br>
								<label for="type">Login As   :   </label>
								<select  name="type" style="font-size:80%;" required="">
								  <option  style="font-size:80%;" value="student">Student</option>
								  <option style="font-size:80%;"value="teacher">Teacher</option>
								  <option style="font-size:80%;" value="admin">Administrator</option>
								</select>
								<br>
								<br>
								<button class="button button1" id="btn" value="Login" >Login</button>
								</div>
							</form>
						</td>
					</tr>
				</table>
			</center>
			</div>
		</div>
	</body>
</html>