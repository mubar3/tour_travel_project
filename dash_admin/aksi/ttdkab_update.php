<?php
    include "../../config/koneksi.php";
    if ($_FILES['tandatangan']['size'] != 0)
    {
        $fileName = $_FILES['tandatangan']['name'];
        $move = move_uploaded_file($_FILES['tandatangan']['tmp_name'], "../../assets/img/tandatangan/".$_FILES['tandatangan']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE kabupaten SET tandatangan='$fileName' WHERE id_kab = '$_POST[id_kab]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../tanda-tangan'</script>";
        }
    }

?>
