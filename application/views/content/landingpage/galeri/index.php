<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Galeri</h1>
            </div>
            <div class="row">
                <?php foreach ($galeri as $value) { ?>
                    <div class="col-4" data-bs-toggle="modal" onclick="detail('<?= $value->id ?>')" data-bs-target="#modaldetail">
                        <div class="card">
                            <img src="<?= base_url('assets/galeri/') . $value->foto ?>" class="card-img-top" alt="<?= $value->judul; ?>">
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Data -->
<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="modaldetailid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">Judul</div>
                    <div class="col" id="djudul"></div>
                </div>
                <div class="row">
                    <div class="col">Tanggal</div>
                    <div class="col" id="dtanggal"></div>
                </div>
                <div class="row">
                    <div class="col">Lokasi</div>
                    <div class="col" id="dlokasi"></div>
                </div>
                <div class="row">
                    <div class="col">Deskripsi</div>
                    <div class="col" id="ddeskripsi"></div>
                </div>
                <div class="row">
                    <div class="col">Keterangan</div>
                    <div class="col" id="dketerangan"></div>
                </div>
                <div class="container" style="text-align: center;">
                    <img src="" id="dfoto" width="50%" alt="Foto Kegiatan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-primary text-white" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    // ajax get data galeri for detail
    function detail(id) {
        $.ajax({
            url: "<?= base_url('galeri/getOneData') ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#djudul').text(': ' + data.judul);
                $('#dtanggal').text(': ' + data.tanggal);
                $('#dlokasi').text(': ' + data.lokasi);
                $('#ddeskripsi').text(': ' + data.deskripsi);
                $('#dketerangan').text(': ' + data.keterangan);
                $('#dfoto').attr('src', '<?= base_url('/assets/galeri/') ?>' + data.foto);
            }
        });
    }
</script>