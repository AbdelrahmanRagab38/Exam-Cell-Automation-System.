<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>

    
    
        



    <div class="container">
        <div class="details">
            <span>Your Seat:</span> <?php echo "On Modrg 3" ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>section</p>
                      <span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp not yet</span> <?php echo "" ?> <br>

           

                
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'."dd".'</p>';?>
                
            </div>
        </div>

       

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>