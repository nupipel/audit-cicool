

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo() {

        // Binding keys
        $('*').bind('keydown', 'Ctrl+s', function assets() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function assets() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function assets() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Audit Tasks        <small>Edit Audit Tasks</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/audit_tasks'); ?>">Audit Tasks</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-nama_perusahaan */
   .group-nama_perusahaan {

   }

   .group-nama_perusahaan .control-label {

   }

   .group-nama_perusahaan .col-sm-8 {

   }

   .group-nama_perusahaan .form-control {

   }

   .group-nama_perusahaan .help-block {

   }
   /* end .group-nama_perusahaan */



   /* .group-kantor_cabang */
   .group-kantor_cabang {

   }

   .group-kantor_cabang .control-label {

   }

   .group-kantor_cabang .col-sm-8 {

   }

   .group-kantor_cabang .form-control {

   }

   .group-kantor_cabang .help-block {

   }
   /* end .group-kantor_cabang */



   /* .group-jenis_industri */
   .group-jenis_industri {

   }

   .group-jenis_industri .control-label {

   }

   .group-jenis_industri .col-sm-8 {

   }

   .group-jenis_industri .form-control {

   }

   .group-jenis_industri .help-block {

   }
   /* end .group-jenis_industri */



   /* .group-lingkup_audit */
   .group-lingkup_audit {

   }

   .group-lingkup_audit .control-label {

   }

   .group-lingkup_audit .col-sm-8 {

   }

   .group-lingkup_audit .form-control {

   }

   .group-lingkup_audit .help-block {

   }
   /* end .group-lingkup_audit */



   /* .group-tanggal */
   .group-tanggal {

   }

   .group-tanggal .control-label {

   }

   .group-tanggal .col-sm-8 {

   }

   .group-tanggal .form-control {

   }

   .group-tanggal .help-block {

   }
   /* end .group-tanggal */



   /* .group-tempat */
   .group-tempat {

   }

   .group-tempat .control-label {

   }

   .group-tempat .col-sm-8 {

   }

   .group-tempat .form-control {

   }

   .group-tempat .help-block {

   }
   /* end .group-tempat */



   /* .group-tujuan */
   .group-tujuan {

   }

   .group-tujuan .control-label {

   }

   .group-tujuan .col-sm-8 {

   }

   .group-tujuan .form-control {

   }

   .group-tujuan .help-block {

   }
   /* end .group-tujuan */



   /* .group-proses_produksi */
   .group-proses_produksi {

   }

   .group-proses_produksi .control-label {

   }

   .group-proses_produksi .col-sm-8 {

   }

   .group-proses_produksi .form-control {

   }

   .group-proses_produksi .help-block {

   }
   /* end .group-proses_produksi */



   /* .group-penerapan_k3 */
   .group-penerapan_k3 {

   }

   .group-penerapan_k3 .control-label {

   }

   .group-penerapan_k3 .col-sm-8 {

   }

   .group-penerapan_k3 .form-control {

   }

   .group-penerapan_k3 .help-block {

   }
   /* end .group-penerapan_k3 */



   /* .group-jadwal */
   .group-jadwal {

   }

   .group-jadwal .control-label {

   }

   .group-jadwal .col-sm-8 {

   }

   .group-jadwal .form-control {

   }

   .group-jadwal .help-block {

   }
   /* end .group-jadwal */



   /* .group-kriteria_audit */
   .group-kriteria_audit {

   }

   .group-kriteria_audit .control-label {

   }

   .group-kriteria_audit .col-sm-8 {

   }

   .group-kriteria_audit .form-control {

   }

   .group-kriteria_audit .help-block {

   }
   /* end .group-kriteria_audit */



   /* .group-ket_kriteria_tdk_berlaku */
   .group-ket_kriteria_tdk_berlaku {

   }

   .group-ket_kriteria_tdk_berlaku .control-label {

   }

   .group-ket_kriteria_tdk_berlaku .col-sm-8 {

   }

   .group-ket_kriteria_tdk_berlaku .form-control {

   }

   .group-ket_kriteria_tdk_berlaku .help-block {

   }
   /* end .group-ket_kriteria_tdk_berlaku */



   /* .group-uraian_tdk_sesuai */
   .group-uraian_tdk_sesuai {

   }

   .group-uraian_tdk_sesuai .control-label {

   }

   .group-uraian_tdk_sesuai .col-sm-8 {

   }

   .group-uraian_tdk_sesuai .form-control {

   }

   .group-uraian_tdk_sesuai .help-block {

   }
   /* end .group-uraian_tdk_sesuai */



   /* .group-uraian_temuan */
   .group-uraian_temuan {

   }

   .group-uraian_temuan .control-label {

   }

   .group-uraian_temuan .col-sm-8 {

   }

   .group-uraian_temuan .form-control {

   }

   .group-uraian_temuan .help-block {

   }
   /* end .group-uraian_temuan */



   /* .group-lead */
   .group-lead {

   }

   .group-lead .control-label {

   }

   .group-lead .col-sm-8 {

   }

   .group-lead .form-control {

   }

   .group-lead .help-block {

   }
   /* end .group-lead */



   /* .group-member1 */
   .group-member1 {

   }

   .group-member1 .control-label {

   }

   .group-member1 .col-sm-8 {

   }

   .group-member1 .form-control {

   }

   .group-member1 .help-block {

   }
   /* end .group-member1 */



   /* .group-member2 */
   .group-member2 {

   }

   .group-member2 .control-label {

   }

   .group-member2 .col-sm-8 {

   }

   .group-member2 .form-control {

   }

   .group-member2 .help-block {

   }
   /* end .group-member2 */




</style>
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
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Audit Tasks</h3>
                            <h5 class="widget-user-desc">Edit Audit Tasks</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/audit_tasks/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_audit_tasks',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_audit_tasks',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-nama_perusahaan  ">
                                <label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="" value="<?= set_value('nama_perusahaan', $audit_tasks->nama_perusahaan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-kantor_cabang  ">
                                <label for="kantor_cabang" class="col-sm-2 control-label">Kantor Cabang                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="kantor_cabang" id="kantor_cabang" placeholder="" value="<?= set_value('kantor_cabang', $audit_tasks->kantor_cabang); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-jenis_industri  ">
                                <label for="jenis_industri" class="col-sm-2 control-label">Jenis Industri                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jenis_industri" id="jenis_industri" placeholder="" value="<?= set_value('jenis_industri', $audit_tasks->jenis_industri); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group  wrapper-options-crud group-lingkup_audit">
                                <label for="lingkup_audit" class="col-sm-2 control-label">Lingkup Audit                                    </label>
                                <div class="col-sm-8">
                                     <?php
                                        $conditions = [
                                            ];
                                     ?>
                                    <?php foreach (db_get_all_data('kriteria_audit', $conditions) as $row): ?>
                                    <div class="col-md-3 padding-left-0">
                                        <label>
                                            <input <?= in_array($row->no_kriteria, explode(',', $audit_tasks->lingkup_audit)) ? 'checked' : ''; ?> type="checkbox" class="flat-red" name="lingkup_audit[]" value="<?= $row->no_kriteria ?>"> <?= $row->kriteria; ?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="row-fluid clear-both">
                                        <small class="info help-block">
                                            <b>Input Lingkup Audit</b> Max Length : 10.</small>
                                    </div>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-tanggal  ">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="tanggal" placeholder="" id="tanggal" value="<?= set_value('audit_tasks_tanggal_name', $audit_tasks->tanggal); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-tempat  ">
                                <label for="tempat" class="col-sm-2 control-label">Tempat                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="" value="<?= set_value('tempat', $audit_tasks->tempat); ?>">
                                    <small class="info help-block">
                                        <b>Input Tempat</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-tujuan  ">
                                <label for="tujuan" class="col-sm-2 control-label">Tujuan                                    </label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Tujuan" id="tujuan" name="tujuan" rows="5" class="textarea form-control"><?= set_value('tujuan', $audit_tasks->tujuan); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-proses_produksi  ">
                                <label for="proses_produksi" class="col-sm-2 control-label">Proses Produksi                                    </label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Proses Produksi" id="proses_produksi" name="proses_produksi" rows="5" class="textarea form-control"><?= set_value('proses_produksi', $audit_tasks->proses_produksi); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-penerapan_k3  ">
                                <label for="penerapan_k3" class="col-sm-2 control-label">Penerapan K3                                    </label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Penerapan K3" id="penerapan_k3" name="penerapan_k3" rows="5" class="textarea form-control"><?= set_value('penerapan_k3', $audit_tasks->penerapan_k3); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-jadwal  ">
                                <label for="jadwal" class="col-sm-2 control-label">Jadwal                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jadwal" id="jadwal" placeholder="" value="<?= set_value('jadwal', $audit_tasks->jadwal); ?>">
                                    <small class="info help-block">
                                        <b>Input Jadwal</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-kriteria_audit  ">
                                <label for="kriteria_audit" class="col-sm-2 control-label">Kriteria Audit                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="kriteria_audit" id="kriteria_audit" placeholder="" value="<?= set_value('kriteria_audit', $audit_tasks->kriteria_audit); ?>">
                                    <small class="info help-block">
                                        <b>Input Kriteria Audit</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-ket_kriteria_tdk_berlaku  ">
                                <label for="ket_kriteria_tdk_berlaku" class="col-sm-2 control-label">Ket Kriteria Tdk Berlaku                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="ket_kriteria_tdk_berlaku" name="ket_kriteria_tdk_berlaku" rows="10" cols="80"> <?= set_value('ket_kriteria_tdk_berlaku', $audit_tasks->ket_kriteria_tdk_berlaku); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-uraian_tdk_sesuai  ">
                                <label for="uraian_tdk_sesuai" class="col-sm-2 control-label">Uraian Tdk Sesuai                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="uraian_tdk_sesuai" id="uraian_tdk_sesuai" placeholder="" value="<?= set_value('uraian_tdk_sesuai', $audit_tasks->uraian_tdk_sesuai); ?>">
                                    <small class="info help-block">
                                        <b>Input Uraian Tdk Sesuai</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-uraian_temuan  ">
                                <label for="uraian_temuan" class="col-sm-2 control-label">Uraian Temuan                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="uraian_temuan" id="uraian_temuan" placeholder="" value="<?= set_value('uraian_temuan', $audit_tasks->uraian_temuan); ?>">
                                    <small class="info help-block">
                                        <b>Input Uraian Temuan</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-lead  ">
                                <label for="lead" class="col-sm-2 control-label">Lead                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="lead" id="lead" placeholder="" value="<?= set_value('lead', $audit_tasks->lead); ?>">
                                    <small class="info help-block">
                                        <b>Input Lead</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-member1  ">
                                <label for="member1" class="col-sm-2 control-label">Member1                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="member1" id="member1" placeholder="" value="<?= set_value('member1', $audit_tasks->member1); ?>">
                                    <small class="info help-block">
                                        <b>Input Member1</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-member2  ">
                                <label for="member2" class="col-sm-2 control-label">Member2                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="member2" id="member2" placeholder="" value="<?= set_value('member2', $audit_tasks->member2); ?>">
                                    <small class="info help-block">
                                        <b>Input Member2</b> Max Length : 10.</small>
                                </div>
                            </div>
                        
                        
                        
                                                    <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                                                        </div>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                <?= form_close(); ?>
                        </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
    <script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function() {
    window.event_submit_and_action = '';
            
    (function(){
    var nama_perusahaan = $('#nama_perusahaan');
   /* 
    nama_perusahaan.on('change', function() {});
    */
    var kantor_cabang = $('#kantor_cabang');
   var jenis_industri = $('#jenis_industri');
   var lingkup_audit = $('#lingkup_audit');
   var tanggal = $('#tanggal');
   var tempat = $('#tempat');
   var tujuan = $('#tujuan');
   var proses_produksi = $('#proses_produksi');
   var penerapan_k3 = $('#penerapan_k3');
   var jadwal = $('#jadwal');
   var kriteria_audit = $('#kriteria_audit');
   var ket_kriteria_tdk_berlaku = $('#ket_kriteria_tdk_berlaku');
   var uraian_tdk_sesuai = $('#uraian_tdk_sesuai');
   var uraian_temuan = $('#uraian_temuan');
   var lead = $('#lead');
   var member1 = $('#member1');
   var member2 = $('#member2');
   
})()
      
      
      
      
        
        
    CKEDITOR.replace('ket_kriteria_tdk_berlaku');
    var ket_kriteria_tdk_berlaku = CKEDITOR.instances.ket_kriteria_tdk_berlaku;
        
    $('#btn_cancel').click(function() {
        swal({
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'administrator/audit_tasks';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#ket_kriteria_tdk_berlaku').val(ket_kriteria_tdk_berlaku.getData());
        
    var form_audit_tasks = $('#form_audit_tasks');
    var data_post = form_audit_tasks.serializeArray();
    var save_type = $(this).attr('data-stype');
    data_post.push({
        name: 'save_type',
        value: save_type
    });

    (function(){
    data_post.push({
        name : '_example',
        value : 'value_of_example',
    })
})()
      
      
    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    $('.loading').show();

    $.ajax({
            url: form_audit_tasks.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#audit_tasks_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

            } else {
                if (res.errors) {
                    parseErrorField(res.errors);
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

        })
        .fail(function() {
            $('.message').printMessage({
                message: 'Error save data',
                type: 'warning'
            });
        })
        .always(function() {
            $('.loading').hide();
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 2000);
        });

    return false;
    }); /*end btn save*/

    

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>