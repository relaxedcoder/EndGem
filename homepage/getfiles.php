<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"endgemdb");
$sql="SELECT * FROM course$q";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo '
    <div class="file" id='.$row['id'].'>
        <div class="filetype">
            <img style="height: 50%" src="../images/pdf.png">
        </div>
        <div class="titledate">
            '.$row['filename'].'<br>'.$row['sub_date'].'
        </div>
        <div class="td">Downloads: '.$row['downloads'].'</div>
        <div class="download">
            <a href="../add/uploads/course'.$q.'/'.$row['filename'].'" download onclick="updatedownload('.$q.','.$row['id'].')"><img style="height: 25px; opacity: 0.23;" src="../images/download.png"></a>
        </div>
    </div>
    ';
}
mysqli_close($con);
?>
</body>
</html>