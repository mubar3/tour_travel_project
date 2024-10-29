<?php
        // $id=$_GET['id'];
        // print_r($id);
        // die();
        include '../assets/config/koneksi.php';
        require_once('fpdf/Code39.php');



        $SQL = "SELECT *,tb_pekerjaan.id as id_pekerjaan FROM user 
                  LEFT JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  LEFT JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  LEFT JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  LEFT JOIN provinsi ON user.id_prov= provinsi.id_prov
                  LEFT JOIN tb_disabilitas ON user.disabilitas= tb_disabilitas.id
                  LEFT JOIN tb_pekerjaan ON user.pekerjaan= tb_pekerjaan.id
                  LEFT JOIN tb_pendapatan ON user.pendapatan= tb_pendapatan.id
                  LEFT JOIN tb_penyakit ON user.penyakit= tb_penyakit.id
                  LEFT JOIN tb_rumah ON user.kepemilikan_rumah= tb_rumah.id
                  -- LEFT JOIN jenjang ON user.jenjang= jenjang.id_jenjang
                  -- LEFT JOIN banom ON user.banom1= banom.idbanom
                  WHERE user.id='$_GET[id]'";
                // echo $SQL;
        $rr=mysqli_fetch_array(mysqli_query($koneksi, $SQL));

        $pdf = new FPDF('L','in',array(91,58));
        // $pdf = new PDF_Code39();
        $pdf->AddPage();
        // $pdf->SetCompression(true);
        $pdf->Image('kartu/mokercanon1(2).png', 0, 0,91, 58);
        $pdf->Image('../assets/img/user/'.$rr['gambar'], 6, 16,18, 21);
        $pdf->SetFont('Times','B',150);
        $pdf->SetXY(27, 17); 
        $pdf->Write(0, $rr['nama']);

        $pdf->SetFont('Times','',150);
        $pdf->SetXY(27, 19.3); 
        $pdf->Write(0, 'N.I.A');
        $pdf->SetXY(50, 19.3); 
        $pdf->Write(0, ':');
        $pdf->SetFont('Times','B',150);
        $pdf->SetXY(52, 19.3); 
        $pdf->Write(0, $rr['nokartanu']);

        $pdf->SetFont('Times','',150);
        $pdf->SetXY(27, 21.3); 
        $pdf->Write(0, 'Tempat, Tanggal Lahir');
        $pdf->SetXY(50, 21.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 21.3); 
        $tgl = date("d - m - Y", strtotime($rr['tgl_lhr']));
        $pdf->Write(0, $rr['tmp_lhr'].', '.$tgl);

        $pdf->SetXY(27, 23.3); 
        $pdf->Write(0, 'Pekerjaan');
        $pdf->SetXY(50, 23.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 23.3); 
        if($rr['id_pekerjaan']==88){
        $pdf->Write(0, $rr['pekerjaan_lain']);
        }else{
        $pdf->Write(0, $rr['pekerjaan']);
        }

        $pdf->SetXY(27, 25.3); 
        $pdf->Write(0, 'Jenis Kelamin');
        $pdf->SetXY(50, 25.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 25.3); 
        $pdf->Write(0, $rr['jk']);

        $pdf->SetXY(27, 27.3); 
        $pdf->Write(0, 'Alamat');
        $pdf->SetXY(50, 27.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 27.3); 
        $pdf->Write(0, $rr['alamat']);

        $pdf->SetXY(28, 29.3); 
        $pdf->Write(0, 'RT/RW');
        $pdf->SetXY(50, 29.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 29.3); 
        $pdf->Write(0, $rr['rt'].'/'.$rr['rw']);

        $pdf->SetXY(28, 31.3); 
        $pdf->Write(0, 'Desa/Kelurahan');
        $pdf->SetXY(50, 31.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 31.3); 
        $pdf->Write(0, $rr['nama_kelurahan']);

        $pdf->SetXY(28, 33.3); 
        $pdf->Write(0, 'Kecamatan');
        $pdf->SetXY(50, 33.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 33.3); 
        $pdf->Write(0, $rr['nama_kecamatan']);

        $pdf->SetXY(28, 35.3); 
        $pdf->Write(0, 'Kabupaten');
        $pdf->SetXY(50, 35.3); 
        $pdf->Write(0, ':');
        $pdf->SetXY(52, 35.3); 
        $pdf->Write(0, $rr['nama_kabupaten']);

        $pdf->SetFont('Times','B',140);
        $pdf->SetXY(8.5, 40); 
        $pdf->Write(0, 'Berlaku Hingga :');

        $pdf->SetFont('Times','B',120);
        $pdf->SetXY(9, 42); 
        $pdf->Write(0, 'SEUMUR HIDUP');

        $pdf->SetXY(31, 40); 
        $pdf->Write(0, 'Pengurus Cabang Nahdlatul Ulama ');

        $pdf->SetXY(35, 42);    
        $pdf->Write(0, 'Kabupaten Mojokerto');

        $pdf->SetFont('Times','',120);
        $pdf->SetXY(29, 44);    
        $pdf->Write(0, 'Rais');
        $pdf->SetXY(55, 44);    
        $pdf->Write(0, 'Ketua');

        $pdf->Image('ttd/td.png', 28, 45, 5, 5);
        $pdf->Image('ttd/st2.png', 40.5, 43, 8, 8);
        $pdf->Image('ttd/dt.png', 54.5, 45, 5, 5);
        
        $pdf->Image('../assets/img/qrcode/'.$rr['qrcode'], 72, 41, 10, 10);

        $pdf->SetFont('Times','B',120);
        $pdf->SetXY(26, 46);
        $pdf->Cell(9.5,7,'KH. Ahmad Jamzuri',0,4,'C');
        $pdf->SetXY(52, 46);
        $pdf->Cell(9.5,7,'KH. Abdul Adzim alwi',0,4,'C');

        $pdf->AddPage();
        $pdf->Image('kartu/belakang2.png', 0, 0,91, 58);
       

        $pdf->Output('my_file.pdf','I'); 
?>