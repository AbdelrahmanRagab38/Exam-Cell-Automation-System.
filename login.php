<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <div class="title">
        <span>Student Result Management System</span>
    </div>

   
    
    
    
    
    
    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">Login</legend>
                    <input type="text" name="userid" placeholder="Email" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Login">
                </fieldset>
            </form>    
        </div>
        
        <div class="search">
            <form action="" method="post" name="Slogin">
                <fieldset>
                    <legend class="heading">Login for Student</legend>
                    <input type="text" name="Sid" placeholder="Email" autocomplete="off">
                    <input type="password" name="Spassword" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Login">
                </fieldset>
            </form>
        </div>
        
        
        <!--search and pront pdf-->
        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">For Students</legend>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `students`");
                            echo '<select name="name">';
                            echo '<option selected disabled>Select your Name</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <input type="text" name="rn" placeholder="ID">
                    <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
        
    </div>

</body>
</html>

<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userName FROM users WHERE userName='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            
            $userData=mysqli_fetch_array($result);;
				//echo "Welcome ".$userData['username'];
				if($userData['Type']==0){
                 $_SESSION['userid']=$username;
                 header("location:dashboard.php");
                    
			//	}مش عاوززززززززززززززززه تشتغللللللل لييييه
			//	else if($userData['Type']==1){
             //      $_SESSION['userid']=$username;
			//		header("location:studentpage.php");
				}
            
           // $_SESSION['login_user']=$username;
           // header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>
<?php
if (isset($_POST["Sid"],$_POST["Spassword"]))
    {
        $Susername=$_POST["Sid"];
        $Spassword=$_POST["Spassword"];
        $sql = "SELECT userName FROM users WHERE userName='$Susername' and password = '$Spassword'and Type=1";
        $result1=mysqli_query($conn,$sql);

        $row1=mysqli_fetch_array($result1);
        $count1=mysqli_num_rows($result1);
        
        if($count1==1) {
                 $_SESSION['userid']=$username;
                 header("location:studentpage.php");
    
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }





?>

