<!DOCTYPE html>

<html>
    <head>
        <style>
            .error{
                color:red;
                font-size: 10px;
            }
        </style>
    </head>
    <body align="center">

        <?php
            $login = $email = $key = $gender = $website = $comment = "";
            $loginError = $emailError = $keyError = $genderError = $websiteErorr = $commentError = "";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                if(empty($_POST['login'])){
                    $loginError = "Login is required!";
                } else {
                    $login = forminput($_POST['login']);
                    if(!preg_match("/^[a-zA-Z-' ]*$/", $login)){
                        $loginError = "Only letters and write space allowed";
                    }
                }
                if(empty($_POST['email'])){
                    $emailError = "E-mail is required!";
                } else {
                    $email = forminput($_POST['email']);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $emailError="Invalid email format";
                    }
                }
                if(empty($_POST['key'])){
                    $keyError = "Key is required!";
                } else {
                    $key = forminput($_POST['key']);
                }
                if(empty($_POST['website'])){
                    $websiteError = "Website is error!";
                } else {
                    $website = forminput($_POST['website']);
                    /*if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z-0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)){
                        $websiteError = "Ivalid URL!";
                    }*/
                    if(!filter_var($website, FILTER_VALIDATE_URL)){
                        $websiteError = "Invalid URL";
                    }
                }
                if (empty($_POST['comment'])){
                    $commentError = "Comment is required!";
                } else {
                    $comment = forminput($_POST['comment']);
                }
                if(empty($_POST['gender'])){
                    $gendererr = "Gender is required!";
                } else {
                    $gender = forminput($_POST['gender']);
                }
            }
            
            function forminput($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <h3>REGISTER FORM<span class='error'>* required field</span></h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Login: <input type = "text" name = "login"><span class='error'>*<?php echo $loginError;?></span><br><br> 
        E-mail: <input type = "text" name = "email"><span class='error'>*<?php echo $emailError;?></span><br><br>
        Key: <input type = "password" name = "key"><span class='error'>*<?php echo $keyError;?></span><br><br>
        Website: <input type = "text" name = "website"><span class='error'>*<?php echo $websiteError;?></span><br><br>
        Comment: <textarea name="comment" row="5" cols="40"></textarea><br><br>
        Gender: 
        <input type = "radio" name = "gender" value="female">Female
        <input type = "radio" name = "gender" value="male">Male
        <input type = "radio" name = "gender" value="other">Other<span class='error'>*<?php echo $gendererr;?></span><br><br>
        <input type="submit" name = "submit" value= "Submit">
        </form>

        <?php
            echo "<h2>Your information</h2>";
            echo $login, "<br>";
            echo $email, "<br>";
            echo $key, "<br>";
            echo $website, "<br>";
            echo $comment, "<br>";
            echo $gender, "<br>";
        ?>
    </body>
</html>