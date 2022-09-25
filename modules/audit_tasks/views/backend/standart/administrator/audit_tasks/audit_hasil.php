<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Bootstrap demo</title> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
    <style>
        @media print {
            .hide-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <button onclick="window.print();" class="btn btn-info btn-sm hide-print text-white float-end fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
        </svg> Cetak</button>
    <p style="text-align: center; margin-top:100px"><strong>LAPORAN AUDIT INTERNAL SISTEM&nbsp;&nbsp;</strong></p>
    <p style="text-align: center;"><strong>MANAJEMEN KESELAMATAN DAN KESEHATAN KERJA&nbsp;</strong></p>
    <p style="text-align: center;"><strong>PP NO. 50 TAHUN 2012</strong></p>
    <p style="text-align: center;">TINGKAT PENCAPAIAN : 64/122/166 Kriteria&nbsp;</p>
    <p style="text-align: center;">Nomor Laporan : &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&nbsp;</p>
    <p>&nbsp;</p>
    <p style="text-align: center;"><strong>PT ANGKASA PURA I KANTOR CABANG&nbsp;</strong></p>
    <p style="text-align: center;"><strong>BANDARA INTERNASIONAL JENDERAL AHMAD YANI SEMARANG</strong>&nbsp;</p>
    <center>
        <p><img src="https://audit.hoesa.id/uploads/setting/Screenshot_143.png" alt="" width="60%" height="auto" /></p>
        <p>&nbsp;</p>
        <p><img src="https://audit.hoesa.id/uploads/setting/Screenshot_144.png" alt="" width="60%" height="auto" /></p>
    </center>
    <p>&nbsp;</p>
    <table border="1" width="100%" style="margin-top:300px">
        <tbody>
            <tr>
                <td>No.Laporan</td>
                <td></td>
                <td rowspan="3">
                    <p style="text-align: center;">LAPORAN AUDIT INTERNAL</p>
                    <p style="text-align: center;">SISTEM MANAJEMEN KESELAMATAN DAN KESEHATAN KERJA&nbsp;</p>
                    <p style="text-align: center;">PT ANGKASA PURA I</p>
                </td>
                <td>Halaman</td>
                <td></td>
            </tr>
            <tr>
                <td>Tgl.Laporan</td>
                <td><?= date('d-m-Y'); ?></td>
                <td>Audit Ke</td>
                <td></td>
            </tr>
            <tr>
                <td>Reff.</td>
                <td></td>
                <td>Auditor</td>
                <td><?= $lead->full_name; ?></td>
            </tr>
        </tbody>
    </table>
    <p><strong>1. PERUSAHAAN YANG DIAUDIT&nbsp;</strong></p>
    <p>Nama perusahaan : <?= $audit_task->nama_perusahaan ?></p>
    <p>Kantor Cabang : <?= $audit_task->kantor_cabang ?></p>
    <p>Jenis industri : <?= $audit_task->jenis_industri ?></p>
    <p>&nbsp;</p>
    <p><strong>2. LINGKUP AUDIT&nbsp;</strong></p>
    <p>Audit SMK3 di Kantor Cabang Bandara Internasional Jenderal Ahmad Yani Semarang yang meliputi section/departemen :&nbsp;</p>
    <ol>
        <?php foreach ($lingkup as $li) : ?>
            <li><?= $li->section; ?></li>
        <?php endforeach; ?>
    </ol>
    <p>&nbsp;</p>
    <p><strong>3. PELAKSANAAN AUDIT&nbsp;</strong></p>
    <p>Tanggal : <?= date_format(date_create($audit_task->tanggal), "d-m-Y"); ?></p>
    <p>Tempat : <?= $audit_task->tempat; ?></p>
    <p>&nbsp;</p>
    <p><strong>4. TUJUAN AUDIT&nbsp;</strong></p>
    <p><?= $audit_task->tujuan; ?></p>
    <p>&nbsp;</p>
    <p><strong>5. TIM AUDITOR</strong>&nbsp;</p>
    <p>Tim auditor pelaksaan audit di Kantor Cabang Bandara Internasional Jenderal Ahmad Yani Semarang terdiri dari :&nbsp;</p>
    <ol>
        <li><b><?= $lead->full_name; ?></b> sebagai Lead Auditor&nbsp;</li>
        <li><b><?= $member1->full_name; ?></b> sebagai Member Auditor&nbsp;</li>
        <li><b><?= $member2->full_name; ?></b> sebagai Member Auditor</li>
    </ol>
    <p>&nbsp;</p>
    <p><strong>6. GAMBARAN UMUM TEMPAT KERJA</strong>&nbsp;</p>
    <ol>
        <li><?= $audit_task->proses_produksi; ?></li>
        <li><?= $audit_task->penerapan_k3; ?></li>
    </ol>
    <p>&nbsp;</p>
    <p><strong>7. JADWAL AUDIT&nbsp;</strong></p>
    <table border="1" width="100%" data-tablestyle="MsoTableGrid" data-tablelook="1184" aria-rowcount="4">
        <tbody>
            <tr aria-rowindex="1">
                <td data-celllook="0">
                    <p>NO.&nbsp;</p>
                </td>
                <td data-celllook="0">
                    <p>KEGIATAN&nbsp;</p>
                </td>
                <td data-celllook="0">
                    <p>WAKTU&nbsp;</p>
                </td>
                <td data-celllook="0">
                    <p>KETERANGAN&nbsp;</p>
                </td>
                <td data-celllook="0">
                    <p>PENGHUBUNG&nbsp;</p>
                </td>
            </tr>
            <?php $idx = 2;
            foreach ($jadwal as $ja) :  ?>
                <tr aria-rowindex="<?= $idx; ?>">
                    <td data-celllook="0">
                        <p><?= $idx - 1; ?></p>
                    </td>
                    <td data-celllook="0">
                        <p><?= $ja->kegiatan; ?></p>
                    </td>
                    <td data-celllook="0">
                        <p><?= $ja->waktu; ?></p>
                    </td>
                    <td data-celllook="0">
                        <p><?= $ja->keterangan; ?></p>
                    </td>
                    <td data-celllook="0">
                        <p><?= $ja->penghubung; ?></p>
                    </td>
                </tr>
            <?php $idx++;
            endforeach; ?>

        </tbody>
    </table>
    <p>&nbsp;</p>
    <p><strong>8. DAFTAR KRITERIA AUDIT DAN PEMENUHANNYA&nbsp;</strong></p>
    <table data-tablestyle="MsoNormalTable" data-tablelook="0" aria-rowcount="6" border="1" width="100%">
        <thead>
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
                    <th class="text-center">
                        <?= $audit->pemenuhan == 'tidak_berlaku' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg>' : ''; ?>
                    </th>
                    <th class="text-center">
                        <?= $audit->pemenuhan == 'sesuai' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg>' : ''; ?>
                    </th>
                    <th class="text-center">
                        <?= $audit->pemenuhan == 'major' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg>' : ''; ?>
                    </th>
                    <th class="text-center">
                        <?= $audit->pemenuhan == 'minor' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg>' : ''; ?>
                    </th>
                    <th class="text-center">
                        <?= $audit->pemenuhan == 'observasi' ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
</svg>' : ''; ?>
                    </th>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p><strong>9. PENJELASAN TENTANG KRITERIA TIDAK BERLAKU</strong>&nbsp;</p>
    <?php foreach ($tidak_berlaku as $tb) : ?>
        <p>Kriteria <?= $tb->id_kriteria; ?>:&ldquo;<strong><?= $tb->kriteria_audit; ?></strong>&rdquo;. <?= $tb->penjelasan; ?>.&nbsp;</p>
        <p>&nbsp;</p>
    <?php endforeach; ?>

    <p><strong>10. URAIAN TEMUAN KETIDAK SESUAIAN&nbsp;</strong></p>
    <table data-tablestyle="MsoNormalTable" border="1" aria-rowcount="4" width="100%">
        <tbody>
            <tr aria-rowindex="1">
                <td colspan="4">
                    <p style="text-align: center;"><strong>URAIAN TEMUAN KETIDAK SESUAIAN&nbsp;</strong></p>
                </td>
                <td colspan="1" rowspan="2">
                    <p><strong>TINDAK LANJUT (Perbaikan ketidak sesuaian)&nbsp;</strong></p>
                </td>
            </tr>
            <tr aria-rowindex="2">
                <td>
                    <p><strong>No. Kriteria&nbsp;</strong></p>
                </td>
                <td>
                    <p><strong>Kriteria&nbsp;</strong></p>
                </td>
                <td>
                    <p><strong>Bukti Obyektif&nbsp;</strong></p>
                </td>
                <td>
                    <p><strong>Kategori&nbsp;</strong></p>
                    <p><strong>Critical/Major/&nbsp;</strong></p>
                    <p><strong>Minor&nbsp;</strong></p>
                </td>
            </tr>
            <?php foreach ($ketidak_sesuaian as $tb) : ?>
                <tr>
                    <td>
                        <p><?= $tb->id_kriteria; ?></p>
                    </td>
                    <td>
                        <p><?= $tb->kriteria_audit; ?></p>
                    </td>
                    <td>
                        <p><?= $tb->bukti_objektif; ?></p>
                    </td>
                    <td>
                        <p><?= $tb->pemenuhan; ?></p>
                    </td>
                    <td>
                        <p>Penyebab Ketidaksesuaian :&nbsp;</p>
                        <p><?= $tb->penyebab; ?></p>
                        <p>&nbsp;</p>
                        <p>Tindakan Korektif :&nbsp;</p>
                        <p><?= $tb->tindakan; ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <p>&nbsp;</p>
    <p><strong>11. URAIAN TEMUAN OBSERVASI&nbsp;</strong></p>

    <table border="1" style="width: 100%;" data-tablestyle="MsoNormalTable" data-tablelook="1184" aria-rowcount="4">
        <tbody>
            <tr style="height: 46px;" aria-rowindex="1">
                <td style="height: 46px;" colspan="3" data-celllook="69905">
                    <p><strong>URAIAN TEMUAN KETIDAK SESUAIAN&nbsp;</strong></p>
                </td>
            </tr>
            <tr style="height: 46px;" aria-rowindex="2">
                <td style="height: 46px;" data-celllook="69905">
                    <p><strong>No. Kriteria&nbsp;</strong></p>
                </td>
                <td style="height: 46px;" data-celllook="69905">
                    <p><strong>Kriteria&nbsp;</strong></p>
                </td>
                <td style="height: 46px;" data-celllook="69905">
                    <p><strong>Bukti Obyektif&nbsp;</strong></p>
                </td>
            </tr>
            <?php foreach ($observasi as $tb) : ?>
                <tr>
                    <td><?= $tb->id_kriteria; ?></td>
                    <th><?= $tb->kriteria_audit; ?></th>
                    <td><?= $tb->bukti_objektif; ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <p>&nbsp;</p>
    <p><strong>12. HASIL AUDIT&nbsp;</strong></p>
    <p>Perlu diadakan perbaikan atas ketidak sesuaian terhadap kriteria audit berikut:&nbsp;</p>
    <ul>
        <li data-leveltext="" data-font="Arial" data-listid="28" data-list-defn-props="{&quot;201340374&quot;:2,&quot;335551500&quot;:0,&quot;335552541&quot;:1,&quot;335559684&quot;:-2,&quot;335559685&quot;:1080,&quot;335559991&quot;:360,&quot;469769226&quot;:&quot;Arial&quot;,&quot;469769242&quot;:[8226],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}" aria-setsize="-1" data-aria-posinset="1" data-aria-level="1">Minor : <?= $minor->total; ?> kriteria&nbsp;</li>
        <li data-leveltext="" data-font="Arial" data-listid="28" data-list-defn-props="{&quot;201340374&quot;:2,&quot;335551500&quot;:0,&quot;335552541&quot;:1,&quot;335559684&quot;:-2,&quot;335559685&quot;:1080,&quot;335559991&quot;:360,&quot;469769226&quot;:&quot;Arial&quot;,&quot;469769242&quot;:[8226],&quot;469777803&quot;:&quot;left&quot;,&quot;469777804&quot;:&quot;&quot;,&quot;469777815&quot;:&quot;hybridMultilevel&quot;}" aria-setsize="-1" data-aria-posinset="2" data-aria-level="1">Major : <?= $major->total; ?> kriteria&nbsp;</li>
    </ul>
    <p>Sebagaimana dimaksud pada Daftar Temuan Ketidak Sesuaian pada butir 10 diatas.&nbsp;</p>
    <p>&nbsp;</p>
    <p>Jumlah prosentase perolehan hasil dihitung sesuai jumlah temuan yang ada :&nbsp;</p>
    <table data-tablestyle="MsoTableGrid" data-tablelook="1184" aria-rowcount="2" width="100%">
        <tbody>
            <tr aria-rowindex="1">
                <td data-celllook="4369">
                    <p>(Total Kriteria Audit &ndash; (jml tidak berlaku))&nbsp; - Jml ketidak sesuain &nbsp;</p>
                </td>
                <td colspan="1" rowspan="2" data-celllook="4369">
                    <p>X 100%&nbsp;</p>
                </td>
                <td colspan="1" rowspan="2" data-celllook="4369">
                    <p>= <?= $hasil; ?> %&nbsp;</p>
                </td>
            </tr>
            <tr aria-rowindex="2">
                <td colspan="2" data-celllook="4369">
                    <p>(Total Kriteria Audit &ndash; (jml tidak berlaku))&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p><strong>Dengan hasil penilaian di atas maka sesuai regulasi, maka tingkat pencapaian penerapan SMK3 Kantor Cabang Bandara Internasional Jenderal Ahmad Yani mendapatkan kriteria : ......... (optional KURANG/BAIK/MEMUASKAN).&nbsp;</strong></p>
    <p>&nbsp;</p>
    <p style="text-align: center;">Laporan ini disusun oleh :&nbsp;</p>
    <p style="text-align: center;">LEAD AUDITOR&nbsp;</p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: center;">&nbsp;</p>
    <p style="text-align: center;">(NAMA LENGKAP)&nbsp;</p>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->
</body>

</html>