<style>
   .list_group-status {
      background-color: #2ecc71;
      padding: 8px;
   }
</style>

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
   //This page is a result of an autogenerated content made by running test.html with firefox.
   function domo() {

      // Binding keys
      $('*').bind('keydown', 'Ctrl+a', function assets() {
         window.location.href = BASE_URL + '/administrator/Audit_tasks/add';
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
      <?= cclang('audit_tasks') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('audit_tasks') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('audit_tasks_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('audit_tasks')]); ?>  (Ctrl+a)" href="<?= site_url('administrator/audit_tasks/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('audit_tasks')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('audit_tasks_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('audit_tasks') ?> " href="<?= site_url('administrator/audit_tasks/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('audit_tasks') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('audit_tasks')]); ?> <i class="label bg-yellow"><?= $audit_tasks_counts; ?> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_audit_tasks" id="form_audit_tasks" action="<?= base_url('administrator/audit_tasks/index'); ?>">



                     <!-- /.widget-user -->
                     <div class="row">
                        <div class="col-md-8">
                           <div class="col-sm-2 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
                                 <option value="delete">Delete</option>
                              </select>
                           </div>
                           <div class="col-sm-2 padd-left-0 ">
                              <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                           </div>
                           <div class="col-sm-3 padd-left-0  ">
                              <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                           </div>
                           <div class="col-sm-3 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="f" id="field">
                                 <option value=""><?= cclang('all'); ?></option>
                                 <option <?= $this->input->get('f') == 'nama_perusahaan' ? 'selected' : ''; ?> value="nama_perusahaan">Nama Perusahaan</option>
                                 <option <?= $this->input->get('f') == 'kantor_cabang' ? 'selected' : ''; ?> value="kantor_cabang">Kantor Cabang</option>
                                 <option <?= $this->input->get('f') == 'jenis_industri' ? 'selected' : ''; ?> value="jenis_industri">Jenis Industri</option>
                                 <option <?= $this->input->get('f') == 'tanggal' ? 'selected' : ''; ?> value="tanggal">Tanggal</option>
                                 <option <?= $this->input->get('f') == 'tempat' ? 'selected' : ''; ?> value="tempat">Tempat</option>
                                 <option <?= $this->input->get('f') == 'tujuan' ? 'selected' : ''; ?> value="tujuan">Tujuan</option>
                                 <option <?= $this->input->get('f') == 'proses_produksi' ? 'selected' : ''; ?> value="proses_produksi">Proses Produksi</option>
                                 <option <?= $this->input->get('f') == 'penerapan_k3' ? 'selected' : ''; ?> value="penerapan_k3">Penerapan K3</option>
                                 <option <?= $this->input->get('f') == 'jadwal' ? 'selected' : ''; ?> value="jadwal">Jadwal</option>
                                 <option <?= $this->input->get('f') == 'lead' ? 'selected' : ''; ?> value="lead">Lead</option>
                                 <option <?= $this->input->get('f') == 'member1' ? 'selected' : ''; ?> value="member1">Member1</option>
                                 <option <?= $this->input->get('f') == 'member2' ? 'selected' : ''; ?> value="member2">Member2</option>
                              </select>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                 Filter
                              </button>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/audit_tasks'); ?>" title="<?= cclang('reset_filter'); ?>">
                                 <i class="fa fa-undo"></i>
                              </a>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                              <?= $pagination; ?>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive">

                        <br>
                        <table class="table table-bordered dataTable">
                           <thead>
                              <tr class="">
                                 <th>
                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                 </th>
                                 <th data-field="nama_perusahaan" data-sort="1" data-primary-key="0"> <?= cclang('nama_perusahaan') ?></th>
                                 <th data-field="kantor_cabang" data-sort="1" data-primary-key="0"> <?= cclang('kantor_cabang') ?></th>
                                 <th data-field="jenis_industri" data-sort="1" data-primary-key="0"> <?= cclang('jenis_industri') ?></th>
                                 <th data-field="tanggal" data-sort="1" data-primary-key="0"> <?= cclang('tanggal') ?></th>
                                 <th data-field="tempat" data-sort="1" data-primary-key="0"> <?= cclang('tempat') ?></th>
                                 <th data-field="tujuan" data-sort="1" data-primary-key="0"> <?= cclang('tujuan') ?></th>
                                 <th data-field="proses_produksi" data-sort="1" data-primary-key="0"> <?= cclang('proses_produksi') ?></th>
                                 <th data-field="penerapan_k3" data-sort="1" data-primary-key="0"> <?= cclang('penerapan_k3') ?></th>
                                 <th data-field="jadwal" data-sort="1" data-primary-key="0"> <?= cclang('jadwal') ?></th>
                                 <th data-field="lead" data-sort="1" data-primary-key="0"> <?= cclang('lead') ?></th>
                                 <th data-field="member1" data-sort="1" data-primary-key="0"> <?= cclang('member1') ?></th>
                                 <th data-field="member2" data-sort="1" data-primary-key="0"> <?= cclang('member2') ?></th>
                                 <th data-field="status" data-sort="1" data-primary-key="0"> <?= cclang('status') ?></th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_audit_tasks">
                              <?php foreach ($audit_taskss as $audit_tasks) : ?>
                                 <tr>
                                    <td width="5">
                                       <input type="checkbox" class="flat-red check" name="id[]" value="<?= $audit_tasks->id; ?>">
                                    </td>

                                    <td><span class="list_group-nama_perusahaan"><?= _ent($audit_tasks->nama_perusahaan); ?></span></td>
                                    <td><span class="list_group-kantor_cabang"><?= _ent($audit_tasks->kantor_cabang); ?></span></td>
                                    <td><span class="list_group-jenis_industri"><?= _ent($audit_tasks->jenis_industri); ?></span></td>
                                    <td><span class="list_group-tanggal"><?= _ent($audit_tasks->tanggal); ?></span></td>
                                    <td><span class="list_group-tempat"><?= _ent($audit_tasks->tempat); ?></span></td>
                                    <td><span class="list_group-tujuan"><?= _ent($audit_tasks->tujuan); ?></span></td>
                                    <td><span class="list_group-proses_produksi"><?= _ent($audit_tasks->proses_produksi); ?></span></td>
                                    <td><span class="list_group-penerapan_k3"><?= _ent($audit_tasks->penerapan_k3); ?></span></td>
                                    <td>
                                       <table class="table table-sm">
                                          <thead class="bg-info">
                                             <th>Kegiatan</th>
                                             <th>Waktu</th>
                                             <th>Keterangan</th>
                                             <th>Penghubung</th>
                                          </thead>
                                          <tbody>
                                             <?php foreach (db_get_all_data('jadwal', ['id_task' => $audit_tasks->id]) as $key => $jadwal) : ?>
                                                <tr>
                                                   <th><?= $jadwal->kegiatan; ?></th>
                                                   <td><?= $jadwal->waktu; ?></td>
                                                   <td><?= $jadwal->keterangan; ?></td>
                                                   <td><?= $jadwal->penghubung; ?></td>
                                                </tr>
                                             <?php endforeach; ?>
                                          </tbody>
                                       </table>


                                    </td>
                                    <td><span class="list_group-lead"><?= _ent(get_user($audit_tasks->lead)->full_name); ?></span></td>
                                    <td><span class="list_group-member1"><?= _ent(get_user($audit_tasks->member1)->full_name); ?></span></td>
                                    <td><span class="list_group-member2"><?= _ent(get_user($audit_tasks->member2)->full_name); ?></span></td>
                                    <td>
                                       <?php if ($audit_tasks->status == "review") { ?>
                                          <p class="help-block">(Audit telah dilakukan)</p>
                                       <?php } else if ($audit_tasks->status == 'perbaikan') { ?>
                                          <p class="help-block">(Batas waktu perbaikan : <?= $audit_tasks->batas_waktu_perbaikan; ?>)</p>
                                       <?php } else if ($audit_tasks->status == "review_perbaikan") { ?>
                                          <p class="help-block">(Tindakan perbaikan telah dilakukan)</p>
                                       <?php } else { ?>
                                          <span class="text-danger">Belum di audit</span>
                                       <?php } ?>
                                    </td>
                                    <td>
                                       <?php if ($audit_tasks->status == "0") { ?>
                                          <a href="<?= site_url('administrator/audit_tasks/audit_pemenuhan/' . $audit_tasks->id); ?>" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Audit</a>
                                       <?php } else if ($audit_tasks->status == "review") { ?>
                                          <a href="<?= site_url('administrator/audit_tasks/review_audit/' . $audit_tasks->id); ?>" class="btn btn-sm btn-info"><i class="fa fa-check-square-o"></i> Review</a>
                                       <?php } else if ($audit_tasks->status == "perbaikan") { ?>
                                          <a href="<?= site_url('administrator/audit_tasks/audit_perbaikan/' . $audit_tasks->id); ?>" class="btn btn-sm btn-warning"><i class="fa fa-check-square-o"></i> Perbaikan</a>
                                       <?php } else if ($audit_tasks->status == "review_perbaikan") { ?>
                                          <a href="<?= site_url('administrator/audit_tasks/audit_review_perbaikan/' . $audit_tasks->id); ?>" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Review Perbaikan</a>
                                       <?php } else if ($audit_tasks->status == "done") { ?>
                                          <a href="<?= site_url('administrator/audit_tasks/audit_hasil/' . $audit_tasks->id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-check-square-o"></i> Cek Hasil Audit</a>
                                       <?php } ?>
                                       <br>

                                       <?php is_allowed('audit_tasks_update', function () use ($audit_tasks) { ?>
                                          <a href="<?= site_url('administrator/audit_tasks/edit/' . $audit_tasks->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a> <br>
                                       <?php }) ?>
                                       <?php is_allowed('audit_tasks_delete', function () use ($audit_tasks) { ?>
                                          <a href="javascript:void(0);" data-href="<?= site_url('administrator/audit_tasks/delete/' . $audit_tasks->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                       <?php }) ?>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                              <?php if ($audit_tasks_counts == 0) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Audit Tasks data is not available
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
   $(document).ready(function() {

      (function() {

      })()


      $('.table tbody tr').each(function() {
         var row = $(this);
         (function() {
            var nama_perusahaan = row.find('.list_group-nama_perusahaan');
            var kantor_cabang = row.find('.list_group-kantor_cabang');
            var jenis_industri = row.find('.list_group-jenis_industri');
            var tanggal = row.find('.list_group-tanggal');
            var tempat = row.find('.list_group-tempat');
            var tujuan = row.find('.list_group-tujuan');
            var proses_produksi = row.find('.list_group-proses_produksi');
            var penerapan_k3 = row.find('.list_group-penerapan_k3');
            var jadwal = row.find('.list_group-jadwal');
            var lead = row.find('.list_group-lead');
            var member1 = row.find('.list_group-member1');
            var member2 = row.find('.list_group-member2');

         })()
      })

      $('.remove-data').click(function() {

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
            function(isConfirm) {
               if (isConfirm) {
                  document.location.href = url;
               }
            });

         return false;
      });


      $('#apply').click(function() {

         var bulk = $('#bulk');
         var serialize_bulk = $('#form_audit_tasks').serialize();

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
               function(isConfirm) {
                  if (isConfirm) {
                     document.location.href = BASE_URL + '/administrator/audit_tasks/delete?' + serialize_bulk;
                  }
               });

            return false;

         } else if (bulk.val() == '') {
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

      }); /*end appliy click*/


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

      checkboxes.on('ifChanged', function(event) {
         if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
         } else {
            checkAll.removeProp('checked');
         }
         checkAll.iCheck('update');
      });
      initSortable('audit_tasks', $('table.dataTable'));
   }); /*end doc ready*/
</script>