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
$sql="SELECT * FROM course$q ORDER BY downloads DESC ";
$result = mysqli_query($con,$sql);

echo "<p style='text-align: center; color: #f0f0f0; margin-top: 10%; font-size: large;'>TOP GEMS</p><br>";

while($row = mysqli_fetch_array($result)) {
    echo '
    <div id="gem">
        <div id="gemfiletype">
            <img style="height: 50%" src="../images/pdf.png">
        </div>
        <div id="gemtitledate">'.$row['filename'].'</div>
        <div id="gemtd">Downloads: '.$row['downloads'].'</div>
    </div>
    ';
}
mysqli_close($con);
?>
</body>
</html>