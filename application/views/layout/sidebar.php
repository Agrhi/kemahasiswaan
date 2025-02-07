<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="<?= base_url('dashboard') ?>">
      <img src="<?= base_url('') ?>/assets/img/logo.png" class="navbar-brand-img h-100 rounded-circle" alt="main_logo">
      <span class="ms-2 font-weight-bold">Desa Panasibaja</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Dashboard") ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Penduduk") ? 'active' : '' ?>" href="<?= base_url('penduduk') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Penduduk</span>
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Lembaga Desa") ? 'active' : '' ?>" href="<?= base_url('lembagadesa') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-collection text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Lembaga Desa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Struktur Organisasi") ? 'active' : '' ?>" href="<?= base_url('struktur') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-ungroup text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Struktur Organisasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Galeri Desa") ? 'active' : '' ?>" href="<?= base_url('galeriadm') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-album-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Galeri Desa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Agama") ? 'active' : '' ?>" href="<?= base_url('agama') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-favourite-28 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Agama</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Pendidikan") ? 'active' : '' ?>" href="<?= base_url('pendidikan') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-hat-3 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Pendidikan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Pekerjaan") ? 'active' : '' ?>" href="<?= base_url('pekerjaan') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-books text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Pekerjaan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Status Kawin") ? 'active' : '' ?>" href="<?= base_url('statuskawin') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-badge text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Status Kawin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Status Keluarga") ? 'active' : '' ?>" href="<?= base_url('statuskeluarga') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-building text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Status Keluarga</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($title === "Management User") ? 'active' : '' ?>" href="<?= base_url('management_user') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-settings-gear-65 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Management User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout') ?>">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-button-power text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Logout</span>
        </a>
      </li>
      <li class="nav-item mt-5">
        <div class="container">
          <div class="mt-2 mb-5 d-flex">
            <h6 class="mb-0">Light / Dark</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</aside>