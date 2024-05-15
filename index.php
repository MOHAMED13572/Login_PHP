<?php
session_start();

// if the person logged in previously 
if (isset($_SESSION['gmail']) && $_SESSION['pass']) {
    header("Location: showdata.php");
        } else {



    include("login.html");
// if user press login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // get the gmail and the pass from the user and filter them
        $gmail = trim($_POST['gmail'], "\n\r ");
        $pass = trim($_POST['pass'], "\n\r ");
// open folder instead of data base
        $ddata = fopen("detaileddata.txt", "a+");

        while (!feof($ddata)) {
            // get thr gmail and the pass from the database and filter that
            $fgmail = trim(fgets($ddata), "\n\r ");
            $fpass = trim(fgets($ddata), "\n\r ");
            $temp = 3;
            while ($temp--) fgets($ddata);

// if we found the right email and password

            if ($fpass == $pass and $fgmail == $gmail) {
                $_SESSION['gmail'] = $gmail;
                $_SESSION['pass'] = $pass;
                header("Location: showdata.php");
                break;
            }
        }

// if the gmail or the pass was wrong their color will be red
                echo '<script>
                const temp = document.getElementById("wrong_gmail"); 
                const tempp = document.getElementById("wrong_pass"); 
                temp.setAttribute("wrong",""); 
                tempp.setAttribute("wrong",""); 
                </script>'; 

        fclose($ddata);
    }
}
