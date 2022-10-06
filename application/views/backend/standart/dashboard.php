<style>
  .highcharts-figure,
.highcharts-data-table table {
  min-width: 320px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

input[type="number"] {
  min-width: 50px;
}
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<section class="content" style="background-color:">
<div class="row">
    <div class="col-md-12">
        <figure class="highcharts-figure">
  <div id="container"></div>
 
</figure>
    </div>
    <?php for ($x = 1; $x <= 12; $x++) { ?>
    <div class="col-md-4">
        <figure class="highcharts-figure">
  <div id="container<?php echo $x; ?>"></div>
 
</figure>
    </div>
    <?php } ?>
    
    
    
</div>
</section>
<!-- partial -->
  <script>
    Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'PENCAPAIAN IMPLEMENTASI SMK3 BERDASARKAN PERATURAN PEMERINTAH NO 50 TAHUN 2012'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.y}</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
         colors: [
     '#95a5a6', 
     '#f1c40f', 
     '#2980b9', 
     '#2ecc71', 
     '#c0392b', 
    
   ],
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      },
       showInLegend: true
    }
  },
  series: [{
    name: 'Jumlah : ',
    colorByPoint: true,
    data: [
        
         <?php $x=1;foreach($dashboard_semua as $r){  ?>
  {
   
      name: '<?php echo str_replace('_',' ',strtoupper($r['pemenuhan'])); ?>',
      
      y: <?php echo $r['jumlah']; ?>,
     
      <?php if($x==1){ ?>sliced: true,
      selected: true<?php } ?>
    },
    
    
    
    
    <?php $x++;} ?>
   ]
  }]
});
  </script>
  
  
  
  <!-- partial -->
   <?php for ($xy = 1; $xy <= 12; $xy++) { ?>
  <script>
    Highcharts.chart('container<?php echo $xy; ?>', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: '<?php if($xy==1){ echo "1. PEMBANGUNAN DAN PEMELIHARAAN KOMITMEN";} ?><?php if($xy==2){ echo "2. PEMBUATAN DAN PENDOKUMENTASIAN RENCANA K3";} ?><?php if($xy==3){ echo "3. PENGENDALIAN PERANCANGAN DAN PENINJAUAN
KONTRAK";} ?><?php if($xy==4){ echo "4. PENGENDALIAN DOKUMEN";} ?><?php if($xy==5){ echo "5. PEMBELIAN DAN PENGENDALIAN PRODUK";} ?><?php if($xy==6){ echo "6. KEAMANAN BEKERJA BERDASARKAN SMK3";} ?><?php if($xy==7){ echo "7. STANDAR PEMANTAUAN";} ?>
<?php if($xy==8){ echo "8. PELAPORAN DAN PERBAIKAN KEKURANGAN";} ?>
<?php if($xy==9){ echo "9. PENGELOLAAN MATERIAL DAN PERPINDAHANNYA";} ?>
<?php if($xy==10){ echo "10. PENGUMPULAN DAN PENGGUNAAN DATA";} ?>
<?php if($xy==11){ echo "11. PEMERIKSAAN SISTEM MANAJEMEN KESELAMATAN &
KESEHATAN KERJA";} ?>
<?php 
if($xy==12){ echo "12. PENGEMBANGAN KETERAMPILAN DAN KEMAMPUAN";} ?>'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.y}</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
         colors: [
   
    
   ],
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      },
       showInLegend: true
    }
  },
  series: [{
    name: 'Jumlah : ',
    colorByPoint: true,
    data: [
        
         <?php $data = ${'dashboard_kriteria_'.$xy}; $x=1;foreach($data as $r[$xy]){  ?>
  {
      name: '<?php echo str_replace('_',' ',strtoupper($r[$xy]['pemenuhan'])); ?>',
      y: <?php echo $r[$xy]['jumlah']; ?>,
      color:'<?php if($r[$xy]['pemenuhan'] =='mayor'){ echo "#95a5a6";}?><?php if($r[$xy]['pemenuhan'] =='minor'){ echo "#f1c40f";}?><?php if($r[$xy]['pemenuhan'] =='observasi'){ echo "#2980b9";}?><?php if($r[$xy]['pemenuhan'] =='sesuai'){ echo "#2ecc71";}?><?php if($r[$xy]['pemenuhan'] =='tidak_berlaku'){ echo "#c0392b";}?>',
      <?php if($x==1){ ?>sliced: true,
      selected: true<?php } ?>
    },
    <?php $x++;} ?>
   ]
  }]
});
  </script>
 <?php } ?>