<?php

$con = mysqli_connect('localhost','root');

if($con) {
    mysqli_select_db($con,'endgemdb');
    if (isset($_POST['submit']))
    {
        $filename = $_POST['filename'];
        $course = $_POST['course'];
        date_default_timezone_set("Asia/Kolkata");
        $sub_date = date("Y/m/d");

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $sql = " select max(id) as id from course$course ";
        $result = mysqli_query($con, $sql);
        if (count($result) > 0) {
            $row = mysqli_fetch_array($result);
            $filename = ($row['id']+1) . '-' . $filename . '.' .$ext;
        }
        else $filename = '1' . '-' . $filename;

        $path = "uploads/course$course/";
        move_uploaded_file($_FILES['file']['tmp_name'],($path . $filename));
        
        $sql = "INSERT INTO course$course (filename, sub_date, downloads) VALUES ('$filename', '$sub_date', 0)";
        mysqli_query($con, $sql);
        header("Location: add.html");
    }
}
else {
    "No connection";
}

?>