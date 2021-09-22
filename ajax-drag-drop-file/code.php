<?php

// use JetBrains\PhpStorm\Language;


$conn = mysqli_connect("localhost", "root", "", "drop_file") or die("Connection Failed.!");

if($_FILES['file']['name'] != ""){
    move_uploaded_file($_FILES['file']['tmp_name'][0],"images/".$_FILES['file']['name'][0]);
    $file_names = "";
    $total = count($_FILES['file']['name']);

    for($i = 0; $i<$total; $i++){
        $filename = $_FILES['file']['name'][$i];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extensions = array("png","jpg","jpeg");
        if(in_array($extension, $valid_extensions)){
            $new_name = rand() . ".". $extension;
            $path = "images/". $new_name;

            move_uploaded_file($_FILES['file']['tmp_name'][$i],$path);

            $file_names .= $new_name. " ,";
        }else{
            echo 'extension error or name error';
        }
    }

    $sql = "INSERT INTO uploaded_files(files) VALUES('$file_names')";
    if(mysqli_query($conn,$sql)){
        echo 'true';
    }else{
        echo 'query-fail';
    }
}

?>
