<?php

include "baseinclude.php";

echo "Home!<br/>";
$model = $_SESSION["homemodel"];
$model -> hello();

?>