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
        $query = "select * from users where user_name = '$user_name' limit 1";
        
        $result = mysqli_query($con, $query);

        if($result) 
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password) 
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: admin/index.php");
                    die;
                }
            }
        }
        echo "Zła nazwa użytkownika lub hasło.";
    }else
    {
        echo "Zła nazwa użytkownika lub hasło.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Kliknij aby się zarejestrować.</a><br><br>
        </form>
    </div>
</body>
</html>