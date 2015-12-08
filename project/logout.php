<?php
require_once("common.php");
session_destroy();
session_write_close();
header("Location: login.php");

