<h3>Dashboard</h3>
<br/>
<?php 
	$sql=" select * from barang where stok <= 3";
	$row = $config -> prepare($sql);
	$row -> execute();
	$r = $row -> rowCount();
	if($r > 0){
?>
<?php
		echo "
		<div class='alert alert-warning'>
			<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
			<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
		</div>
		";	
	}
?>
<?php $hasil_barang = $lihat -> barang_row();?>
<?php $hasil_kategori = $lihat -> kategori_row();?>
<?php $stok = $lihat -> barang_stok_row();?>
<?php $jual = $lihat -> jual_row();?>
<div class="row">
    <!--STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header text-white" style="background: rgb(249,245,245);
background: linear-gradient(0deg, rgba(249,245,245,1) 12%, rgba(32,250,39,1) 100%);">
                <h6 class="pt-2"><i class="fas fa-cubes"></i> Nama Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_barang);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Tabel
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header text-white" style="background: rgb(249,245,245);
background: linear-gradient(0deg, rgba(249,245,245,1) 12%, rgba(32,250,39,1) 100%);">
                <h6 class="pt-2"><i class="fas fa-chart-bar"></i> Stok Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($stok['jml']);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=barang'>Tabel
                    Barang <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header text-white" style="background: rgb(249,245,245);
background: linear-gradient(0deg, rgba(249,245,245,1) 12%, rgba(32,250,39,1) 100%);">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Telah Terjual</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($jual['stok']);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=laporan'>Tabel
                    laporan <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header text-white" style="background: rgb(249,245,245);
background: linear-gradient(0deg, rgba(249,245,245,1) 12%, rgba(32,250,39,1) 100%);">
                <h6 class="pt-2"><i class="fa fa-bookmark"></i> Kategori Barang</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1><?php echo number_format($hasil_kategori);?></h1>
                </center>
            </div>
            <div class="card-footer">
                <a href='index.php?page=kategori'>Tabel
                    Kategori <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div id="container" style="min-width: 310px; height: 400px; max-width:90%; margin: 0 auto"></div>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Stock penjualan'
    },
    subtitle: {
        text: 'Kasir'
    },
    xAxis: { 
    //INI ADALAH UNTUK KOLOM KETERANGAN
        categories: [ 
            'stok barang',
            'Harga barang',
            'jumlah barang',
            'Harga naik barang',
            'Harga turun barang',
            'Jumlah barang turun',
            'penaikan barang',
            'stok barang perbulan',
            'stok barang perminggu',
            'jumlah transaksi',
            'jumlah turun transaksi',
            'Perbelanjaan',
            'stok barang pertahun',
        ],
         title: {
            text: 'Keranjang penjulan dan kasir'
        },
        crosshair: true
    },
    yAxis: {
         
        title: {
            text: ''
        }
    },
     
    tooltip: {
        headerFormat: '<span style="font-size:8pt">{point.key}</span><table style="font-size:8pt">',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Jml.: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.,
            borderWidth: 0
        }
    },
    series: [{
         colorByPoint: true,
       showInLegend: false,
        
        data: [515,660,687,755,558,408,366,331,522,659,475,597,397] //INI ADALAH UNTUK JUMLAH
 
    },
    ]
});
</script>
</body>
</html>