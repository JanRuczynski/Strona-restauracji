<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
        
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }else
    {
        echo "Proszę wpisać odpowiednie dane.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Rejestracja</title>
</head>
<body>
    <style type="text/css">
        
        #text{

            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
        }
        
        #button{

            outline: 0;
                border: 0;
                cursor: pointer;
                color: #fff;
                font-weight: 500;
                border-radius: 4px;
                font-size: 14px;
                height: 30px;
                padding: 0px 15px;
                text-shadow: rgb(0 0 0 / 25%) 0px 3px 8px;
                background: linear-gradient(92.88deg, rgb(69, 94, 181) 9.16%, rgb(86, 67, 204) 43.89%, rgb(103, 63, 215) 64.72%);
                transition: all 0.5s ease 0s;
                :hover{
                    box-shadow: rgb(80 63 205 / 50%) 0px 1px 40px;
                    transition: all 0.1s ease 0s;
                }
        }

        #box{

            background-color: #d9d9d9;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius:10px;
        }
           
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">Rejestracja</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Kliknij aby się zalogować.</a><br><br>
        </form>
    </div>
</body>
</html>