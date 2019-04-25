<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php");

    
    
        if(!isset($_GET['name']))
            $class=null;
        else
            $class=$_GET['name'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your Id number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid Id number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name`,`course1`,`course2`,`course3`,`course4`,`course5`,`course6`,`course7`, FROM `students` WHERE `Student_Id`='$rn' and `name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        $sub1 = $row['course1'];
        $sub2 = $row['course2'];
        $sub3 = $row['course3'];
        $sub4 = $row['course4'];
        $sub5 = $row['course5'];
        $sub6 = $row['course6'];
        $sub7 = $row['course7'];
        }
    

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`,`p6`,`p7`, `marks`, `percentage` FROM `result` WHERE `Student_Id`='$rn' and `name`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $p6 = $row['p6'];
            $p7 = $row['p7'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="details">
            <span>Name:</span> <?php echo $class ?> <br>
            <span>ID:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
            <?php echo '<p>'.$sub1.'</p>';?>
            <?php echo '<p>'.$sub2.'</p>';?>
            <?php echo '<p>'.$sub3.'</p>';?>
            <?php echo '<p>'.$sub4.'</p>';?>
            <?php echo '<p>'.$sub5.'</p>';?>
            <?php echo '<p>'.$sub6.'</p>';?>
            <?php echo '<p>'.$sub7.'</p>';?>
           

                
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
                <?php echo '<p>'.$p6.'</p>';?>
                <?php echo '<p>'.$p7.'</p>';?>
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>