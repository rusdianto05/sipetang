<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

                <!-- /.panel-heading -->
                <div class="panel-body">

<body onload="window.print ()">
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

<table width="100%" border="1" cellpadding="8" cellspacing="0">
<tr bgcolor='#f2a91c'> 
<th>No</th> 
<td>Email</td>
<td>NIK</td>
<td>Nama Lengkap</td>
<td>Tgl Lahir</td>
<td>Jenis Kelamin</td>
<td>Alamat</td>
<td>Agama</td>
<td>No. Telpon</td>
<td>Pendidikan</td>
<td>Status</td>
<td>Pekerjaan</td>
</tr>



@foreach ($user as $item)
<tr bgcolor='#FFF'>
    {{-- make no loop iteration --}}
    @php
    $no = $loop->iteration;
    @endphp
    <td align='center'>{{ $no }}</td>
<td align='left'> {{ $item->email }}</td>
<td align='left'> {{ $item->person_id }}</td>
<td align='left'> {{ $item->name }}</td>
<td align='left'> {{ $item->date_of_birth }} </td>
<td align='left'> {{ $item->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}</td>
<td align='left'>{{ $item->address }}</td>
<td align='left'> {{ $item->religion }}</td>
<td align='left'> {{ $item->phone }}</td>
<td align='left'> {{ $item->last_education }}</td>
<td align='left'> {{ $item->married_status }}</td>
<td align='left'> {{ $item->job }}</td>
</tr>
@endforeach

</table>
<br>
<br>
<table width=100%>
<tr>
<td width="30%">
</td>

<td width="30%">

</td>

<td >
</table> 
    <table width=100%>
        <tr>
          <td width="30%">
          </td>
    
          <td width="30%">
    
          </td>
    
          <td>
    
              <center>
              <tr><td width="10%"></td><td width="20%"></td><td  align="center">{{ $kantor->village }}, <?php echo date("d M Y"); ?></td></tr>
              
            </table>
            <table>
              <tr><td width="20%"><br><br><br><br></td><td width="20%"></td><td width="40%"></td><td  align="right">
              Kepala Desa {{ $kantor->village }}<br><br><br><br>
                <center>
              <u>{{ $kantor->kades }}</u><br>
    
              NIP.{{ $kantor->kades_id }}
            </center>
           </u><br></td></tr>
              
          </table>
    
 


</div>
</div>
</div>
</div>