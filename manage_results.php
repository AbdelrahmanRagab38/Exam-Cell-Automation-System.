<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Dashboard</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Courses &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Courses</a>
                    <a href="manage_classes.php">Manage Courses</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Result</legend>
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $Name_result=mysqli_query($conn,"SELECT `name` FROM `result`");
                        echo '<select name="Student_name">';
                        echo '<option selected disabled>Select Student</option>';
                    while($row = mysqli_fetch_array($Name_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                
                <input type="text" name="Student_Id" placeholder="Student Id">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>
                
                <?php
                    $Name_result=mysqli_query($conn,"SELECT `name` FROM `result`");
                        echo '<select name="Student_name">';
                        echo '<option selected disabled>Select Student</option>';
                    while($row = mysqli_fetch_array($Name_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                <input type="text" name="id" placeholder="Student_Id">
                <input type="text" name="p1" id="" placeholder="Update subject 1">
                <input type="text" name="p2" id="" placeholder="Update subject 2">
                <input type="text" name="p3" id="" placeholder="Update subject 3">
                <input type="text" name="p4" id="" placeholder="Update subject 4">
                <input type="text" name="p5" id="" placeholder="Update subject 5">
                <input type="text" name="p6" id="" placeholder="Update subject 6">
                <input type="text" name="p7" id="" placeholder="Update subject 7">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>

    <!-- <div class="footer">
        <span>Designed & Coded By Jibin Thomas</span>
    </div> -->
    
</body>
</html>

<?php
    if(isset($_POST['Student_name'],$_POST['Student_Id'])) {
        $Student_name=$_POST['Student_name'];
        $Student_Id=$_POST['Student_Id'];
        echo $Student_name;
        echo $Student_Id;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `Student_Id`='$Student_Id' and `name`='$Student_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['id'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['p6'],$_POST['p7'],$_POST['Student_name'])) {
        $Student_Id=$_POST['id'];
        $Student_name=$_POST['Student_name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];
        $p6=(int)$_POST['p6'];
        $p7=(int)$_POST['p7'];

        $marks=$p1+$p2+$p3+$p4+$p5+$p6+$p7;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`p6`='$p6',`p7`='$p7',`marks`='$marks',`percentage`='$percentage' WHERE `Student_Id`='$Student_Id' and `name`='$Student_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>