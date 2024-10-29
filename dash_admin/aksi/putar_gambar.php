<?php

 
function RotateJpg($filename = '',$angle = 0,$savename = false)
    {
        // Your original file
        $original   =   imagecreatefromjpeg($filename);
        // Rotate
        $rotated    =   imagerotate($original, $angle, 0);
        // If you have no destination, save to browser
        if($savename == false) {
                header('Content-Type: image/jpeg');
                imagejpeg($rotated);
            }
        else
            // Save to a directory with a new filename
            imagejpeg($rotated,$savename);

        // Standard destroy command
        imagedestroy($rotated);
    }
 
$filename = $_GET['foto'];
$degrees = $_GET['no'];
 
RotateJpg($filename,$degrees,$filename);

echo "<script>window.alert('Foto Berhasil di Putar!');
             window.location='../detail-data?id=".$_GET['id']."'</script>";
 
?>

?>