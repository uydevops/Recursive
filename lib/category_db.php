<?php
require_once('db.php');

if(isset($_POST["title"]) &&isset($_POST["parent_id"]))
{
$add=$db->prepare("INSERT INTO category SET title=?,parent_id=?");
$add->execute(array(
    $_POST["title"],
    $_POST["parent_id"]
));

if($add)
{
    header('location:../index.php');
}
}
else
{
    echo "Hata";
}


?>