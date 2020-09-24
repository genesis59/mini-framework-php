<?php

session_regenerate_id(true);

$_SESSION["user"] = null;

header("location: index.php?c=home");