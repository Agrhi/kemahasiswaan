<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="statuskeluarga">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Status Kawin</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($statuskeluarga as $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->status_keluarga ?></td>
                            <td><?= $value->keterangan ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('#statuskeluarga').DataTable();
    });
</script>