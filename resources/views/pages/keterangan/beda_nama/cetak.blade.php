<style type="text/css">
    @font-face {
      font-family: myFirstFont;
      src: url(fonts/ufonts.com_square721-bt-roman.ttf);
    }
  
    p, u, td{
      font-family: myFirstFont;
    }
  </style>
  <title>Print Data Surat Keterangan Beda Nama</title>
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
  
  <table width=100%>
  <tr>
      <td align="center"><h3 style='margin-bottom:-5px' align=center>SURAT KETERANGAN BEDA NAMA </h3></td>
  </tr> 
  <tr>
      <td align="center"><p>Nomor : 00{{ $bedanama->id }}/198/Ket/309.07/VIII/<?php echo date("Y") ?></p></td>
  </tr> 
  </table>
  
  <table width='100%'>
    <br><br>
  <tr>
    <td>Yang bertanda tangan di bawah ini Kepala Desa {{ $kantor->village }}, Kecamatan {{ $kantor->sub_district }},
      Kabupaten {{ $kantor->regency }}, Provinsi {{ $kantor->province }} menerangkan dengan sebenarnya bahwa :</td>
  </tr>
  
  <tr><td>I. Data Kartu keluarga</td></tr>
  <table>
  <table width='100%' align="left">
  <tr>
  <td width="5%"></td>
  <td width="30%">Nama Lengkap</td>
  <td width="65%">: {{ $bedanama->new_name }}</td>
  </tr>
  <td></td>
  <td>Tempat Tanggal Lahir</td>
  <td>: {{ $bedanama->user->place_of_birth .','. $bedanama->user->date_of_birth }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Agama</td>
  <td>: {{ $bedanama->user->religion }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Jenis Kelamin</td>
  <td>: 
    @if($bedanama->user->gender == 'male')
      Laki-laki
    @else
      Perempuan
    @endif
  </td>
  </tr>
  <tr>
  <td></td>
  <td>Pekerjaan</td>
  <td>: {{ $bedanama->user->job }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Alamat</td>
  <td>: {{ $bedanama->user->address }}</td>
  </tr>
  </table>
  <br><br><br><br><br><br><br><br>
  <tr><td>II. Data Kartu Identitas / KTP</td></tr>
  <table>
  <table width='100%' align="left">
  <tr>
  <td width="5%"></td>
  <td width="30%">No. Identitas</td>
  <td width="65%">: {{ $bedanama->user->person_id }}</td>
  </tr>
  <tr>
  <td width="5%"></td>
  <td width="30%">Nama Lengkap</td>
  <td width="65%">: {{ $bedanama->user->name }}</td>
  </tr>
  <td></td>
  <td>Tempat Tanggal Lahir</td>
  <td>: {{ $bedanama->user->place_of_birth .','. $bedanama->user->date_of_birth }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Jenis Kelamin</td>
  <td>:  
    @if($bedanama->user->gender == 'male')
    Laki-laki
  @else
    Perempuan
  @endif
</td>
  </tr>
  <tr>
  <td></td>
  <td>Alamat</td>
  <td>: {{ $bedanama->user->address }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Agama</td>
  <td>: {{ $bedanama->user->religion }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Pekerjaan</td>
  <td>: {{ $bedanama->user->job }}</td>
  </tr>
  <tr>
  <td></td>
  <td>Keterangan</td>
  <td>: {{ $bedanama->perbedaan }}</td>
  </tr>
  </table>
  <br><br><br><br><br><br><br><br><br>
  <p>Adalah benar-benar warga Tanggungharjo dan merupakan orang yang sama namun terdapat perbedaan seperti tersebut di atas. 
  Adapun data yang benar dan dipakai seperti yang tercantum di Kartu Keluarga (KK). </p>
  Demikian surat ini dibuat, untuk dipergunakan sebagaimana mestinya. 
  <br>
  <table width=100%>
    <tr>
      <td width="30%">
      </td>
  
      <td width="30%">
  
      </td>
  
      <td>
  
             
        <tr><td width="10%"></td><td width="25%"></td><td  align="center">{{ $kantor->village }}, <?php echo date("d M Y"); ?></td></tr>
        
      </table>
      <table>
        <tr><td width="20%"><br><br><br><br></td><td width="20%"></td><td width="32%"></td><td align="right">
        Kepala Desa {{ $kantor->village }}<br><br><br><br>
          <center>
        <u>{{ $kantor->kades }}</u><br>

        NIP. {{ $kantor->kades_id }}
      </center>
     </u><br></td></tr>
        
      </table>
    </tr>
  </table> 
  </body>