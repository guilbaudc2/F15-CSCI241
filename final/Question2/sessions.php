<?php

session_start();

?>

<!DOCTYPE>
<html>
        <head>
                <title>Sessions Rock</title>
        </head>
        <body>

<?php

if(isset($_SESSION["count"]))
{
        $_SESSION["count"]++;
}
else
{
        $_SESSION["count"]=1;
}

echo "I have seen you " . $_SESSION["count"] . " times!";
?>

        </body>
</html>