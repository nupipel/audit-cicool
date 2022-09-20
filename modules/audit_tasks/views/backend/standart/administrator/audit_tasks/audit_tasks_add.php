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
<style>
    .custom-column {
        columns: 1 !important;
    }

    /* .group-nama_perusahaan */
    .group-nama_perusahaan {}

    .group-nama_perusahaan .control-label {}

    .group-nama_perusahaan .col-sm-8 {}

    .group-nama_perusahaan .form-control {}

    .group-nama_perusahaan .help-block {}

    /* end .group-nama_perusahaan */



    /* .group-kantor_cabang */
    .group-kantor_cabang {}

    .group-kantor_cabang .control-label {}

    .group-kantor_cabang .col-sm-8 {}

    .group-kantor_cabang .form-control {}

    .group-kantor_cabang .help-block {}

    /* end .group-kantor_cabang */



    /* .group-jenis_industri */
    .group-jenis_industri {}

    .group-jenis_industri .control-label {}

    .group-jenis_industri .col-sm-8 {}

    .group-jenis_industri .form-control {}

    .group-jenis_industri .help-block {}

    /* end .group-jenis_industri */



    /* .group-lingkup_audit */
    .group-lingkup_audit {}

    .group-lingkup_audit .control-label {}

    .group-lingkup_audit .col-sm-8 {}

    .group-lingkup_audit .form-control {}

    .group-lingkup_audit .help-block {}

    /* end .group-lingkup_audit */



    /* .group-tanggal */
    .group-tanggal {}

    .group-tanggal .control-label {}

    .group-tanggal .col-sm-8 {}

    .group-tanggal .form-control {}

    .group-tanggal .help-block {}

    /* end .group-tanggal */



    /* .group-tempat */
    .group-tempat {}

    .group-tempat .control-label {}

    .group-tempat .col-sm-8 {}

    .group-tempat .form-control {}

    .group-tempat .help-block {}

    /* end .group-tempat */



    /* .group-tujuan */
    .group-tujuan {}

    .group-tujuan .control-label {}

    .group-tujuan .col-sm-8 {}

    .group-tujuan .form-control {}

    .group-tujuan .help-block {}

    /* end .group-tujuan */



    /* .group-proses_produksi */
    .group-proses_produksi {}

    .group-proses_produksi .control-label {}

    .group-proses_produksi .col-sm-8 {}

    .group-proses_produksi .form-control {}

    .group-proses_produksi .help-block {}

    /* end .group-proses_produksi */



    /* .group-penerapan_k3 */
    .group-penerapan_k3 {}

    .group-penerapan_k3 .control-label {}

    .group-penerapan_k3 .col-sm-8 {}

    .group-penerapan_k3 .form-control {}

    .group-penerapan_k3 .help-block {}

    /* end .group-penerapan_k3 */



    /* .group-jadwal */
    .group-jadwal {}

    .group-jadwal .control-label {}

    .group-jadwal .col-sm-8 {}

    .group-jadwal .form-control {}

    .group-jadwal .help-block {}

    /* end .group-jadwal */



    /* .group-kriteria_audit */
    .group-kriteria_audit {}

    .group-kriteria_audit .control-label {}

    .group-kriteria_audit .col-sm-8 {}

    .group-kriteria_audit .form-control {}

    .group-kriteria_audit .help-block {}

    /* end .group-kriteria_audit */



    /* .group-ket_kriteria_tdk_berlaku */
    .group-ket_kriteria_tdk_berlaku {}

    .group-ket_kriteria_tdk_berlaku .control-label {}

    .group-ket_kriteria_tdk_berlaku .col-sm-8 {}

    .group-ket_kriteria_tdk_berlaku .form-control {}

    .group-ket_kriteria_tdk_berlaku .help-block {}

    /* end .group-ket_kriteria_tdk_berlaku */



    /* .group-uraian_tdk_sesuai */
    .group-uraian_tdk_sesuai {}

    .group-uraian_tdk_sesuai .control-label {}

    .group-uraian_tdk_sesuai .col-sm-8 {}

    .group-uraian_tdk_sesuai .form-control {}

    .group-uraian_tdk_sesuai .help-block {}

    /* end .group-uraian_tdk_sesuai */



    /* .group-uraian_temuan */
    .group-uraian_temuan {}

    .group-uraian_temuan .control-label {}

    .group-uraian_temuan .col-sm-8 {}

    .group-uraian_temuan .form-control {}

    .group-uraian_temuan .help-block {}

    /* end .group-uraian_temuan */



    /* .group-lead */
    .group-lead {}

    .group-lead .control-label {}

    .group-lead .col-sm-8 {}

    .group-lead .form-control {}

    .group-lead .help-block {}

    /* end .group-lead */



    /* .group-member1 */
    .group-member1 {}

    .group-member1 .control-label {}

    .group-member1 .col-sm-8 {}

    .group-member1 .form-control {}

    .group-member1 .help-block {}

    /* end .group-member1 */



    /* .group-member2 */
    .group-member2 {}

    .group-member2 .control-label {}

    .group-member2 .col-sm-8 {}

    .group-member2 .form-control {}

    .group-member2 .help-block {}

    /* end .group-member2 */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Audit Tasks <small><?= cclang('new', ['Audit Tasks']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/audit_tasks'); ?>">Audit Tasks</a></li>
        <li class="active"><?= cclang('new'); ?></li>
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
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Audit Tasks</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Audit Tasks']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name' => 'form_audit_tasks',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_audit_tasks',
                            'enctype' => 'multipart/form-data',
                            'method' => 'POST'
                        ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                        <div class="form-group group-nama_perusahaan ">
                            <label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?= set_value('nama_perusahaan'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group group-kantor_cabang ">
                            <label for="kantor_cabang" class="col-sm-2 control-label">Kantor Cabang </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kantor_cabang" id="kantor_cabang" placeholder="Kantor Cabang" value="<?= set_value('kantor_cabang'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group group-jenis_industri ">
                            <label for="jenis_industri" class="col-sm-2 control-label">Jenis Industri </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jenis_industri" id="jenis_industri" placeholder="Jenis Industri" value="<?= set_value('jenis_industri'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="lingkup_audit" class="col-sm-2 control-label">Lingkup Audit </label>
                            <div class="col-sm-8">
                                <div class="multi-column custom-column">
                                    <ul>
                                        <li>
                                            <div class="box box-info box-solid">
                                                <div class="box-header with-border">
                                                    <label class=" text-white toggle-select-all-access" data-target=".target">
                                                        <h3 class="box-title"><i class="fa fa-check-square"></i> Lingkup Audit</h3>
                                                    </label>

                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>


                                                <div class="box-body">
                                                    <ul>
                                                        <?php foreach (db_get_all_data('departemen') as $row) : ?>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="flat-red target" name="lingkup_audit[]" value="<?= $row->id ?>"> <?= $row->section; ?>
                                                                </label>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="row-fluid clear-both">
                                    <small class="info help-block">

                                    </small>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="form-group group-tanggal ">
                            <label for="tanggal" class="col-sm-2 control-label">Tanggal <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal" placeholder="Tanggal" id="tanggal">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group group-tempat ">
                            <label for="tempat" class="col-sm-2 control-label">Tempat </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?= set_value('tempat'); ?>">
                                <small class="info help-block">
                                    <b>Input Tempat</b> Max Length : 255.</small>
                            </div>
                        </div>


                        <div class="form-group group-tujuan ">
                            <label for="tujuan" class="col-sm-2 control-label">Tujuan </label>
                            <div class="col-sm-8">
                                <textarea id="tujuan" name="tujuan" rows="5" class="textarea form-control" placeholder="Tujuan"><?= set_value('tujuan'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <hr>


                        <div class="form-group group-proses_produksi ">
                            <label for="proses_produksi" class="col-sm-2 control-label">Proses Produksi </label>
                            <div class="col-sm-8">
                                <textarea id="proses_produksi" name="proses_produksi" rows="5" class="textarea form-control" placeholder="Proses Produksi"><?= set_value('proses_produksi'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group group-penerapan_k3 ">
                            <label for="penerapan_k3" class="col-sm-2 control-label">Penerapan K3 </label>
                            <div class="col-sm-8">
                                <textarea id="penerapan_k3" name="penerapan_k3" rows="5" class="textarea form-control" placeholder="Penerapan K3"><?= set_value('penerapan_k3'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group group-jadwal ">
                            <label class="col-sm-2 control-label">Pertemuan awal </label>
                            <div class="col-sm-8">
                                Waktu
                                <input type="text" class="form-control" name="awal_waktu" id="awal_waktu" placeholder="Waktu">
                                Kegiatan
                                <input type="text" class="form-control" name="awal_keg" id="awal_keg" placeholder="Kegiatan">
                                Penghubung
                                <input type="text" class="form-control" name="awal_penghubung" id="awal_penghubung" placeholder="Penghubung">

                            </div>
                        </div>
                        <hr>
                        <div class="form-group group-jadwal ">
                            <label class="col-sm-2 control-label">Pemeriksaan dan Penilaian Kriteria</label>
                            <div class="col-sm-8">
                                Waktu
                                <input type="text" class="form-control" name="periksa_waktu" id="periksa_waktu" placeholder="Waktu">
                                Kegiatan
                                <input type="text" class="form-control" name="periksa_keg" id="periksa_keg" placeholder="Kegiatan">
                                Penghubung
                                <input type="text" class="form-control" name="periksa_penghubung" id="periksa_penghubung" placeholder="Penghubung">

                            </div>
                        </div>
                        <hr>
                        <div class="form-group group-jadwal ">
                            <label class="col-sm-2 control-label">Pertemuan Akhir </label>
                            <div class="col-sm-8">
                                Waktu
                                <input type="text" class="form-control" name="akhir_waktu" id="akhir_waktu" placeholder="Waktu">
                                Kegiatan
                                <input type="text" class="form-control" name="akhir_keg" id="akhir_keg" placeholder="Kegiatan">
                                Penghubung
                                <input type="text" class="form-control" name="akhir_penghubung" id="akhir_penghubung" placeholder="Penghubung">

                            </div>
                        </div>
                        <hr>

                        <div class="form-group group-lead ">
                            <label for="lead" class="col-sm-2 control-label">Lead <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select chosen-select-with-deselect" name="lead" id="lead" tabi-ndex="5" data-placeholder="Select Table">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('aauth_users') as $row) : ?>
                                        <option value="<?= $row->id; ?>"><?= $row->full_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">

                                </small>
                            </div>
                        </div>


                        <div class="form-group group-member1 ">
                            <label for="member1" class="col-sm-2 control-label">Member 1 <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select chosen-select-deselect" name="member1" id="member1" tabi-ndex="5" data-placeholder="Select Table">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('aauth_users') as $row) : ?>
                                        <option value="<?= $row->id; ?>"><?= $row->full_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">

                                </small>
                            </div>
                        </div>


                        <div class="form-group group-member2 ">
                            <label for="member2" class="col-sm-2 control-label">Member 2 <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select chosen-select-deselect" name="member2" id="member2" tabi-ndex="5" data-placeholder="Select Table">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('aauth_users') as $row) : ?>
                                        <option value="<?= $row->id; ?>"><?= $row->full_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
    function cek() {
        // let get = $('input[name="lingkup_audit[]"]').serialize();
        // const form_audit_tasks = $('#form_audit_tasks');
        // const data_post = form_audit_tasks.serializeArray();

        // console.log(data_post);

        // $.ajax({
        //     url: BASE_URL + '/administrator/audit_tasks/test',
        //     type: 'POST',
        //     dataType: 'json',
        //     data: data_post,
        // })

        // console.log(get);

    }


    $(document).ready(function() {
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });

        //check all
        var checkAll = $('#check_all');
        var checkboxes = $(document);

        checkAll.on('ifChecked ifUnchecked', function(event) {
            if (event.type == 'ifChecked') {
                checkboxes.iCheck('check');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });

        $(document).on('click', 'label.toggle-select-all-access', function(event) {
            var checkgroup = $(document).find($(this).attr('data-target'));
            var state = $(this).data('state');

            switch (state) {
                case 1:
                case undefined:
                    $(this).data('state', 2);
                    checkgroup.iCheck('check');
                    break;
                case 2:
                    $(this).data('state', 1);
                    checkgroup.iCheck('uncheck');
                    break;
            }
        });






        window.event_submit_and_action = '';

        (function() {
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


        $('#btn_cancel').click(function() {
            swal({
                    title: "<?= cclang('are_you_sure'); ?>",
                    text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
            // $('#ket_kriteria_tdk_berlaku').val(ket_kriteria_tdk_berlaku.getData());

            var form_audit_tasks = $('#form_audit_tasks');
            var data_post = form_audit_tasks.serializeArray();
            var save_type = $(this).attr('data-stype');

            data_post.push({
                name: 'save_type',
                value: save_type
            });

            data_post.push({
                name: 'event_submit_and_action',
                value: window.event_submit_and_action
            });

            (function() {
                data_post.push({
                    name: '_example',
                    value: 'value_of_example',
                })
            })()


            $('.loading').show();

            $.ajax({
                    url: BASE_URL + '/administrator/audit_tasks/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('.steps li').removeClass('error');
                    $('form').find('.error-input').remove();
                    if (res.success) {

                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();
                        resetForm();
                        $('.chosen option').prop('selected', false).trigger('chosen:updated');
                        // ket_kriteria_tdk_berlaku.setData('');


                    } else {
                        if (res.errors) {

                            $.each(res.errors, function(index, val) {
                                $('form #' + index).parents('.form-group').addClass('has-error');
                                $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                            });
                            $('.steps li').removeClass('error');
                            $('.content section').each(function(index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                }
                            });
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








    }); /*end doc ready*/
</script>