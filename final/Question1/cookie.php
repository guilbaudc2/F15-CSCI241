<?php

$cookieContent[] = "Is not that bad!";
$cookieContent[] = "Is in the way of my break!";

$finalExamCookie = implode("|", $cookieContent);

header("Set-Cookie: finalexam=" . base64_encode($finalExamCookie));

