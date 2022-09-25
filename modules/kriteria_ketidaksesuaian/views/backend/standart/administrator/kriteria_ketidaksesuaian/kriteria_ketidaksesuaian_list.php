
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Kriteria_ketidaksesuaian/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?= cclang('kriteria_ketidaksesuaian') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('kriteria_ketidaksesuaian') ?></li>
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
                     <div class="row pull-right">
                        <?php is_allowed('kriteria_ketidaksesuaian_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('kriteria_ketidaksesuaian')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/kriteria_ketidaksesuaian/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('kriteria_ketidaksesuaian')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('kriteria_ketidaksesuaian_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('kriteria_ketidaksesuaian') ?> " href="<?= site_url('administrator/kriteria_ketidaksesuaian/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('kriteria_ketidaksesuaian') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('kriteria_ketidaksesuaian')]); ?>  <i class="label bg-yellow"><?= $kriteria_ketidaksesuaian_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_kriteria_ketidaksesuaian" id="form_kriteria_ketidaksesuaian" action="<?= base_url('administrator/kriteria_ketidaksesuaian/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
                     <div class="col-md-8">
                                                <div class="col-sm-2 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                                                         <option value="delete">Delete</option>
                                                      </select>
                        </div>
                        <div class="col-sm-2 padd-left-0 ">
                           <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                        </div>
                                                <div class="col-sm-3 padd-left-0  " >
                           <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                        </div>
                        <div class="col-sm-3 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                              <option value=""><?= cclang('all'); ?></option>
                               <option <?= $this->input->get('f') == 'id_task' ? 'selected' :''; ?> value="id_task">Id Task</option>
                            <option <?= $this->input->get('f') == 'id_kriteria' ? 'selected' :''; ?> value="id_kriteria">Id Kriteria</option>
                            <option <?= $this->input->get('f') == 'bukti_objektif' ? 'selected' :''; ?> value="bukti_objektif">Bukti Objektif</option>
                            <option <?= $this->input->get('f') == 'target_waktu_selesai' ? 'selected' :''; ?> value="target_waktu_selesai">Target Waktu Selesai</option>
                            <option <?= $this->input->get('f') == 'penyebab' ? 'selected' :''; ?> value="penyebab">Penyebab</option>
                            <option <?= $this->input->get('f') == 'tindakan' ? 'selected' :''; ?> value="tindakan">Tindakan</option>
                            <option <?= $this->input->get('f') == 'status' ? 'selected' :''; ?> value="status">Status</option>
                            <option <?= $this->input->get('f') == 'penanggung_jawab' ? 'selected' :''; ?> value="penanggung_jawab">Penanggung Jawab</option>
                            <option <?= $this->input->get('f') == 'keterangan' ? 'selected' :''; ?> value="keterangan">Keterangan</option>
                            <option <?= $this->input->get('f') == 'auditor' ? 'selected' :''; ?> value="auditor">Auditor</option>
                            <option <?= $this->input->get('f') == 'id_user' ? 'selected' :''; ?> value="id_user">Id User</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/kriteria_ketidaksesuaian');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                           <?= $pagination; ?>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive"> 

                  <br>
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                                                     <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                                                    <th data-field="id_task"data-sort="1" data-primary-key="0"> <?= cclang('id_task') ?></th>
                           <th data-field="id_kriteria"data-sort="1" data-primary-key="0"> <?= cclang('id_kriteria') ?></th>
                           <th data-field="bukti_objektif"data-sort="1" data-primary-key="0"> <?= cclang('bukti_objektif') ?></th>
                           <th data-field="target_waktu_selesai"data-sort="1" data-primary-key="0"> <?= cclang('target_waktu_selesai') ?></th>
                           <th data-field="penyebab"data-sort="1" data-primary-key="0"> <?= cclang('penyebab') ?></th>
                           <th data-field="tindakan"data-sort="1" data-primary-key="0"> <?= cclang('tindakan') ?></th>
                           <th data-field="status"data-sort="1" data-primary-key="0"> <?= cclang('status') ?></th>
                           <th data-field="penanggung_jawab"data-sort="1" data-primary-key="0"> <?= cclang('penanggung_jawab') ?></th>
                           <th data-field="keterangan"data-sort="1" data-primary-key="0"> <?= cclang('keterangan') ?></th>
                           <th data-field="auditor"data-sort="1" data-primary-key="0"> <?= cclang('auditor') ?></th>
                           <th data-field="id_user"data-sort="1" data-primary-key="0"> <?= cclang('id_user') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_kriteria_ketidaksesuaian">
                     <?php foreach($kriteria_ketidaksesuaians as $kriteria_ketidaksesuaian): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $kriteria_ketidaksesuaian->id; ?>">
                           </td>
                                                       
                           <td><span class="list_group-id_task"><?= _ent($kriteria_ketidaksesuaian->id_task); ?></span></td> 
                           <td><span class="list_group-id_kriteria"><?= _ent($kriteria_ketidaksesuaian->id_kriteria); ?></span></td> 
                           <td><span class="list_group-bukti_objektif"><?= _ent($kriteria_ketidaksesuaian->bukti_objektif); ?></span></td> 
                           <td><span class="list_group-target_waktu_selesai"><?= _ent($kriteria_ketidaksesuaian->target_waktu_selesai); ?></span></td> 
                           <td><span class="list_group-penyebab"><?= _ent($kriteria_ketidaksesuaian->penyebab); ?></span></td> 
                           <td><span class="list_group-tindakan"><?= _ent($kriteria_ketidaksesuaian->tindakan); ?></span></td> 
                           <td><span class="list_group-status"><?= _ent($kriteria_ketidaksesuaian->status); ?></span></td> 
                           <td><span class="list_group-penanggung_jawab"><?= _ent($kriteria_ketidaksesuaian->penanggung_jawab); ?></span></td> 
                           <td><span class="list_group-keterangan"><?= _ent($kriteria_ketidaksesuaian->keterangan); ?></span></td> 
                           <td><span class="list_group-auditor"><?= _ent($kriteria_ketidaksesuaian->auditor); ?></span></td> 
                           <td><span class="list_group-id_user"><?= _ent($kriteria_ketidaksesuaian->id_user); ?></span></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('kriteria_ketidaksesuaian_view', function() use ($kriteria_ketidaksesuaian){?>
                                                              <a href="<?= site_url('administrator/kriteria_ketidaksesuaian/view/' . $kriteria_ketidaksesuaian->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('kriteria_ketidaksesuaian_update', function() use ($kriteria_ketidaksesuaian){?>
                              <a href="<?= site_url('administrator/kriteria_ketidaksesuaian/edit/' . $kriteria_ketidaksesuaian->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('kriteria_ketidaksesuaian_delete', function() use ($kriteria_ketidaksesuaian){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/kriteria_ketidaksesuaian/delete/' . $kriteria_ketidaksesuaian->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($kriteria_ketidaksesuaian_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Kriteria Ketidaksesuaian data is not available
                           </td>
                         </tr>
                      <?php endif; ?>

                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
             
            </div>
            </form>            
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->

<script>
  $(document).ready(function(){
   
    (function(){

})()
      
      
      $('.table tbody tr').each(function(){
         var row = $(this);
         (function(){
    var id_task = row.find('.list_group-id_task');
    var id_kriteria = row.find('.list_group-id_kriteria');
    var bukti_objektif = row.find('.list_group-bukti_objektif');
    var target_waktu_selesai = row.find('.list_group-target_waktu_selesai');
    var penyebab = row.find('.list_group-penyebab');
    var tindakan = row.find('.list_group-tindakan');
    var status = row.find('.list_group-status');
    var penanggung_jawab = row.find('.list_group-penanggung_jawab');
    var keterangan = row.find('.list_group-keterangan');
    var auditor = row.find('.list_group-auditor');

})()
      })
      
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_kriteria_ketidaksesuaian').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/kriteria_ketidaksesuaian/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('kriteria_ketidaksesuaian', $('table.dataTable'));
  }); /*end doc ready*/
</script>