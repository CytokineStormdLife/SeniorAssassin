<?php
    //ONLY ACCESSABLE FROM init.php
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));

    $checklogin = mysql_query("SELECT * FROM `players` WHERE name = '".$username."' AND password = '".$password."';");

    if(mysql_num_rows($checklogin) == 1)
    {
        $row = mysql_fetch_array($checklogin);

        $_SESSION['Username'] = $username;
        $_SESSION['LoggedIn'] = 1;
        $_SESSION['id'] = $row["id"];

        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<br> <a href = viewTable.php> viewTable.php </a>";

    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"init.php\">click here to try again</a>.</p>";
    }

?>
