<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link rel="shortcut icon" href="img/logosmk5.jpg" type="image/x-icon" />
</head>
<body>

<h1><img src="img/logosmk5.jpg" width="200" height="200"></h1>
    
<div class="kotak_login">
	<p class="tulisan_login"><img src="img/R.jpg" width="100%" height="50%" /><br />
      SILAKAN LOGIN   </p>

		<form id="form1" name="form1" method="post" action="proses_login.php" method="post">
			<label>Username</label>
			<input id="nama_admin" type="text" name="nama_admin" class="form_login" placeholder="User ..">
            
			<label>Password</label>
			<input id="password" type="password" name="password" class="form_login" placeholder="Password ..">
			
<input  type="checkbox"  onclick="myFunction()">tampil Password
			<input color: "#FF0066" type="submit" class="tombol_login" value="LOGIN">

            <br/>
			<br/>
		</form>
		
</div>

<script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <div align="center" class="kotak_login">
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td><form action="reset2.php" method="post">
      <div align="center">
          <input name="em" type="text" maxlength="150" placeholder="Ketik Email Anda"/> 
          <input name="Reset" type="submit" value="Reset Password" />
      </div>
    </form>
      </td>
  </tr>
</table>
</div>
</body>
</html>

