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
        Master Kriteria Audit <small>Edit Master Kriteria Audit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/master_kriteria_audit'); ?>">Master Kriteria Audit</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
    /* .group-id_subklausul */
    .group-id_subklausul {}

    .group-id_subklausul .control-label {}

    .group-id_subklausul .col-sm-8 {}

    .group-id_subklausul .form-control {}

    .group-id_subklausul .help-block {}

    /* end .group-id_subklausul */



    /* .group-kriteria_audit */
    .group-kriteria_audit {}

    .group-kriteria_audit .control-label {}

    .group-kriteria_audit .col-sm-8 {}

    .group-kriteria_audit .form-control {}

    .group-kriteria_audit .help-block {}

    /* end .group-kriteria_audit */
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
                            <h3 class="widget-user-username">Master Kriteria Audit</h3>
                            <h5 class="widget-user-desc">Edit Master Kriteria Audit</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/master_kriteria_audit/edit_save/' . $this->uri->segment(4)), [
                            'name' => 'form_master_kriteria_audit',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_master_kriteria_audit',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>



                        <div class="form-group group-id  ">
                            <label for="id" class="col-sm-2 control-label">Id </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id" id="id" placeholder="" value="<?= set_value('id', $master_kriteria_audit->id); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group group-id_subklausul">
                            <label for="id_subklausul" class="col-sm-2 control-label">Parent Subklausul Audit <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="id_subklausul" id="id_subklausul" data-placeholder="Select Parent Subklausul Audit">
                                    <option value=""></option>
                                    <?php
                                    $conditions = [];
                                    ?>
                                    <?php foreach (db_get_all_data('master_subklausul_audit', $conditions) as $row) : ?>
                                        <option <?= $row->id == $master_kriteria_audit->id_subklausul ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->subklausul_audit; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>






                        <div class="form-group group-kriteria_audit  ">
                            <label for="kriteria_audit" class="col-sm-2 control-label">Kriteria Audit <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kriteria_audit" id="kriteria_audit" placeholder="" value="<?= set_value('kriteria_audit', $master_kriteria_audit->kriteria_audit); ?>">
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
<!-- Page script -->
<script>
    $(document).ready(function() {
        window.event_submit_and_action = '';

        (function() {
            var id_subklausul = $('#id_subklausul');
            /* 
             id_subklausul.on('change', function() {});
             */
            var kriteria_audit = $('#kriteria_audit');

        })()







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
                        window.location.href = BASE_URL + 'administrator/master_kriteria_audit';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();

            var form_master_kriteria_audit = $('#form_master_kriteria_audit');
            var data_post = form_master_kriteria_audit.serializeArray();
            var save_type = $(this).attr('data-stype');
            data_post.push({
                name: 'save_type',
                value: save_type
            });

            (function() {
                data_post.push({
                    name: '_example',
                    value: 'value_of_example',
                })
            })()


            data_post.push({
                name: 'event_submit_and_action',
                value: window.event_submit_and_action
            });

            $('.loading').show();

            $.ajax({
                    url: form_master_kriteria_audit.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('form').find('.error-input').remove();
                    $('.steps li').removeClass('error');
                    if (res.success) {
                        var id = $('#master_kriteria_audit_image_galery').find('li').attr('qq-file-id');
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





        async function chain() {}

        chain();




    }); /*end doc ready*/
</script>