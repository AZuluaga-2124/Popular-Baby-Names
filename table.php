
<html>
<head>
<title>Table</title>
<!--Bootstrap CSS -->
    <link rel = "stylesheet" href="bootstrap-4.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="StyleSheet.css" />
</head>

<body>

   <header >
       <h1 class="Head">Babynames </h1>
   </header>

    
    <div class="fatDiv">

         
        <?php
            echo"<div class='php1'> ";
            include 'db_connect.php';

            $sqlget ="SELECT * FROM BABYNAMES";
            $sqldata = mysqli_query($db,$sqlget) or die ("error creating");


            echo "<div class = 'container'> ";
            echo "<div class = 'row'>";
            echo "<div class = 'col-md-8'>";
            echo "<div class = 'scrollable'>";

            echo "<table class = 'table table-bordered text-center'>";

            echo "<thead><th>Names</th></thead>";

                while($row = mysqli_fetch_array($sqldata))
                {
                    echo"<tbody> <tr> <td>";
                    echo $row['Names'];
                    echo "</td> </tr> </tbody>";
                }
                echo"</table>";
                echo"</div></div></div></div>";

                echo "</div>"

        ?>


         
      <div class="php2"> 
         <form method="post" action="BBinsert.php" class="Form">
            <?php
            
            include 'db_connect.php';

            $sqlget ="SELECT DISTINCT a.name, a.gender FROM UserBBnames a INNER JOIN (SELECT name, COUNT(*) totalCount FROM UserBBnames GROUP BY name)b ON a.name = b.name WHERE 1 ORDER BY b.totalCount DESC";
            
            $sqldata = mysqli_query($db,$sqlget) or die ("error creating");


            echo "<div class = 'container'> ";
            echo "<div class = 'row'>";
            echo "<div class = 'col-md-8'>";
            echo "<div class = 'scrollable'>";

            echo "<table class = 'table table-bordered text-center'>";

            echo "<thead><th>Names</th></thead>";

            while($row = mysqli_fetch_array($sqldata))
            {
                echo"<tbody> <tr> <td>";
                echo $row['name'];
                echo "</td> </tr> </tbody>";
            }
            echo"</table>";
            echo"</div></div></div></div>";

            ?>
        </form>

      </div>
  </div>

 

    <section class="div-1">
     
        <form method="post" action="BBinsert.php">
            Select a gender:
            <select name="gender">
                <option value="Boy">Boy</option>
                <option value="Girl">Girl</option>
            </select>
            Enter your favorite baby name: 
            <input type="text" name="bbnames"/>

            <input type="submit" name="submit"/>        
        </form>
    </section>




        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="bootstrap-4.2.1/dist/js/bootstrap.min.js"></script>

</body>

</html>