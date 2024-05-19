
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">

<div class="signin"> 

<div class="content"> 

 <h2>Sign In</h2> 


 <form ACTION="php_controllers/authenticator.php", METHOD="post">

    <div class="form"> 

    <div class="inputBox"> 

        <input type="text" name="username" required> <i>Username</i> 

    </div> 

    <div class="inputBox"> 

        <input type="password" name="password" required> <i>Password</i> 

    </div> 

        <div class="links"> <a href="#">Forgot Password</a> <a href="#">Signup</a> 

    </div> 

    <div class="inputBox"> 

    <input type="submit" value="Login"> 

    </div> 

    </div>

</form>

</div> 

</div> 

    </div>
</body>
</html>