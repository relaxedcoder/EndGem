<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);
$fileid = intval($_GET['fileid']);

$con = mysqli_connect('localhost','root');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"endgemdb");

$sql = "UPDATE course$q SET downloads=downloads+1 WHERE id=$fileid";
mysqli_query($con, $sql);

mysqli_close($con);
?>
</body>
</html>