<style type="text/css">
    @font-face {
      font-family: myFirstFont;
      src: url(fonts/ufonts.com_square721-bt-roman.ttf);
    }
  
    p,
    u,
    td {
      font-family: myFirstFont;
    }
  </style>
  <title>Print Data Surat Permohonan Akta</title>
  
  <body onLoad="window.print()">
  
    <table border=0 width=100%>
      <tr>
          <td align="center" rowspan='3' width='88px'><img src='{{ asset('images/logo/logo.png') }}' width='85px'></td>
      </tr> 
      <tr>
          <td align="center"><h3 style='margin-bottom:-5px' align=center>PEMERINTAH DAERAH KABUPATEN {{ strtoupper($kantor->regency) }} <br> KECAMATAN {{ strtoupper($kantor->sub_district) }} <br> DESA {{ strtoupper($kantor->village) }} </h3></td>
          <td align="center" rowspan='3' width='88px'>&nbsp;</td>
      </tr> 
      <tr>
          <td align="center"><p>{{ $kantor->address }}<br> Kabupaten {{ $kantor->regency }} Kode Pos: {{ $kantor->postal_code }}   </p></td>
      </tr> 
      </table>
    <hr style='border:1px solid #000'>
  <br>
    <table align="left" width="100%">
        <tr>
            <td>Nomor</td>
            <td>: 00{{ $item->id }}/198/Ket/309.07/VIII/<?php echo date("Y") ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>: Permohonan Akta Kelahiran</td>
        </tr>
    </table>
    <span>Kepada Yth <br>
    Kepala Pengadilan Agama <br>
    {{ $kantor->regency }} <br>
    </span>
    
  <br><br>
    <table width='100%'>
      <tr>
        <td>Yang bertanda tangan di bawah ini Kepala Desa {{ $kantor->village }}, Kecamatan {{ $kantor->sub_district }},
          Kabupaten {{ $kantor->regency }}, Provinsi {{ $kantor->province }} menerangkan dengan sebenarnya bahwa :</td>
      </tr>
  
      <table>
        <table width='100%' align="left">
          <tr>
            <td width="5%"></td>
            <td width="30%">Nama</td>
            <td width="65%">: {{ $item->ayah->name }}</td>
          </tr>
         <tr>
          <td></td>
          <td>NIK / No KTP</td>
          <td>: {{ $item->ayah->person_id }}</td>
         </tr>
          <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $item->ayah->place_of_birth . ', '.$item->ayah->date_of_birth }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td>: {{ $item->ayah->job }}</td>
          </tr>
          <tr><td colspan="3">
          <p>Mengajukan permohonan untuk diterbitkan penetapan
             Pengadilan Negeri sebagai persyaratan pencatatan peristiwa kelahiran dan penerbitan kutipan Akta Kelahiran atas nama:</p></td></tr>
             <tr>
                <td width="5%"></td>
                <td width="30%">Nama</td>
                <td width="65%">: {{ $item->user->name }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {{ $item->user->place_of_birth . ', '.$item->user->date_of_birth }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Hari Lahir</td>
                <td>: {{ $item->hari_lahir }}</td>
              </tr>
            <tr>
                <td></td>
                <td>Alamat</td>
                <td>: {{ $item->user->address }}</td>
            </tr>
            <tr>
                <td width="5%"></td>
                <td width="30%">Nama Ayah</td>
                <td width="65%">: {{ $item->ayah->name }}</td>
              </tr>
              <tr>
                <td width="5%"></td>
                <td width="30%">Nama Ibu</td>
                <td width="65%">: {{ $item->ibu->name }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Alamat Orang Tua</td>
                <td>: {{ $item->ayah->address }}</td>
            </tr>
        </table>
        Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.
        <br><br>
        <table width=100%>
          <tr>
            <td width="30%">
            </td>
  
            <td width="30%">
  
            </td>
  
            <td>
  
                <center>
                <tr><td width="10%"></td><td width="25%"></td><td  align="center">{{ $kantor->village }}, <?php echo date("d M Y"); ?></td></tr>
                
              </table>
              <table>
                <tr><td width="20%"><br><br><br><br></td><td width="20%"></td><td width="32%"></td><td  align="right">
                Kepala Desa {{ $kantor->village }}<br><br><br><br>
                  <center>
                <u>{{ $kantor->kades }}</u><br>
  
                NIP.-
              </center>
             </u><br></td></tr>
                
            </table>
  </body>