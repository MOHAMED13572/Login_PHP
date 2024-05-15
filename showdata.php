<?php
session_start();

$gmail = trim($_SESSION['gmail'], "\n\r ");
$pass = trim($_SESSION['pass'], "\n\r ");


$ddata = fopen("detaileddata.txt", "a+");

while (!feof($ddata)) {
    // get thr gmail and the pass from the file and filter that
    $fgmail = trim(fgets($ddata), "\n\r ");
    $fpass = trim(fgets($ddata), "\n\r "); 
    if ($fpass == $pass && $fgmail == $gmail)break;
    else{
        $temp = 3;
        while($temp--)fgets($ddata); 
    }
}


            $username =  trim(fgets($ddata), "\n\r ");
            $name =  trim(fgets($ddata), "\n\r ");
            $number =  trim(fgets($ddata), "\n\r ");
fclose($ddata); 



include("showdata.html"); 
echo "
<div class='container'>
        <form action='showdata.php'  method='post'>
            <input type='text' name='name' value ='Welcome :     $name' >
            <input type='text' name='username' value = ' Username is :     $username'>
            <input type='text' name='number' value = ' Number is :     $number'>
            <input type='text' name='email' value = 'Gmail :     $gmail'>
            <input type='submit' name='sign_out'  value='sign out' >
        </form>
    </div>
";


if($_SERVER['REQUEST_METHOD']== 'POST'){
    session_unset(); 
    session_destroy(); 
header("Location: index.php");
}





