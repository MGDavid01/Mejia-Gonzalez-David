<?php
function connectTo2DB() : mysqli {
    $db = mysqli_connect("localhost","root","","bienesraices3", 3308);
    if($db){
        echo "Conectado";
    } else {
        echo "No conectado";
    }
    return $db;
}
?>