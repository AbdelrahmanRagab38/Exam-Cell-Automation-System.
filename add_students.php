<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
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
                <legend>Add Student</legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="Student_Id" placeholder="Student ID">
                <input type="text" name="semester" placeholder="Semester">
             <!--     <select name="class_name"><option selected="" disabled="">Select Subject</option>
                    <option value="as">OS</option>
                    <option value="ASMAA">SW1</option>
                    <option value="Fcih">SW2</option>
                    <option value="sim">simo</option>
                </select> -->
                
                
                
                
            
                <!-- read the courses from databasses and view it -->
                
                <?php
                    include('init.php');
                    include('session.php');

                
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `courses`");
                        echo '<select name="course_name1">';
                        echo '<option selected disabled>select subject1</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                        
                        
                        
                        
                        
                ?>
                
               
                <?php
                   
                
                $class_result1=mysqli_query($conn,"SELECT `name` FROM `courses` WHERE id!=3");

                echo '<select name="course_name2">';
                        echo '<option selected disabled>select subject2</option>';
                    while($row = mysqli_fetch_array($class_result1)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <?php
                   
                
                $class_result1=mysqli_query($conn,"SELECT `name` FROM `courses` WHERE id!=3 && id!=4");
                        echo '<select name="course_name3">';
                        echo '<option selected disabled>select subject3</option>';
                    while($row = mysqli_fetch_array($class_result1)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <?php
                   
                
                $class_result1=mysqli_query($conn,"SELECT `name` FROM `courses` WHERE id!=3 && id!=4 && id!=7");
                        echo '<select name="course_name4">';
                        echo '<option selected disabled>select subject4</option>';
                    while($row = mysqli_fetch_array($class_result1)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <?php
                   
                
                $class_result1=mysqli_query($conn,"SELECT `name` FROM `courses` WHERE id!=3 && id!=4 && id!=7 && id!=10 ");
                        echo '<select name="course_name5">';
                        echo '<option selected disabled>select subject5</option>';
                    while($row = mysqli_fetch_array($class_result1)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <?php
                   
                
                $class_result1=mysqli_query($conn,"SELECT `name` FROM `courses`WHERE id!=3 && id!=4 && id!=7 && id!=10 && id!=6");
                        echo '<select name="course_name6">';
                        echo '<option selected disabled>select subject6</option>';
                    while($row = mysqli_fetch_array($class_result1)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                
                <?php
                   
                
                $class_result1=mysqli_query($conn,"SELECT `name` FROM `courses` WHERE id!=3 && id!=4 && id!=7 && id!=10 && id!=6 &&id!=5");
                        echo '<select name="course_name7">';
                        echo '<option selected disabled>select subject7</option>';
                    while($row = mysqli_fetch_array($class_result1)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                
                
                
                
                
                
                
                

             <input type="submit" value="Submit">
                
            </fieldset>
        </form>
    </div>

    
    
    
    
    
    
    <div class="footer">
    </div>
</body>
</html>

<?php

    if(isset($_POST['student_name'],
             $_POST['Student_Id'],
             $_POST['course_name1'],
             $_POST['course_name2'],
             $_POST['course_name3'],
             $_POST['course_name4'],
             $_POST['course_name5'],
             $_POST['course_name6'],
             $_POST['course_name7'],
            
            )) 
    {
    $name=$_POST['student_name'];
    $Student_Id=$_POST['Student_Id'];
   /* $cname1=$_POST['course_name1'];
    $cname2=$_POST['course_name2'];
    $cname3=$_POST['course_name3'];
    $cname4=$_POST['course_name4'];
    $cname5=$_POST['course_name5'];
    $cname6=$_POST['course_name6'];
    $cname7=$_POST['course_name7'];*/
        
    
        if(!isset($_POST['course_name1']))
            $cname1=null;
        else
            $cname1=$_POST['course_name1'];
        
        if(!isset($_POST['course_name2']))
            $cname2=null;
        else
            $cname2=$_POST['course_name2'];
        
        if(!isset($_POST['course_name3']))
            $cname3=null;
        else
            $cname3=$_POST['course_name3'];
        
        if(!isset($_POST['course_name4']))
            $cname4=null;
        else
            $cname4=$_POST['course_name4'];
        
        if(!isset($_POST['course_name5']))
            $cname5=null;
        else
            $cname5=$_POST['course_name5'];
        
        if(!isset($_POST['course_name6']))
            $cname6=null;
        else
            $cname6=$_POST['course_name6'];
        
        if(!isset($_POST['course_name7']))
            $cname7=null;
        else
            $cname7=$_POST['course_name7'];
        
        $className="fcih";
        
        
       /* if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];*/

        // validation
        if (empty($name) or empty($Student_Id) or empty($cname1)
            or empty($cname2) or empty($cname3) or empty($cname4) or empty($cname5) 
            or preg_match("/[a-z]/i",$Student_Id) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($Student_Id))
                echo '<p class="error">Please enter your Id number</p>';
            if(empty($course_name1) && empty($course_name2) && empty($course_name3) && empty($course_name4) && empty($course_name5))
                echo '<p class="error">Please select at least 3 courses</p>';
            if(preg_match("/[a-z]/i",$Student_Id))
                echo '<p class="error">Please enter valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `students` (`name`, `Student_Id`,`class_name`,`course1`,`course2`,`course3`,`course4`,`course5`,`course6`,`course7`) VALUES ('$name', '$Student_Id','$className','$cname1','$cname2','$cname3','$cname4','$cname5','$cname6','$cname7')";
        
       // $sql1 = "INSERT INTO `registered_courses`  VALUES('1','$Student_Id','$cname1','$cname2','$cname3','$cname4','$cname5','$cname6','$cname7')";
        $result=mysqli_query($conn,$sql);
    //    $result1=mysqli_query($conn,$sql1);
        
        if (!$result) {
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