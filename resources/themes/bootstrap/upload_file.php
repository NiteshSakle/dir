<?php

if (isset($_POST['dir'])) {
    $dir = $_POST["dir"];
    $dir = str_replace(".", "", $dir);
    //echo $dir;
    $targetfolder = $_SERVER['DOCUMENT_ROOT']."/dir".$dir."/". basename( $_FILES['file']['name']) ;
    //echo $targetfolder;
    $ok=1;
    $file_type=$_FILES['file']['type'];
    //echo $file_type;
    $imageFileType = strtolower(pathinfo($targetfolder,PATHINFO_EXTENSION));
    echo $imageFileType;

    if ($file_type=="application/pdf") {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
            exit;
        } else {
            echo "Problem uploading file";
        }
    }
    else {
        echo "You can only upload PDF files.<br>"; 
    }
}
?>