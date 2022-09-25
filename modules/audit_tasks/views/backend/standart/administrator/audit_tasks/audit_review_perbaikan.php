<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    //This page is a result of an autogenerated content made by running test.html with firefox.
    function domo() {

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
        Audit Tasks <small><?= cclang('detail', ['Audit Tasks']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/audit_tasks'); ?>">Audit Tasks</a></li>
        <li class="active"><?= cclang('detail'); ?></li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Perbaikan Hasil Audit</h3>
                            <h5 class="widget-user-desc">Detail Audit Tasks</h5>
                            <hr>
                        </div>


                        <div class="form-horizontal form-step" name="form_audit_tasks" id="form_audit_tasks">
                            <div class="container">
                                <div class="form-group ">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th scope="col" rowspan="3">No</th>
                                                    <th scope="col" rowspan="3">No Kriteria</th>
                                                    <th scope="col" rowspan="3">Kriteria</th>
                                                    <th scope="col" rowspan="3">Tidak Berlaku</th>
                                                    <th scope="col" colspan="4">Pemenuhannya</th>

                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Sesuai</th>
                                                    <th colspan="2">Ketidaksesuaian</th>
                                                    <th rowspan="2">Observasi</th>
                                                </tr>
                                                <tr>
                                                    <th>Major</th>
                                                    <th>Minor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($hasil_audits as $audit) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no; ?></td>
                                                        <td class="text-right"><?= $audit->id_kriteria; ?></td>
                                                        <td><?= $audit->kriteria_audit; ?></td>
                                                        <td class="text-center">
                                                            <?= $audit->pemenuhan == 'tidak_berlaku' ? '<i class="fa fa-check-square-o"></i>' : ''; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $audit->pemenuhan == 'sesuai' ? '<i class="fa fa-check-square-o"></i>' : ''; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $audit->pemenuhan == 'major' ? '<i class="fa fa-check-square-o"></i>' : ''; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $audit->pemenuhan == 'minor' ? '<i class="fa fa-check-square-o"></i>' : ''; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $audit->pemenuhan == 'observasi' ? '<i class="fa fa-check-square-o"></i>' : ''; ?>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                endforeach; ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <u>
                                    <h4>PENJELASAN TENTANG KRITERIA TIDAK BERLAKU</h4>
                                </u>
                                <table class="table table-bordered">
                                    <tr class="bg-warning">
                                        <th>No kriteria</th>
                                        <th>Kriteria</th>
                                        <th>Penjelasan</th>
                                    </tr>
                                    <?php foreach ($tidak_berlaku as $tb) : ?>
                                        <tr>
                                            <td><?= $tb->id_kriteria; ?></td>
                                            <th><?= $tb->kriteria_audit; ?></th>
                                            <td><?= $tb->penjelasan; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <hr>
                                <u>
                                    <h4>TEMUAN KETIDAK SESUAIAN</h4>
                                </u>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <form action="" id="ketidak_sesuaian">
                                            <tr class="bg-warning">
                                                <th>No kriteria</th>
                                                <th>Kriteria</th>
                                                <th>Bukti Objektif</th>
                                                <th>Kategori</th>
                                                <th width="500">Tindak lanjut (perbaikan ketidak sesuaian)</th>
                                                <th>Verifikasi & Validasi</th>
                                            </tr>
                                            <?php foreach ($ketidak_sesuaian as $tb) : ?>
                                                <tr>
                                                    <td><?= $tb->id_kriteria; ?></td>
                                                    <th><?= $tb->kriteria_audit; ?></th>
                                                    <td><?= $tb->bukti_objektif; ?></td>
                                                    <td><?= $tb->pemenuhan; ?></td>
                                                    <td>
                                                        <div class="panel panel-danger">
                                                            <div class="panel-body">
                                                                <p><b>Penyebab Ketidaksesuaian : </b> <br><?= $tb->penyebab; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-success">

                                                            <div class="panel-body">
                                                                <p><b>Tindakan Korektif : </b> <br><?= $tb->tindakan; ?></p>
                                                                <br>
                                                                <p><b>Target waktu selesai : </b> <br><?= $tb->target_waktu_selesai; ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="verif_<?= $tb->id_kriteria; ?>" class="form-control chosen chosen-select chosen-select-with-deselect" data-placeholder="Verifikasi">
                                                            <option value=""></option>
                                                            <option value="open" <?= $tb->status == 'open' ? 'selected' : ''; ?>>Open</option>
                                                            <option value="close" <?= $tb->status == 'close' ? 'selected' : ''; ?>>Close</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </form>
                                    </table>
                                </div>
                                <hr>

                                <u>
                                    <h4>TEMUAN OBSERVASI</h4>
                                </u>
                                <table class="table table-bordered">
                                    <form action="" id="observasi">

                                        <tr class="bg-warning">
                                            <th>No kriteria</th>
                                            <th>Kriteria</th>
                                            <th>Bukti Objektif</th>
                                            <th>Catatan</th>
                                            <!-- <th width="500">Rekomendasi</th> -->
                                        </tr>
                                        <?php foreach ($observasi as $tb) : ?>
                                            <tr>
                                                <td><?= $tb->id_kriteria; ?></td>
                                                <th><?= $tb->kriteria_audit; ?></th>
                                                <td><?= $tb->bukti_objektif; ?></td>
                                                <td><?= $tb->catatan; ?></td>
                                                <!-- <td>
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            Rekomendasi
                                                        </div>
                                                        <div class="panel-body">
                                                            <?= $tb->rekomendasi; ?>
                                                        </div>
                                                    </div>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    </form>
                                </table>

                                <hr>

                                <div class="message"></div>
                                <br>
                                <br>

                                <div class="view-nav">
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
                                </div>
                                <hr>


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
    // CSRF TOKEN {GLOBAL VARIABLES}
    const csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';


    $(document).ready(function() {
        $('.btn_save').click(function(e) {
            e.preventDefault();
            $('.message').fadeOut();
            let data_post = [];

            const save_type = $(this).attr('data-stype');

            const ketidak_sesuaian = $('#ketidak_sesuaian').serializeArray();
            $.each(ketidak_sesuaian, function() {
                data_post.push({
                    name: this.name,
                    value: this.value
                });
            });

            // const observasi = $('#observasi').serializeArray();
            // $.each(observasi, function() {
            //     data_post.push({
            //         name: this.name,
            //         value: this.value
            //     });
            // });
            data_post.push({
                name: [csrfName],
                value: csrfHash,
            });
            data_post.push({
                name: 'save_type',
                value: save_type
            });
            data_post.push({
                name: 'id_task',
                value: <?= $id_task; ?>
            });


            console.log(data_post);

            $('.loading').show();

            $.ajax({
                    url: BASE_URL + '/administrator/audit_tasks/save_audit_perbaikan',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    if (res.success) {
                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();
                        // location.reload(true);
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

    });
</script>