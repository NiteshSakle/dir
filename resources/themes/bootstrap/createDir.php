<?php 

// echo $dir;
// $bool = mkdir("testing");

//mkdir("./web",  0777, true);
if (isset($_POST['dir'])) {
    $dir = $_POST["dir"];
    $dirName = $_POST["name"];
    mkdir($_SERVER['DOCUMENT_ROOT']."/dir".$dir."/".$dirName,  0777, true);
    echo $_SERVER['DOCUMENT_ROOT']."/dir".$dir;
}

?>