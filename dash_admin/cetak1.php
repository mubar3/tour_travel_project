<?php

$N = 5; $no=1;
    for($i=0; $i < $N; $i++) {

?>
<div style=" padding-top:55px; padding-left: 15px; margin-right: -100;">

<div style="padding-left: 60px; padding-top: 25px; padding-right: 25px;padding-bottom: 25px; float: left; <?php if($no==6){echo"margin-top:60px;";}else{echo"margin-top:-64px;";}?>width: 572px;height: 365px;margin-bottom: 12px;background-size: 572px 365px;background-image: url('kartu/mokercanon1.png'); background-repeat: no-repeat; background-origin: content-box;">

  <img style="position: absolute;margin-left: 34px;margin-top: 98px; width: 105px; height: 140px;overflow: hidden;" class="img-responsive img" src="kartu/mokercanon1.png">

                <table cellpadding="" cellspacing="" style="margin-top: -7px;padding-top: 110px;padding-left: 160px; font-family: Arial; font-size: 15px;color: black; width: 520px;height: 80px; line-height: 16px; text-align:left;position: absolute ;float: center">
                  <tr style="padding-left: 270px;">
                    <td><b>Nama</b</td>
                    <td><b>:</b></td>
                      <td colspan="3"><b>SDA</b></td>
                  </tr>
                    <tr style="text-transform:capitalize;">
                      <td><b>T.T.L</b></td>
                      <td><b>:</b></td>
                        <td> <b>SDAD</b></td>
                    </tr>
                    <?php  
                    $rt = 'RT.1';
                    $rw = 'RW.2';
                    ?>
                    <tr style="line-height: 17px; text-transform:capitalize;">
                      <td style="vertical-align: text-top;"><b>Alamat</b></td>
                        <td style="vertical-align: text-top;"><b>:</b></td>
                        <td><b>NGAJUK</b></td>
                    </tr>
                    <tr>
                      <td><b>Gudep</b></td>
                      <td><b>:</b></td>
                          <td><b>SDA</b></td>
                    </tr>
                    <tr style="line-height: 15px">
                      <td style="vertical-align: text-top;"><b>Pangkalan</b></td>
                      <td style="vertical-align: text-top;"><b>:</b></td>
                          <td><b>SDA</b></td>
                    </tr>
                    <tr>
                      <td><b>Golongan</b></td>
                      <td><b>:</b></td>
                          <td><b>1</b></td>
                    </tr>
                </table>
                <p style="font-family: 'OCR A Extended' ;font-size: 31px;position: absolute;margin-left: 35px;margin-top: 265px; line-height: 15px; width: ;height:120px;text-align:center;position: center;float: center">
                  <b>
                    <?php
                    // $nia1 = substr($d->nia,0,4);
                    // $nia2 = substr($d->nia,4,4);
                    // $nia3 = substr($d->nia,8,4);
                    // $nia4 = substr($d->nia,12,4);
                    // echo $nia1.' '.$nia2.' '.$nia3.' '.$nia4;


                    ?>
                  </b><br>
                 </p>

                  <img style="position: absolute;margin-left: 440px;margin-top: 250px; width: 70px;height:70px; overflow: hidden;" class="img-responsive img" src="kartu/mokercanon1.png">
            </div>
            <div style="padding: 25px; border-left: 4px dashed black; float: left; margin-left: 3px; <?php if($no==6){echo"margin-top:60px;";}else{echo"margin-top:-64px;";}?>width: 572px;height: 365px;margin-bottom: 12px;background-size: 572px 365px;background-image: url('kartu/mokercanon1.png'); background-repeat: no-repeat; background-origin: content-box;">
           </div>
</div>

<?php $no++;} ?>