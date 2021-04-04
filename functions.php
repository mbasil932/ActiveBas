<?php 
include'conn.php';
function Insert($table, $data)
{

    global $con;
    //print_r($data);

    $fields = array_keys($data);
    $values = array_map(array($con, 'real_escape_string'), array_values($data));

    //echo "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');";
    //exit;
    mysqli_query($con, "INSERT INTO $table(" . implode(",", $fields) . ") VALUES ('" . implode("','", $values) . "');") or die(mysqli_error($mysqli));

}

?>