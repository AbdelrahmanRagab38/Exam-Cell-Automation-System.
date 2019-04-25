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
        <form action="" method="post">
            <fieldset>
            <legend>Enter Marks</legend>

                <?php
                    include("init.php");
                    include("session.php");

                    $select_class_query="SELECT `name` from `students`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //select class
                    echo '<select name="Student_name">';
                    echo '<option selected disabled>Select Student Name</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="Student_Id" placeholder="Student Id">
                <input type="text" name="p1" id="" placeholder="subject 1">
                <input type="text" name="p2" id="" placeholder="subject 2">
                <input type="text" name="p3" id="" placeholder="subject 3">
                <input type="text" name="p4" id="" placeholder="subject 4">
                <input type="text" name="p5" id="" placeholder="subject 5">
                <input type="text" name="p6" id="" placeholder="subject 6">
                <input type="text" name="p7" id="" placeholder="subject 7">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['Student_Id'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['p6'],$_POST['p7']))
    {
        $Student_Id=$_POST['Student_Id'];
        
        if(!isset($_POST['Student_name']))
            $Student_name=null;
        else
            $Student_name=$_POST['Student_name'];
        
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        
        if(!isset($_POST['p4']))
            $p4=0;
        else
        $p4=(int)$_POST['p4'];
        
         if(!isset($_POST['p5']))
            $p5=0;
        else
        $p5=(int)$_POST['p5'];
        
          if(!isset($_POST['p6']))
            $p6=0;
        else
        $p6=(int)$_POST['p6'];
        
          if(!isset($_POST['p7']))
            $p7=0;
        else
        $p7=(int)$_POST['p7'];

        $marks=$p1+$p2+$p3+$p4+$p5+$p6+$p7;
        $percentage=$marks/5;

        // validation
        if (empty($Student_name) or empty($Student_Id) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p6>100 or $p7>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 or $p6<0 or $p7<0 ) {
            if(empty($Student_name))
                echo '<p class="error">Please select Student</p>';
            if(empty($Student_Id))
                echo '<p class="error">Please enter Student Id</p>';
            if(preg_match("/[a-z]/i",$Student_Id))
                echo '<p class="error">Please enter valid Id number</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Please enter valid marks</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p6>100 or $p7>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 or $p6<0 or $p7<0)
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }

        $name=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `Student_Id`='$Student_Id' and `name`='$Student_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            echo $display;
         }

        $sql="INSERT INTO `result` (`name`, `Student_Id`, `p1`, `p2`, `p3`, `p4`, `p5`,`p6`,`p7`, `marks`, `percentage`) VALUES ('$display', '$Student_Id', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$marks', '$percentage')";
        $sql=mysqli_query($conn,$sql);

        
        
        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }
?>