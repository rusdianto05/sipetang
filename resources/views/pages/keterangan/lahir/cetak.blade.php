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
  @if ($item->kondisi == 'mati')
  <title>Print Data Surat Keterangan Lahir Mati</title>
 @else
  <title>Print Data Surat Keterangan Lahir</title>
  @endif
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
        <td align="center">
          <h3 style='margin-bottom:-5px' align=center>SURAT KETERANGAN LAHIR {{ $item->kondisi == 'mati' ? 'MATI' : '' }}</h3>
        </td>
      </tr>
      <tr>
        <td align="center">
          <p>Nomor : 00{{ $item->id }}/198/Ket/309.07/VIII/<?php echo date("Y") ?></p>
        </td>
      </tr>
    </table>
  <br><br>
    <table width='100%'>
      <tr>
        <td>Yang bertanda tangan di bawah ini Kepala Desa {{ $kantor->village }}, Kecamatan {{ $kantor->sub_district }},
          Kabupaten {{ $kantor->regency }}, Provinsi {{ $kantor->province }} menerangkan dengan sebenarnya bahwa seorang ibu:</td>
      </tr>
  
      <table>
        <table width='100%' align="left">
          <tr>
            <td width="5%"></td>
            <td width="30%">Nama</td>
            <td width="65%">: {{ $item->user->name }}</td>
          </tr>
          <tr>
            <td></td>
            <td>NIK / No KTP</td>
            <td>: {{ $item->user->person_id }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $item->user->place_of_birth . ', '.$item->user->date_of_birth }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Alamat</td>
            <td>: {{ $item->user->address }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Agama</td>
            <td>: {{ $item->user->religion }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td>: {{ $item->user->job }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Kewarganegaraan</td>
            <td>: {{ $item->user->citizenship }}</td>
          </tr>
          <tr>
            <td colspan="3">Telah lahir bayi dalam keadaan {{ $item->kondisi == 'mati' ? 'mati' : 'hidup' }}, setelah dikandungannya selama {{ $item->lama_kandungan }} bulan :</td>
          </tr>
          <tr>
            <td></td>
            <td>Pada Tanggal</td>
            <td>: {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Pukul</td>
            <td>: {{ date('H:i', strtotime($item->tanggal_lahir)) }}</td>
          <tr>
            <td></td>
            <td>Di</td>
            <td>: {{ $item->tempat_lahir }}</td>
          </tr>
          <tr>
            <td colspan="3">Surat keterangan ini dibuat berdasarkan keterangan pelapor:</td>
          </tr>
          <tr>
            <td></td>
            <td>Nama Lengkap</td>
            <td>: {{ $item->pelapor->name }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Hubungan dengan yang lahir {{ $item->kondisi == 'mati' ? 'mati' : 'hidup' }}</td>
            <td>: {{ $item->pelapor_hubungan }}</td>
          </tr>

        </table>
        <br><br>
        Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        <table width=100%>
          <tr>
            <td width="30%">
            </td>
  
            <td width="30%">
  
            </td>
  
            
  
             
                <tr><td width="10%"></td><td width="25%"></td><td  align="center">{{ $kantor->village }}, <?php echo date("d M Y"); ?></td></tr>
                
          </tr>
              </table>
              <table>
                <tr><td width="20%"><br><br><br><br></td><td width="20%"></td><td width="32%"></td><td  align="right">
                Kepala Desa {{ $kantor->village }}<br><br><br><br>
                  <center>
                <u>{{ $kantor->kades }}</u><br>
  
                NIP. {{ $kantor->kades_id }}
              </center>
             </u><br></td></tr>
                
              </table>
  </body>