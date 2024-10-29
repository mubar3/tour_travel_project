<?php
// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "tour_travel_project"; //nama database

// $server="http://localhost/kartanu_mojokerto/";
$server="https://bawana-cahaya-abadi.com/apptest/kartanu_mojokerto/";

// $db['host'] = "localhost"; //host
// $db['user'] = "u1487614_kartanu_mojokerto"; //username database
// $db['pass'] = "kartanu_mojokerto"; //password database
// $db['name'] = "u1487614_kartanu_mojokerto"; //nama database

$koneksi = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new masbambang;

function anti_injection($data){
  global $koneksi;
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

	//save -for-
	function compile_array($hsl_array) {
		for($start=0, $jumField=count($hsl_array); $start<$jumField; $start++) {
			if($start!=0) {
				$nmField = $nmField.",".$hsl_array[$start];
			}else{
				$nmField = $hsl_array[$start];
			}
		}

		return $nmField;
	}

	//update -for-
	function compile_array2($hsl_array,$hsl_array2) {
		for($start=0, $end=count($hsl_array); $start<$end; $start++) {
			if($start!=0) {
				$isiField = $isiField.",".$hsl_array[$start]."=".$hsl_array2[$start];
			}else{
				$isiField = $hsl_array[$start]."=".$hsl_array2[$start];
			}
		}

		return $isiField;
	}

	//insert tabel
	function _ins($tabel,$field,$value,$result) {
		$sql_ins = "insert into ".$tabel." (".$field.") values (".$value.")";
		return $sql_ins;
	}

	//update tabel
	function _upd($tabel,$set,$field,$value,$result) {
		$sql_ins = "update ".$tabel." set ".$set." where ".$field." = ".$value;
		return $sql_ins;
	}

?>
