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
  <title>Print Data Surat Keterangan Nikah</title>
  
  <body onLoad="window.print()">
  
    <table width=100%>
        <tr align="right">
            <td ><p style = "font-size:8px">Lampiran V<br>
                Kepdirjen Bimas Islam Nomor 473 Tahun 2020 <br>
                Tentang <br>
                Petunjuk Teknis Pelaksanaan Pencatatan Nikah <br></p>
                <b>Model  N1</b>
                </td>
        </tr>
    </table>
    <table width=100%>
        <tr align="left">
            <td width=45%>KANTOR DESA/KELURAHAN</td>
            <td>: {{ strtoupper($kantor->village) }}</td>
        </tr>
        <tr>
            <td width=45%>KECAMATAN</td>         
            
            <td>: {{ strtoupper($kantor->sub_district) }}</td>
            </tr>
            <tr>
                <td width=45%>KABUPATEN/KOTA </td>
                <td>: {{ strtoupper($kantor->regency) }}</td>
        </tr>
    </table>
      </table>
    {{-- <hr style='border:1px solid #000'> --}}
  
    <table width=100%>
      <tr>
        <td align="center">
          <h3 style='margin-bottom:-5px' align=center>PENGANTAR NIKAH </h3>
        </td>
      </tr>
      <tr>
        <td align="center">
          <p>Nomor : 00{{ $item->id }}/198/Ket/309.07/VIII/<?php echo date("Y") ?></p>
        </td>
      </tr>
    </table>
  <br>
    <table width='100%'>
      <tr>
        <td>Yang bertandatangan di bawah ini menjelaskan dengan sesungguhnya bahwa  :</td>
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
            <td>Nomor KTP (NIK)</td>
            <td>: {{ $item->user->person_id }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Jenis Kelamin</td>
            <td>: 
              @if($item->user->gender == 'male')
                Laki-laki
              @else
                Perempuan
              @endif
            </td>
          </tr>
          <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $item->user->place_of_birth . ', '.$item->user->date_of_birth }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Kewarganegaraan</td>
            <td>: {{ $item->user->citizenship }}</td>
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
            <td>Pendidikan</td>
            <td>: {{ $item->user->last_education }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Bin/Binti</td>
            <td>: {{ $item->ayah->name }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Status Perkawinan</td>
            <td>: {{ $item->user->married_status }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Nama isteri / suami terdahulu</td>
            <td>: {{ $item->pasangan_dulu->name }}</td>
          </tr>
            <tr>
                <td colspan="3">Adalah benar-benar anak dari perkawinan seorang pria :</td>
            </tr>
            <tr>
                <td width="5%"></td>
                <td width="30%">Nama</td>
                <td width="65%">: {{ $item->ayah->name }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Nomor KTP (NIK)</td>
                <td>: {{ $item->ayah->person_id }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Jenis Kelamin</td>
                <td>: 
                  @if($item->ayah->gender == 'male')
                    Laki-laki
                  @else
                    Perempuan
                  @endif
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {{ $item->ayah->place_of_birth . ', '.$item->ayah->date_of_birth }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Kewarganegaraan</td>
                <td>: {{ $item->ayah->citizenship }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Agama</td>
                <td>: {{ $item->ayah->religion }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Pekerjaan</td>
                <td>: {{ $item->ayah->job }}</td>
              </tr>
          <tr>
            <td></td>
            <td>Alamat</td>
            <td>: {{ $item->ayah->address }}</td>
          </tr>
          <tr>
            <td colspan="3">dengan seorang wanita :</td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="30%">Nama</td>
            <td width="65%">: {{ $item->ibu->name }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Nomor KTP (NIK)</td>
            <td>: {{ $item->ibu->person_id }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Jenis Kelamin</td>
            <td>: 
              @if($item->ibu->gender == 'male')
                Laki-laki
              @else
                Perempuan
              @endif
            </td>
          </tr>
          <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $item->ibu->place_of_birth . ', '.$item->ibu->date_of_birth }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Kewarganegaraan</td>
            <td>: {{ $item->ibu->citizenship }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Agama</td>
            <td>: {{ $item->ibu->religion }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td>: {{ $item->ibu->job }}</td>
          </tr>
      <tr>
        <td></td>
        <td>Alamat</td>
        <td>: {{ $item->ibu->address }}</td>
      </tr>
        </table>
       
        <p>Demikian surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.
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





              <table width=100%>
                <tr align="right">
                    <td ><p style = "font-size:8px">Lampiran VI<br>
                        Kepdirjen Bimas Islam Nomor 473 Tahun 2020 <br>
                        Tentang <br>
                        Petunjuk Teknis Pelaksanaan Pencatatan Nikah <br></p>
                        <b>Model  N2</b>
                        </td>
                </tr>
            </table>
            <table width=100%>
                <tr align="left">
                    <td width=20%>Perihal</td>
                    <td>: Permohonan Kehendak Nikah</td>
                </tr>
            </table>
            <p>
            Kepada Yth. <br>
                        Kepala KUA Kecamatan/PPN LN <br>
                        di {{ strtoupper($kantor->sub_district) }} <br>
            </p>
            <br>
            <table width='100%'>
              <tr>
                <td colspan="3">Dengan hormat, kami mengajukan permohonan kehendak nikah untuk atas nama:</td>
              </tr>
              <tr>
                <td></td>
                <td width=20%>Calon Suami</td>
                <td>: {{ $item->user->name }}</td>
              </tr>
              <tr>
                <td></td>
                <td width=20%>Calon Istri</td>
                <td>: {{ $item->pasangan->name }}</td>
              </tr>
              <tr>
                <td></td>
                <td width=20%>Tanggal dan Jam</td>
                <td>: {{ $item->time }}</td>
              </tr>
              <tr>
                <td></td>
                <td width=20%>Tempat akad nikah</td>
                <td>: {{ $item->place }}</td>
              </tr>
              <tr>
                <td></td>
                <td width=20%>Mas Kawin</td>
                <td>: {{ $item->mas_kawin }}</td>
              </tr>
              <tr>
                <td colspan="3">Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut :</td>
              </tr>
            </table>
                     <p>1.	Surat Pengantar Nikah dari Desa / Kelurahan <br>
                        2.	Persetujuan Calon Mempelai <br>
                        3.	Fotokopi KTP Elektronik /Suket <br>
                        4.	Fotokopi Akta Kelahiran <br>
                        5.	Fotokopi Kartu Keluarga (KK) <br>
                        6.	Fotokopi Ijazah Terakhir <br>
                        7.	Paspoto ukuran 2x3 dan 4x6 sebanyak 4 lembar berlatar belakang warna biru <br>
                        8.	Fotokopi KTP Elektronik Ayah dan Ibu calon pengantin <br>
                        9.	Surat izin orangtua (N5) bila umur kurang 21 Tahun *) <br>
                        10.	Surat Keterangan Kematian Suami/Istri (N6) bila Duda/Janda Mati *)	 <br>
                        11.	Akta Cerai bila Duda/Janda Hidup *)<br>
                        12.	…………………………………………<br>
                        13.	…………………………………………<br>
                        14.	…………………………………………<br>
                        </p>
               
                <p>Demikian surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.
                <br>
                <table width=100%>
                  <tr>
                    <td width="30%">
                    </td>
          
                    <td width="30%">
          
                    </td>
          
                    <td>
          
                     
                        <tr><td width="10%"></td><td width="25%"></td><td  align="center">Diterima tanggal .....</td></tr>
                        
                      </table>
                      <table>
                        <tr><td width="20%">Pemohon<br><br><br><br>{{ $item->user->name }}</td><td width="20%"></td><td width="37%"></td><td align="right">
                            Kepala KUA/PPN LN,<br><br><br><br>
                          <center>
                        <u>........................</u><br>
          
                      </center>
                     </u><br></td></tr>
                      </table>

                      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                      <body onLoad="window.print()">
  
                        <table width=100%>
                            <tr align="right">
                                <td ><p style = "font-size:8px">Lampiran VIII<br>
                                    Kepdirjen Bimas Islam Nomor 473 Tahun 2020 <br>
                                    Tentang <br>
                                    Petunjuk Teknis Pelaksanaan Pencatatan Nikah <br></p>
                                    <b>Model  N4</b>
                                    </td>
                            </tr>
                        </table>
                        {{-- <hr style='border:1px solid #000'> --}}
                      
                        <table width=100%>
                          <tr>
                            <td align="center">
                              <h3 style='margin-bottom:-5px' align=center>PERSETUJUAN CALON PENGANTIN</h3>
                            </td>
                          </tr>
                         
                        </table>
                      <br>
                        <table width='100%'>
                          <tr>
                            <td>Yang bertanda tangan di bawah ini :</td>
                          </tr>
                      
                          <table>
                            <table width='100%' align="left">
                                <tr>
                                    <td colspan="3">Calon Suami :</td>
                                </tr>
                              <tr>
                                <td width="5%"></td>
                                <td width="30%">Nama</td>
                                <td width="65%">: {{ $item->user->name }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>Bin</td>
                                <td>: {{ $item->ayah->name }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>Nomor KTP (NIK)</td>
                                <td>: {{ $item->user->person_id }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>: {{ $item->user->place_of_birth . ', '.$item->user->date_of_birth }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>Kewarganegaraan</td>
                                <td>: {{ $item->user->citizenship }}</td>
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
                                <td>Alamat</td>
                                <td>: {{ $item->user->address }}</td>
                             </tr>
                                <tr>
                                    <td colspan="3">Calon Istri:</td>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="30%">Nama</td>
                                    <td width="65%">: {{ $item->pasangan->name }}</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>Bin</td>
                                    <td>: {{ $item->ayah_pasangan->name }}</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>Nomor KTP (NIK)</td>
                                    <td>: {{ $item->pasangan->person_id }}</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>: {{ $item->pasangan->place_of_birth . ', '.$item->pasangan->date_of_birth }}</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>Kewarganegaraan</td>
                                    <td>: {{ $item->pasangan->citizenship }}</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>Agama</td>
                                    <td>: {{ $item->pasangan->religion }}</td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td>Pekerjaan</td>
                                    <td>: {{ $item->pasangan->job }}</td>
                                  </tr>
                                 <tr>
                                    <td></td>
                                    <td>Alamat</td>
                                    <td>: {{ $item->pasangan->address }}</td>
                                 </tr>
                                
                            </table>
                           <p>Menyatakan dengan sesungguhnya bahwa atas dasar sukarela, dengan kesadaran sendiri, tanpa ada paksaan dari siapapun juga, setuju untuk melangsungkan pernikahan.</p>
                            <p>Demikian surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.
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
                                  <table width=100%>
                                   
                                 <tr>
                                    <td width=20%>Calon Suami</td>
                                    <td width=60%></td>
                                    <td width=20%>Calon Istri</td>
                                 </tr>
                                 <tr>
                                    <td width=20%><br><br><br>{{ $item->user->name }}</td>
                                    <td width=60%></td>
                                    <td width=20%><br><br><br>{{ $item->pasangan->name }}</td>
                                 </tr>
                                  </table>
                    
  </body>