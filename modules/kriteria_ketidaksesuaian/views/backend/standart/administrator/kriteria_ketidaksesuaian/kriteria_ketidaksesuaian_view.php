
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Kriteria Ketidaksesuaian      <small><?= cclang('detail', ['Kriteria Ketidaksesuaian']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/kriteria_ketidaksesuaian'); ?>">Kriteria Ketidaksesuaian</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Kriteria Ketidaksesuaian</h3>
                     <h5 class="widget-user-desc">Detail Kriteria Ketidaksesuaian</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_kriteria_ketidaksesuaian" id="form_kriteria_ketidaksesuaian" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($kriteria_ketidaksesuaian->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Task </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_task"><?= _ent($kriteria_ketidaksesuaian->id_task); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Kriteria </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_kriteria"><?= _ent($kriteria_ketidaksesuaian->id_kriteria); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Bukti Objektif </label>

                        <div class="col-sm-8">
                        <span class="detail_group-bukti_objektif"><?= _ent($kriteria_ketidaksesuaian->bukti_objektif); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Target Waktu Selesai </label>

                        <div class="col-sm-8">
                        <span class="detail_group-target_waktu_selesai"><?= _ent($kriteria_ketidaksesuaian->target_waktu_selesai); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Penyebab </label>

                        <div class="col-sm-8">
                        <span class="detail_group-penyebab"><?= _ent($kriteria_ketidaksesuaian->penyebab); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tindakan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-tindakan"><?= _ent($kriteria_ketidaksesuaian->tindakan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status"><?= _ent($kriteria_ketidaksesuaian->status); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Penanggung Jawab </label>

                        <div class="col-sm-8">
                        <span class="detail_group-penanggung_jawab"><?= _ent($kriteria_ketidaksesuaian->penanggung_jawab); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-keterangan"><?= _ent($kriteria_ketidaksesuaian->keterangan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id User </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_user"><?= _ent($kriteria_ketidaksesuaian->id_user); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('kriteria_ketidaksesuaian_update', function() use ($kriteria_ketidaksesuaian){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit kriteria_ketidaksesuaian (Ctrl+e)" href="<?= site_url('administrator/kriteria_ketidaksesuaian/edit/'.$kriteria_ketidaksesuaian->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Kriteria Ketidaksesuaian']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/kriteria_ketidaksesuaian/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Kriteria Ketidaksesuaian']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->

<script>
$(document).ready(function(){
   (function(){
        var id_task = $('.detail_group-id_task');
        var id_kriteria = $('.detail_group-id_kriteria');
        var bukti_objektif = $('.detail_group-bukti_objektif');
        var target_waktu_selesai = $('.detail_group-target_waktu_selesai');
        var penyebab = $('.detail_group-penyebab');
        var tindakan = $('.detail_group-tindakan');
        var status = $('.detail_group-status');
        var penanggung_jawab = $('.detail_group-penanggung_jawab');
        var keterangan = $('.detail_group-keterangan');
        var auditor = $('.detail_group-auditor');
    })()
      
   });
</script>