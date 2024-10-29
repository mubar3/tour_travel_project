<title>Project Ujicoba</title>
<style>
    .set-table tr td{
        padding: 15px;
        text-align: center;
    }
</style>
<?php
// koneksi
mysql_connect('localhost', 'root', '');
mysql_select_db('kartamus');
//query
$id=$_POST['selector'];
    $N = count($id);
    for($i=0; $i < $N; $i++)
$result = mysql_query("SELECT * FROM user WHERE id='$id[$i]'");
//buat array
$array = array();
while ($row = mysql_fetch_array($result)) {
array_push($array, $row);
}
// atur jumlah kolom yang diinginkan disini
$kolom = 2;
$chunks = array_chunk($array, $kolom);
echo '<table class="set-table">';
foreach ($chunks as $chunk) {
    echo '<tr>';
    foreach ($chunk as $set) {
        echo '<td>';
        echo '<img style="width:50px;height:50px;" src="../assets/img/user/' . $set['gambar'] . '" /><br>' . $set['nama'];
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>