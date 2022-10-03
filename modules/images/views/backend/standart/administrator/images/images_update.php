

    <!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
    <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <!-- Fine Uploader jQuery JS file
    ====================================================================== -->
    <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
    <?php $this->load->view('core_template/fine_upload'); ?>
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
        Images        <small>Edit Images</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/images'); ?>">Images</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>
   /* .group-image */
   .group-image {

   }

   .group-image .control-label {

   }

   .group-image .col-sm-8 {

   }

   .group-image .form-control {

   }

   .group-image .help-block {

   }
   /* end .group-image */



   /* .group-nama */
   .group-nama {

   }

   .group-nama .control-label {

   }

   .group-nama .col-sm-8 {

   }

   .group-nama .form-control {

   }

   .group-nama .help-block {

   }
   /* end .group-nama */




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
                            <h3 class="widget-user-username">Images</h3>
                            <h5 class="widget-user-desc">Edit Images</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/images/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_images',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_images',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-nama  ">
                                <label for="nama" class="col-sm-2 control-label">Nama                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="<?= set_value('nama', $images->nama); ?>">
                                    <small class="info help-block">
                                        <b>Input Nama</b> Max Length : 255.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-image  ">
                                <label for="image" class="col-sm-2 control-label">Image                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="images_image_galery"></div>
                                    <input class="data_file data_file_uuid" name="images_image_uuid" id="images_image_uuid" type="hidden" value="<?= set_value('images_image_uuid'); ?>">
                                    <input class="data_file" name="images_image_name" id="images_image_name" type="hidden" value="<?= set_value('images_image_name', $images->image); ?>">
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
            
    (function(){
    var image = $('#image');
   /* 
    image.on('change', function() {});
    */
    var nama = $('#nama');
   
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
                    window.location.href = BASE_URL + 'administrator/images';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_images = $('#form_images');
    var data_post = form_images.serializeArray();
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
            url: form_images.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#images_image_galery').find('li').attr('qq-file-id');
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

                        var params = {};
            params[csrf] = token;

            $('#images_image_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/images/upload_image_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/images/delete_image_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/images/get_image_file/<?= $images->id; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["*"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#images_image_galery').fineUploader('getUuid', id);
                            $('#images_image_uuid').val(uuid);
                            $('#images_image_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#images_image_uuid').val();
                        $.get(BASE_URL + '/administrator/images/delete_image_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#images_image_uuid').val('');
                            $('#images_image_name').val('');
                        }
                    }
                }
            }); /*end image galey*/
            

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>