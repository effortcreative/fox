<?php
    header('Access-Control-Allow-Origin:*');
    $fp = file_get_contents('results.json');
    $data=json_decode($fp,true);
    echo json_encode($data[data]);
?>			