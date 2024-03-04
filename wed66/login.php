<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .main{
        width: 350px;
        height: 400px;
        background-color: rgb(255, 255 ,255 ,0.4);
        backdrop-filter: blur(10px);
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;

    }
    body{
        display: flex;
        margin: 0;
        padding: 0;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url(https://cdn.pixabay.com/photo/2023/05/19/10/27/woods-8004188_1280.png);
        background-size: cover;
        background-attachment: fixed;
        background-position: top;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;

    }
    input{
        justify-content: center;
        display: flex;
        width: 60%;
        height: 20px;
        margin: 10px auto;
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 5px;
    }
    button{
        width: 60%;
	    height: 40px;
	    margin: 2px auto;
	    justify-content: center;
	    display: block;
        border-radius: 20px;
    }
    h2{
        justify-content: center;
        display: flex;
        margin: 30px auto;
    }
    p{
        text-align: center;
        font-size: 20px;
    }
    a{
        justify-content: center;
        display: flex;
    }
    #data{
        align-items: center;
        justify-content: center;
        display: flex;
    }
    #data:hover{
        color: #CCFF00;
    }

</style>
<?php
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var button = document.getElementById("data");
        
        button.addEventListener("click", function() {
            window.location.href = "regis.php";
        });
    });
</script>
<body>
    <div class="main">  	
        <div class="login">
            <form action="showjson.php" method="post" name="formlogin" onsubmit="return validateForm()">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                </h2>
                <label for="chk" aria-hidden="true"><p>Login</p></label>
                <br>
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password" placeholder="password" >
                <br>
                <button type="submit">Login</button>
                <h3 id ="data">สมัครสมาชิก</h3>
            </form>
        </div>
</div>
</body>
</html>