<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="struktur">
                <caption>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </button>
                </caption>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kepala Desa</td>
                        <td>Tahun Jabatan</td>
                        <td>File Stuktur</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($struktur as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->kades ?></td>
                            <td><?= $value->tahun ?></td>
                            <td>
                                <?= $value->gambar ?>
                                <a type="button" onclick="showimg('<?= $value->gambar; ?>')" data-bs-toggle="modal" data-bs-target="#modalshow">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <?php if ($value->status == 'Y') { ?>
                                    <a href="<?= base_url('struktur/status/nonaktif/') . $value->id ?>" class="btn btn-primary btn-sm">Aktif</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('struktur/status/aktif/') . $value->id ?>" class="btn btn-danger btn-sm">Tidak Aktif</a>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="update('<?= $value->id ?>')" data-bs-target="#modaledit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" onclick="btnhapus('struktur', '<?= $value->id ?>')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah Data -->
<div class="modal fade" add="<?= $showModal == "add" ? "true" : "false" ?>" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="modaladdid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladdid">Tambah Data</h5>
            </div>
            <form action="<?= base_url('struktur') ?>/add" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="kades">Kepala Desa</label>
                            <input type="text" class="form-control" name="kades" id="kades" placeholder="Kepala Desa" value="<?= set_value('kades') ?>">
                            <?= form_error('kades', '<div id="kades" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="thnm">Tahun Mulai</label>
                            <select class="form-select" name="thnm" id="thnm" required>
                                <?php
                                $currentYear = date("Y");
                                $startYear = $currentYear - 5;
                                $endYear = $currentYear + 2;
                                for ($i = $startYear; $i <= $endYear; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                            <?= form_error('thnm', '<div id="thnm" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="thna">Tahun Akhir</label>
                            <select class="form-select" name="thna" id="thna" required>
                                <?php
                                $currentYear = date("Y");
                                $startYear = $currentYear - 2;
                                $endYear = $currentYear + 5;
                                for ($i = $startYear; $i <= $endYear; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                            <!-- <input type="number" min="1900" max="2100" class="form-control" name="thna" id="thna" placeholder="Tahun Akhir" value="<?= set_value('thna') ?>"> -->
                            <?= form_error('thna', '<div id="thna" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                            <?= form_error('gambar', '<div id="ket" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit Data -->
<div class="modal fade" edit="<?= $showModal == "edit" ? "true" : "false" ?>" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaleditid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditid">Edit Data</h5>
            </div>
            <form action="<?= base_url('struktur') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="edkades">Kepala Desa</label>
                            <input type="hidden" class="form-control" name="id" id="edid" value="<?= set_value('id') ?>">
                            <input type="text" class="form-control" name="kades" id="edkades" placeholder="Kepala Desa" value="<?= set_value('kades') ?>">
                            <?= form_error('kades', '<div id="kades" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="edthnm">Tahun Mulai</label>
                            <select class="form-select" name="thnm" id="edthnm" required>
                                <?php
                                $currentYear = date("Y");
                                $startYear = $currentYear - 5;
                                $endYear = $currentYear + 2;
                                for ($i = $startYear; $i <= $endYear; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                            <?= form_error('thnm', '<div id="thnm" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group col-6">
                            <label for="edthna">Tahun Akhir</label>
                            <select class="form-select" name="thna" id="edthna" required>
                                <?php
                                $currentYear = date("Y");
                                $startYear = $currentYear - 2;
                                $endYear = $currentYear + 5;
                                for ($i = $startYear; $i <= $endYear; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                            <?= form_error('thna', '<div id="thna" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Show Struktur Data -->
<div class="modal fade" id="modalshow" tabindex="-1" role="dialog" aria-labelledby="modalshowid" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalshowid">Struktur Organisasi</h5>
            </div>
            <div class="modal-body">
                <div class="container" style="text-align: center;">
                    <img id="showstrukturimg" width="50%" alt="Struktur Organisasi">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#struktur').DataTable();
    });

    // ajax get data struktur for edit
    function update(id) {
        $.ajax({
            url: "<?= base_url('struktur/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#edid').val(data.id);
                $('#edkades').val(data.kades);
                var tahun = data.tahun;
                // var cleanedTahun = tahun.replace(/\s+/g, '');
                var tahunArray = tahun.split(' - ');
                $('#edthnm').val(tahunArray[0]);
                $('#edthna').val(tahunArray[1]);
            }
        });
    }

    function showimg(img) {
        $('#showstrukturimg').attr('src', '<?= base_url('assets/struktur/') ?>' + img);
    };
</script>