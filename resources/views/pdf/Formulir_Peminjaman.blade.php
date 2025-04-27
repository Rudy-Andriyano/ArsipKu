<!DOCTYPE html>
<html lang="en-US">
	<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8" />
		<title>
		</title>
		<style>
            
			body { line-height:115%; font-family:Calibri; font-size:11pt }
			p { margin:0pt 0pt 10pt }
			table { margin-top:0pt; margin-bottom:10pt }
			.BodyText { margin-bottom:0pt; line-height:normal; font-family:Arial; font-size:12pt }
			.Footer { margin-bottom:0pt; line-height:normal; font-size:11pt }
			.Header { margin-bottom:0pt; line-height:normal; font-size:11pt }
			span.BodyTextChar { font-family:Arial; font-size:12pt }
			span.Hyperlink { text-decoration:underline; color:#0000ff }
@media (max-width: 900px) { 
img { 
   max-width: 100%;
   height: auto;
}

.table-container {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td, th {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}
}	


		</style>
	</head>
	<body>
			<table style="width:484pt; margin-bottom:0pt; padding:0pt; border-collapse:collapse">
				<tr style="height:92.15pt">
					<td style="width:53pt; border-bottom:4.5pt solid #000000; padding:0pt 5.4pt; vertical-align:top">
						<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
							<a id="_Hlk148686471">
								<span style="height:97pt; display:block; position:absolute; z-index:1">
									<img src="{{ $logoSrc }}" alt="Logo Kota" style="max-height: 85px; display: block;">
								</span>
							</a>
							</span><span style="height:0pt; display:block; position:absolute; z-index:0"><map name="awmap1"><area shape="rect" href="mailto:disdukcapil@tanjungpinangkota.go.id" alt="" coords="100,41,363,60" /></map></span><span style="font-family:Arial">&#xa0;</span></a>
						</p>
					</td>
					<td style="width:407.35pt; border-bottom:4.5pt solid #000000; padding:0pt 5.4pt; vertical-align:top">
						<p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:14pt">
							<span style="font-family:Tahoma">PEMERINTAH KOTA TANJUNGPINANG</span>
						</p>
						<p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:16pt">
							<strong><span style="font-family:Tahoma; ">&#xa0;</span></strong><strong><span style="font-family:Tahoma; ">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</span></strong>
						</p>
						<p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
							<span style="font-family:Tahoma; ">Jalan Kijang Lama No. 85 - Tanjungpinang</span>
						</p>
						<p style="margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt">
							<span style="font-family:Tahoma; ">Email: disdukcapil@tanjungpinangkota.go.id,  Kode Pos. 29123</span>
						</p>
					</td>
				</tr>
				<tr style="height:4pt">
					<td colspan="2" style="width:473.2pt; border-top:4.5pt solid #000000; padding:0pt 5.4pt; vertical-align:top">
						<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
							<strong><span style="font-family:Tahoma; ">&#xa0;</span></strong>
						</p>
					</td>
				</tr>
			</table>
			<p style="text-align:center; line-height:150%; font-size:12pt">
				<strong><span style="font-family:'Times New Roman'; ">TANDA BUKTI PEMINJAMAN</span></strong>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Yang bertandatangan di bawah ini :</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Nama </span><span style="width:4.35pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">: {{ $peminjam->pegawai->nama_pegawai}}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">NIP </span><span style="width:13.66pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">: {{ $peminjam->pegawai->nip }}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Unit </span><span style="width:11.67pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">: {{ $peminjam->pegawai->unit_kerja}}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Telepon Nomor </span><span style="width:28.69pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">: {{ $peminjam->pegawai->nomor_hp}}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Telah Meminjam Arsip :</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Kode Nomor </span><span style="width:6.01pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">: {{ $peminjam->arsip_pinjam }}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">Perihal layanan </span><span style="width:30.7pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">: {{ $peminjam->perihal}}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">peminjaman</span><span style="font-family:'Times New Roman'">&#xa0; </span><span style="width:6.69pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">&#xa0;&#xa0; </span><span style="font-family:'Times New Roman'">: {{ $peminjam->pegawai->nama_pegawai}}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Dan akan mengembalikan</span>
			</p>
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Pada Tanggal :</span>
			</p>
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; text-indent:290.6pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Tanjungpinang : {{$peminjam->tanggal_pinjam}}</span>
			</p>
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Petugas yang melayani, </span><span style="width:27.36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">yang meminjam,</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<br /><span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">( ……………………………… ) </span><span style="width:19.01pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">(……………………………… )</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">NIP. </span>
<span style="font-family:'Times New Roman'; display:inline-block; vertical-align:middle; margin-right:10px;">
    {{ $peminjam->kearsipan->nip }} - {{ $peminjam->kearsipan->nama}}
</span>
<span style="font-family:'Times New Roman'; margin-right:36pt;">&#xa0;</span>
<span style="font-family:'Times New Roman'; margin-right:36pt;">&#xa0;</span>
<span style="font-family:'Times New Roman'; margin-right:36pt;">&#xa0;</span>



<span style="font-family:'Times New Roman'">NIP. {{ $peminjam->pegawai->nip }} - {{ $peminjam->pegawai->nama_pegawai}}</span>

			</p>
			
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Mengetahui/Menyetujui :</span>
			</p>
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Kepala Unit Kearsipan,</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">( ………………………………… )</span>
			</p>
			<p style="line-height:115%; font-size:12pt">
				<span style="font-family:BookmanOldStyle">NIP.</span>
			</p>
			<p style="line-height:115%; font-size:12pt">
				<span style="font-family:BookmanOldStyle">&#xa0;</span>
			</p>
			<p style="line-height:115%; font-size:12pt">
				<span style="font-family:BookmanOldStyle">Dikembalikan pada :  {{$peminjam->tanggal_kembali}}</span>
			</p>
			<p style="margin-bottom:0pt; text-indent:290.6pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Tanjungpinang, {{$peminjam->tanggal_kembali}}</span>
			</p>
			@if ($peminjam->status == 'dikembalikan')
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Petugas yang melayani, </span><span style="width:27.36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">yang mengembalikan,</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<br /><span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">(   ……………………………… ) </span><span style="width:19.01pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">&#xa0;&#xa0;&#xa0;&#xa0; </span><span style="font-family:'Times New Roman'">(……………………………… )</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">NIP. {{ $peminjam->kearsipan->nip }} - {{ $peminjam->kearsipan->nama}}</span><span style="width:10.66pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">NIP. {{ $peminjam->pegawai->nip }} - {{ $peminjam->pegawai->nama_pegawai}} </span>
			</p>
			@else
			
			<p style="margin-bottom:0pt; line-height:normal; font-size:12pt">
				<span style="font-family:'Times New Roman'">Petugas yang melayani, </span><span style="width:27.36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">yang mengembalikan,</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<br /><span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">&#xa0;</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">( ……………………………… ) </span><span style="width:19.01pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">&#xa0;&#xa0;&#xa0;&#xa0; </span><span style="font-family:'Times New Roman'">( ……………………………… )</span>
			</p>
			<p style="margin-bottom:0pt; line-height:150%; font-size:12pt">
				<span style="font-family:'Times New Roman'">NIP. </span><span style="width:10.66pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="width:36pt; font-family:'Times New Roman'; display:inline-block">&#xa0;</span><span style="font-family:'Times New Roman'">&#xa0;&#xa0;&#xa0;&#xa0; </span><span style="font-family:'Times New Roman'">NIP.</span>
			</p>
			@endif
					