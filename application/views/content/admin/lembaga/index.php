<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="lembagadesa">
                <caption>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </button>
                </caption>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Aparat</td>
                        <td>Keterangan</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($lembaga as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->keterangan ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="update('<?= $value->id ?>')" data-bs-target="#modaledit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" onclick="btnhapus('lembagadesa', '<?= $value->id ?>')">
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
            <form action="<?= base_url('lembagadesa') ?>/add" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="kades">Ketua RT/RW</label>
                            <select class="form-select" name="kades" id="kades" required>
                                <option value="">Pilih Ketua RT/RW</option>
                                <?php foreach ($penduduk as $value) { ?>
                                    <option value="<?= $value->id; ?>" <?= set_value('kades') == $value->id ? 'selected' : '' ?>><?= $value->nik . ' - ' . $value->nama ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('kades', '<div id="kades" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan') ?>"></textarea>
                            <?= form_error('keterangan', '<div id="keterangan" class="form-text text-danger text-left">', '</div>'); ?>
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
            <form action="<?= base_url('lembagadesa') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="edkades">Kepala Desa</label>
                            <input type="hidden" class="form-control" name="id" id="edid" value="<?= set_value('id') ?>">
                            <select class="form-select" name="kades" id="edkades" required>
                                <option value="">Pilih Ketua RT/RW</option>
                                <?php foreach ($penduduk as $value) { ?>
                                    <option value="<?= $value->id; ?>" <?= set_value('kades') == $value->id ? 'selected' : '' ?>><?= $value->nik . ' - ' . $value->nama ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('kades', '<div id="kades" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="edketerangan">Keterangan</label>
                            <textarea type="text" class="form-control" name="keterangan" id="edketerangan" placeholder="Keterangan" value="<?= set_value('keterangan') ?>"></textarea>
                            <?= form_error('keterangan', '<div id="keterangan" class="form-text text-danger text-left">', '</div>'); ?>
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

<script>
    $(document).ready(function() {
        $('#lembagadesa').DataTable();
    });

    // ajax get data lembagadesa for edit
    function update(id) {
        $.ajax({
            url: "<?= base_url('lembagadesa/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#edid').val(data.id);
                $('#edkades').val(data.id_penduduk);
                $('#edketerangan').val(data.keterangan);
            }
        });
    }
</script>