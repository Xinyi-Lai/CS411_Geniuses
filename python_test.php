<?php

$result = system("python3 py/hello_world.py");
// $result = exec("python3 py/hello_world.py");

echo "returned result is ".$result;

?>