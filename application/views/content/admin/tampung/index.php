<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="penduduk">
                <caption>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </button>
                </caption>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Jumlah</td>
                        <td>Keterangan</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($penduduk as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->jumlah ?></td>
                            <td><?= $value->ket ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="update('<?= $value->id ?>')" data-bs-target="#modaledit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" onclick="btnhapus('penduduk', '<?= $value->id ?>')">
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
            <form action="<?= base_url('penduduk') ?>/add" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<div id="nama" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jml">Jumlah</label>
                            <input type="number" class="form-control" name="jml" id="jml" placeholder="Jumah" value="<?= set_value('jml') ?>">
                            <?= form_error('jml', '<div id="jml" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea type="text" class="form-control" name="ket" id="ket" value="<?= set_value('ket') ?>"></textarea>
                            <?= form_error('ket', '<div id="ket" class="form-text text-danger text-left">', '</div>'); ?>
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
            <form action="<?= base_url('penduduk') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="ednama">Nama</label>
                            <input type="hidden" class="form-control" name="id" id="edid" value="<?= set_value('id') ?>">
                            <input type="text" class="form-control" name="nama" id="ednama" placeholder="Nama" value="<?= set_value('nama') ?>">                            
                            <?= form_error('nama', '<div id="nama" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="edjml">Jumlah</label>
                            <input type="number" class="form-control" name="jml" id="edjml" placeholder="Jumlah" value="<?= set_value('jml') ?>">
                            <?= form_error('jml', '<div id="jml" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="edket">Keterangan</label>
                            <textarea type="text" class="form-control" name="ket" id="edket" placeholder="Keterangan" value="<?= set_value('ket') ?>"></textarea>
                            <?= form_error('ket', '<div id="ket" class="form-text text-danger text-left">', '</div>'); ?>
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
        $('#penduduk').DataTable();
    });

    // ajax get data penduduk for edit
    function update(id) {
        $.ajax({
            url: "<?= base_url('penduduk/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#edid').val(data.id);
                $('#ednama').val(data.nama);
                $('#edjml').val(data.jumlah);
                $('#edket').val(data.ket);
            }
        });
    }
</script>