    <nav class="navbar navbar-expand-lg navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="me-2">Kemahasiswaan</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="<?= base_url('home') ?>" class="nav-item nav-link <?= ($title === "Beranda") ? 'active' : '' ?>">Beranda</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($title === "Sejarah" || $title === 'Visi & Misi' || $title === 'Struktur Organisasi') ? 'active' : '' ?>" data-bs-toggle="dropdown">Tentang Kami</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="<?= base_url('profil/sejarah') ?>" class="dropdown-item <?= ($title === "Sejarah") ? 'active' : '' ?>">Sejarah</a>
                        <a href="<?= base_url('profil/vismis') ?>" class="dropdown-item <?= ($title === "Visi & Misi") ? 'active' : '' ?>">Visi & Misi</a>
                        <a href="<?= base_url('profil/struktur') ?>" class="dropdown-item <?= ($title === "Struktur Organisasi") ? 'active' : '' ?>">Struktur Organisasi</a>
                    </div>
                </div>
                <!-- <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($title === 'Kegiatan Mahasiswa' || $title === 'Prestasi Mahasiswa') ? 'active' : '' ?>" data-bs-toggle="dropdown">Mahasiswa</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="<?= base_url('mahasiswa/kegiatan') ?>" class="dropdown-item <?= ($title === "Kegiatan Mahasiswa") ? 'active' : '' ?>">Kegiatan Mahasiswa</a>
                        <a href="<?= base_url('mahasiswa/prestasi') ?>" class="dropdown-item <?= ($title === "Prestasi Mahasiswa") ? 'active' : '' ?>">Prestasi Mahasiswa</a>
                    </div>
                </div> -->
                <a href="<?= base_url('berita') ?>" class="nav-item nav-link <?= ($title === "Berita") ? 'active' : '' ?>">Berita</a>
                <a href="<?= base_url('galeri') ?>" class="nav-item nav-link <?= ($title === "Galeri") ? 'active' : '' ?>">Galeri</a>
                <a href="<?= base_url('about') ?>" class="nav-item nav-link <?= ($title === "About") ? 'active' : '' ?>">About</a>
                <!-- <a href="<?= base_url('contact') ?>" class="nav-item nav-link <?= ($title === "Kontak Person") ? 'active' : '' ?>">Contact</a>                 -->
            </div>
            <!-- <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn bg-dark text-white me-2" href="<?= base_url('login') ?>">Login Admin</a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i
                        class="fab fa-linkedin-in"></i></a>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->