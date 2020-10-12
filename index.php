<!DOCTYPE html>
<?php
$db_users=["user1","user2","user3"];
$db_users_password = ["pass1","pass2","pass3"];

$error=[];
if(!empty($_POST["button"])){
    switch ($_POST["button"]) {
        case 'register':{
            $full_name=$_POST["full_name"];
            $username=$_POST["username"];
            $password=$_POST["password"];
            $confirm_password=$_POST["confirm_password"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $date_of_birth=$_POST["date_of_birth"];
            $social_security_number=$_POST["social_security_number"];

            if(in_array($username,$db_users)){
                $error['user_invalid']="username already exists";
            }
            if(strlen($username)<5){
                $error['user_invalid'] = "error username should be more than 5 charachters";
            }
            if(filter_var($email,FILTER_VALIDATE_EMAIL)===False){
                $error['email_invalid']= "email should be an email";
            }
            if(!is_numeric($phone)){
                $error['phone_invalid']="phone should be a number";

            }
            if(date("Y-m-d",$date_of_birth)==$date){
                $error['date_invalid']= "date should be a date";
            }
            if(!is_numeric($social_security_number)){
                $error['social_invalid']= "phone should be a number";
            }
            if($password !== $confirm_password and !empty($password)) {
                $error['password_invalid']= "password and confirm password do not match";
            }
            break;
        }
        case 'log in':{ 
            $username1=$_POST["username1"];
            $password1=$_POST["password1"];
            
            if(in_array($username1,$db_users) and in_array($password1,$db_users_password) and array_search($username1,$db_users) === array_search($password1,$db_users_password)) {
                header("location:safe.php");
            }else{
                $error['login_invalid']= "wrong username or password";
            }
            break;  
        }
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    html,body {
        margin: 0;
        height: 100%;
        font-family: arial;fields
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
    }
    form {
        display: grid;
        gap:8px;
        align-content: start;
        padding:10px;   
    }
</style>
<body>
    <div class="grid">
        <form method="post">
            Register
            <input required type="text" placeholder="Full Name" name="full_name" value="<?=@$full_name ?>">
            <input required type="text" placeholder="Username" name="username" value="<?=@$username ?>">
            <?php echo @$error['user_invalid']; ?>
            <input required type="password" placeholder="Password" name="password" value="<?=@$password ?>">
            <input required type="password" placeholder="Confirm Password" name=" confirm_password" value="<?=@$confirm_password ?>">
            <?=@$error['password_invalid'] ?>
            <input required type="email" placeholder="Email" name="email" value="<?=@$email ?>">
            <?php echo @$error['email_invalid']; ?>
            <input required type="number" placeholder="Phone" name="phone" value="<?=@$phone ?>">
            <?php echo @$error['phone_invalid']; ?>
            <input required type="date" placeholder="Date of Birth" name="date_of_birth" value="<?=@$date_of_birth ?>">
            <?php echo @$error['date_invalid']; ?>
            <input required type="number" placeholder="Social Security Number" name="social_security_number" value="<?=@$social_security_number ?>">
            <?php echo @$error['social_invalid']; ?>
            <button name="button" value="register">Submit</button>
        </form>
        <form method="post">
            Log In
            <input type="text" placeholder="Username" name="username1" value="<?=@$username1 ?>">
            <input type="password" placeholder="Password" name="password1" value="<?=@$password1 ?>">
              <?=@$error['login_invalid'] ?>
            <button name="button" value="log in">Log in</button>
        </form>
    </div>
</body>
</html>