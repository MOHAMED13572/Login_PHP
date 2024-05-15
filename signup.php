<?php
include("signup.html"); 

$ddata = fopen("detaileddata.txt", "a+"); 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fullname = $_POST['fullname'].PHP_EOL; 
    $username = $_POST['username'].PHP_EOL; 
    $gmail =       $_POST['email'].PHP_EOL;
    $number =     $_POST['number'].PHP_EOL; 
    $pass =         $_POST['pass'].PHP_EOL; 
    $confirm_pass =    $_POST['confirm_pass'].PHP_EOL ; 

if($pass != $confirm_pass){

    echo '<script>
    const temp = document.getElementById("temp"); 
    temp.setAttribute("conf",""); 
    </script>'; 
    

}
else{
    echo '<script>
    const temp = document.getElementById("temp"); 
    temp.removeAttribute("conf",""); 
    </script>'; 
    
    fwrite($ddata, $gmail); 
    fwrite($ddata, $pass); 
    fwrite($ddata, $username); 
    fwrite($ddata, $fullname); 
    fwrite($ddata, $number); 
    header("Location: index.php"); 
    
}
}


fclose($ddata); 
