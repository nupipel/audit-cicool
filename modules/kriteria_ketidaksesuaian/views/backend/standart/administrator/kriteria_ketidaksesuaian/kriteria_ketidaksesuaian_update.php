

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
        Kriteria Ketidaksesuaian        <small>Edit Kriteria Ketidaksesuaian</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/kriteria_ketidaksesuaian'); ?>">Kriteria Ketidaksesuaian</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-id_task */
   .group-id_task {

   }

   .group-id_task .control-label {

   }

   .group-id_task .col-sm-8 {

   }

   .group-id_task .form-control {

   }

   .group-id_task .help-block {

   }
   /* end .group-id_task */



   /* .group-id_kriteria */
   .group-id_kriteria {

   }

   .group-id_kriteria .control-label {

   }

   .group-id_kriteria .col-sm-8 {

   }

   .group-id_kriteria .form-control {

   }

   .group-id_kriteria .help-block {

   }
   /* end .group-id_kriteria */



   /* .group-bukti_objektif */
   .group-bukti_objektif {

   }

   .group-bukti_objektif .control-label {

   }

   .group-bukti_objektif .col-sm-8 {

   }

   .group-bukti_objektif .form-control {

   }

   .group-bukti_objektif .help-block {

   }
   /* end .group-bukti_objektif */



   /* .group-target_waktu_selesai */
   .group-target_waktu_selesai {

   }

   .group-target_waktu_selesai .control-label {

   }

   .group-target_waktu_selesai .col-sm-8 {

   }

   .group-target_waktu_selesai .form-control {

   }

   .group-target_waktu_selesai .help-block {

   }
   /* end .group-target_waktu_selesai */



   /* .group-penyebab */
   .group-penyebab {

   }

   .group-penyebab .control-label {

   }

   .group-penyebab .col-sm-8 {

   }

   .group-penyebab .form-control {

   }

   .group-penyebab .help-block {

   }
   /* end .group-penyebab */



   /* .group-tindakan */
   .group-tindakan {

   }

   .group-tindakan .control-label {

   }

   .group-tindakan .col-sm-8 {

   }

   .group-tindakan .form-control {

   }

   .group-tindakan .help-block {

   }
   /* end .group-tindakan */



   /* .group-status */
   .group-status {

   }

   .group-status .control-label {

   }

   .group-status .col-sm-8 {

   }

   .group-status .form-control {

   }

   .group-status .help-block {

   }
   /* end .group-status */



   /* .group-penanggung_jawab */
   .group-penanggung_jawab {

   }

   .group-penanggung_jawab .control-label {

   }

   .group-penanggung_jawab .col-sm-8 {

   }

   .group-penanggung_jawab .form-control {

   }

   .group-penanggung_jawab .help-block {

   }
   /* end .group-penanggung_jawab */



   /* .group-keterangan */
   .group-keterangan {

   }

   .group-keterangan .control-label {

   }

   .group-keterangan .col-sm-8 {

   }

   .group-keterangan .form-control {

   }

   .group-keterangan .help-block {

   }
   /* end .group-keterangan */



   /* .group-auditor */
   .group-auditor {

   }

   .group-auditor .control-label {

   }

   .group-auditor .col-sm-8 {

   }

   .group-auditor .form-control {

   }

   .group-auditor .help-block {

   }
   /* end .group-auditor */




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
                            <h3 class="widget-user-username">Kriteria Ketidaksesuaian</h3>
                            <h5 class="widget-user-desc">Edit Kriteria Ketidaksesuaian</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/kriteria_ketidaksesuaian/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_kriteria_ketidaksesuaian',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_kriteria_ketidaksesuaian',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-id_task  ">
                                <label for="id_task" class="col-sm-2 control-label">Id Task                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_task" id="id_task" placeholder="" value="<?= set_value('id_task', $kriteria_ketidaksesuaian->id_task); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-id_kriteria  ">
                                <label for="id_kriteria" class="col-sm-2 control-label">Id Kriteria                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_kriteria" id="id_kriteria" placeholder="" value="<?= set_value('id_kriteria', $kriteria_ketidaksesuaian->id_kriteria); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-bukti_objektif  ">
                                <label for="bukti_objektif" class="col-sm-2 control-label">Bukti Objektif                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="bukti_objektif" name="bukti_objektif" rows="10" cols="80"> <?= set_value('bukti_objektif', $kriteria_ketidaksesuaian->bukti_objektif); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-target_waktu_selesai  ">
                                <label for="target_waktu_selesai" class="col-sm-2 control-label">Target Waktu Selesai                                    </label>
                                <div class="col-sm-6">
                                    <div class="input-group date col-sm-8">
                                        <input type="text" class="form-control pull-right datepicker" name="target_waktu_selesai" placeholder="" id="target_waktu_selesai" value="<?= set_value('kriteria_ketidaksesuaian_target_waktu_selesai_name', $kriteria_ketidaksesuaian->target_waktu_selesai); ?>">
                                    </div>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-penyebab  ">
                                <label for="penyebab" class="col-sm-2 control-label">Penyebab                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="penyebab" name="penyebab" rows="10" cols="80"> <?= set_value('penyebab', $kriteria_ketidaksesuaian->penyebab); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-tindakan  ">
                                <label for="tindakan" class="col-sm-2 control-label">Tindakan                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="tindakan" name="tindakan" rows="10" cols="80"> <?= set_value('tindakan', $kriteria_ketidaksesuaian->tindakan); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-status  ">
                                <label for="status" class="col-sm-2 control-label">Status                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="status" id="status" placeholder="" value="<?= set_value('status', $kriteria_ketidaksesuaian->status); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-penanggung_jawab  ">
                                <label for="penanggung_jawab" class="col-sm-2 control-label">Penanggung Jawab                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="penanggung_jawab" id="penanggung_jawab" placeholder="" value="<?= set_value('penanggung_jawab', $kriteria_ketidaksesuaian->penanggung_jawab); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-keterangan  ">
                                <label for="keterangan" class="col-sm-2 control-label">Keterangan                                    </label>
                                <div class="col-sm-8">
                                    <textarea id="keterangan" name="keterangan" rows="10" cols="80"> <?= set_value('keterangan', $kriteria_ketidaksesuaian->keterangan); ?></textarea>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                                                
                        
                        <div class="form-group group-id_user  ">
                                <label for="id_user" class="col-sm-2 control-label">Id User                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_user" id="id_user" placeholder="" value="<?= set_value('id_user', $kriteria_ketidaksesuaian->id_user); ?>">
                                    <small class="info help-block">
                                        </small>
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
    var id_task = $('#id_task');
   /* 
    id_task.on('change', function() {});
    */
    var id_kriteria = $('#id_kriteria');
   var bukti_objektif = $('#bukti_objektif');
   var target_waktu_selesai = $('#target_waktu_selesai');
   var penyebab = $('#penyebab');
   var tindakan = $('#tindakan');
   var status = $('#status');
   var penanggung_jawab = $('#penanggung_jawab');
   var keterangan = $('#keterangan');
   var auditor = $('#auditor');
   
})()
      
      
      
      
        
        
    CKEDITOR.replace('bukti_objektif');
    var bukti_objektif = CKEDITOR.instances.bukti_objektif;
        CKEDITOR.replace('penyebab');
    var penyebab = CKEDITOR.instances.penyebab;
        CKEDITOR.replace('tindakan');
    var tindakan = CKEDITOR.instances.tindakan;
        CKEDITOR.replace('keterangan');
    var keterangan = CKEDITOR.instances.keterangan;
        
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
                    window.location.href = BASE_URL + 'administrator/kriteria_ketidaksesuaian';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        $('#bukti_objektif').val(bukti_objektif.getData());
        $('#penyebab').val(penyebab.getData());
        $('#tindakan').val(tindakan.getData());
        $('#keterangan').val(keterangan.getData());
        
    var form_kriteria_ketidaksesuaian = $('#form_kriteria_ketidaksesuaian');
    var data_post = form_kriteria_ketidaksesuaian.serializeArray();
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
            url: form_kriteria_ketidaksesuaian.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#kriteria_ketidaksesuaian_image_galery').find('li').attr('qq-file-id');
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