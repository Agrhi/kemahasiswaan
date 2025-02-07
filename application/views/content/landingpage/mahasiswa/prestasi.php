<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Lembaga Desa</h1>
                <p class="text-primary fs-5">Lembaga Desa Panasibaja</p>
            </div>
            <div class="row">
                <p>Lembaga Desa Ketua RT/RW Desa Panasibaja sebagai berikut.</p>

                <table class="table table-border" id="user">
                    <thead class="bg-primary text-white">
                        <tr>
                            <td>No</td>
                            <td>Nama Aparat</td>
                            <td>Keterangan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($lembaga as $value) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $value->nama; ?></td>
                                <td><?= $value->keterangan; ?></td>
                            </tr>                            
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>