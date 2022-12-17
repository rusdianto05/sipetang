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
  <title>Print Data Surat Permohonan Cerai</title>
  
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
            <td>: Permohonan Cerai</td>
        </tr>
    </table>
    <span>Kepada Yth. <br>
    Kepala Pengadilan Agama  <br>
    {{ $kantor->regency }} <br>
    </span>
    
  <br><br>
    <table width='100%'>
      <tr>
        <td>Dengan ini kami kirimkan dengan hormat permohonan cerai dari pasangan suami istri:</td>
      </tr>
      <tr><td></td></tr>
      <tr><td><p>A. SUAMI</p></td></tr>
      
      <table>
        <table width='100%' align="left">
          <tr>
            <td width="5%"></td>
            <td width="30%">Nama</td>
            <td width="65%">: {{ $item->suami->name }}</td>
          </tr>
         <tr>
          <td></td>
          <td>NIK / No KTP</td>
          <td>: {{ $item->suami->person_id }}</td>
         </tr>
          <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $item->suami->place_of_birth . ', '.$item->suami->date_of_birth }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td>: {{ $item->suami->job }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Agama</td>
            <td>: {{ $item->suami->religion }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Alamat</td>
            <td>: {{ $item->suami->address }}</td>
          </tr>
          <tr>
            <td colspan="3">B. ISTRI</td>
          </tr>
          <tr>
            <td width="5%"></td>
            <td width="30%">Nama</td>
            <td width="65%">: {{ $item->istri->name }}</td>
          </tr>
         <tr>
          <td></td>
          <td>NIK / No KTP</td>
          <td>: {{ $item->istri->person_id }}</td>
         </tr>
          <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $item->istri->place_of_birth . ', '.$item->istri->date_of_birth }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td>: {{ $item->istri->job }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Agama</td>
            <td>: {{ $item->istri->religion }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Alamat</td>
            <td>: {{ $item->istri->address }}</td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr><td colspan="3">Adapun sebab-sebab menurut keterangannya sebagai berikut : </td></tr>
          <tr>
            <td></td>
            <td colspan="2">{{ $item->sebab }}</td>
          </tr>
             
        </table>
        Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
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
  
                NIP.{{ $kantor->kades_id }}
              </center>
             </u><br></td></tr>
                
            </table>

      </table>
  </body>