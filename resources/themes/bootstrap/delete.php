<?php

$dirname = $_SERVER['DOCUMENT_ROOT'] . '/dir/' . $_POST['dir'];

if($_GET['f'] == 'function') {
    delete_directory($dirname);
}
function delete_directory($dirname) {
    if (is_dir($dirname)) {
        echo "directory";
        $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
            else
                delete_directory($dirname . '/' . $file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
    else {
        echo "FILE";
        $file = $_SERVER['DOCUMENT_ROOT'] . '/dir/' . $_POST['dir'];
        if (!unlink($file)) {
            echo ("Error deleting $file");
            return FALSE;
        } else {
            echo ("Deleted $file");
            return TRUE;
        }
    }    
}
