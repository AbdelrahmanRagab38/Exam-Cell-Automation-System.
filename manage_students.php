<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
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
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `Student_Id`, `course1`, `course2`, `course3`, `course4`, `course5`, `course6`, `course7` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption>Manage Students</caption>
                <tr>
                <th>NAME</th>
                <th>ID</th>
                <th>course1</th>
                <th>course2</th>
                <th>course3</th>
                <th>course4</th>
                <th>course5</th>
                <th>course6</th>
                <th>course7</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['Student_Id'] . "</td>";
                    echo "<td>" . $row['course1'] . "</td>";
                    echo "<td>" . $row['course2'] . "</td>";
                    echo "<td>" . $row['course3'] . "</td>";
                    echo "<td>" . $row['course4'] . "</td>";
                    echo "<td>" . $row['course5'] . "</td>";
                    echo "<td>" . $row['course6'] . "</td>";
                    echo "<td>" . $row['course7'] . "</td>";
                    echo "</tr>";
                  }

                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>

    <div class="footer">
        <!-- <span>Designed & Coded By Jibin Thomas</span> -->
    </div>
</body>
</html>
