<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card bg-dark shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-3">
                    <img src="<?= base_url('assets/img/logo.png') ?>" width="20%" alt="">
                    <h2 class="text-white">Log In</h2>
                </div>
                <form role="form" action="<?= base_url('login/prosses'); ?>" method="post">
                    <div class="form-group mb-4">
                        <div class="input-group input-group-alternative">
                            <input class="form-control" placeholder="Username" name="username" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <input class="form-control" placeholder="Password" name="password" type="password">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-light my-3">Sign in</button>
                        <a href="<?= base_url() ?>" type="button" class="btn btn-danger my-3">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>