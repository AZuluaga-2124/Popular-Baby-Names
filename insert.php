// JavaScript source code
<? php
include 'db_connect.php';


$file = fopen("yob2016.txt", "r");

while (!feof($file)) {
    $content = fgets($file);
    $carray = explode(",", $content);
    list($name) = $carray;
    $sql = "INSERT INTO `mzambrano2016`.`BABYNAMES` (`Names`) VALUES ('$name')";

    $db -> query($sql);


    //echo"<pre>";
    //var_dump($name);

}

fclose($file);
$db -> close();




?>
