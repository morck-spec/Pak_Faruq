<!-- 
  ==========================================================================
  Halaman Landing Page (Welcome.vue)
  Deskripsi: Halaman beranda utama untuk memperkenalkan sistem 'Tugas Pak Faruq'.
  Fitur: Tampilan responsif (mobile/tablet/desktop), transisi smooth, visual menarik,
         dan panduan tata cara penggunaan aplikasi.
  ==========================================================================
-->

<script setup>
// Mengimport komponen Head untuk title tab browser dan Link untuk navigasi Inertia tanpa reload
import { Head, Link } from '@inertiajs/vue3';

// Mendefinisikan properti yang dikirimkan oleh backend Laravel
defineProps({
    // Menentukan apakah fitur login tersedia
    canLogin: {
        type: Boolean,
    },
    // Menentukan apakah fitur registrasi tersedia
    canRegister: {
        type: Boolean,
    },
    // Versi framework Laravel yang sedang digunakan
    laravelVersion: {
        type: String,
        required: true,
    },
    // Versi PHP pada server
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <!-- Menentukan judul pada tab browser -->
    <Head title="Selamat Datang - Tugas Pak Faruq" />
    
    <!-- Wrapper utama seluruh halaman dengan tinggi minimal layar penuh dan background netral lembut -->
    <div class="min-vh-100 d-flex flex-column bg-light font-sans antialiased landing-wrapper">
        
        <!-- ==========================================================================
             1. HEADER / NAVBAR
             Deskripsi: Bar navigasi atas yang sticky dan responsif di semua ukuran layar
             ========================================================================== -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white bg-opacity-95 backdrop-blur shadow-sm py-3 sticky-top border-bottom">
            <div class="container">
                <!-- Logo Brand dan Judul Aplikasi -->
                <Link class="navbar-brand fw-extrabold text-primary fs-4 d-flex align-items-center gap-2" href="#">
                    <div class="brand-logo-badge rounded-3 bg-primary bg-opacity-10 text-primary p-2 d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-journal-code fs-5"></i>
                    </div>
                    <span>Tugas<span class="text-dark">App</span></span>
                </Link>

                <!-- Tombol aksi navigasi (Login / Dashboard jika sudah login) -->
                <div class="d-flex align-items-center gap-2">
                    <!-- Jika pengguna sudah login, arahkan langsung ke dashboard -->
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="btn btn-outline-primary px-3 px-sm-4 rounded-pill fw-bold shadow-sm d-flex align-items-center gap-2 btn-nav">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </Link>
                    <!-- Jika belum login, tampilkan tombol Masuk -->
                    <template v-else>
                        <Link :href="route('login')" class="btn btn-gradient-primary px-3 px-sm-4 rounded-pill fw-bold shadow-sm d-flex align-items-center gap-2 btn-nav">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Masuk</span>
                        </Link>
                    </template>
                </div>
            </div>
        </nav>

        <!-- ==========================================================================
             2. MAIN CONTENT (HERO & TATA CARA)
             ========================================================================== -->
        <main class="flex-grow-1 container py-4 py-md-5">
            
            <!-- ----------------------------------------------------------------------
                 HERO SECTION
                 Deskripsi: Menampilkan sapaan utama, pengantar tugas, tombol CTA,
                 serta foto/visual ilustratif modern yang dilengkapi floating badges.
                 ---------------------------------------------------------------------- -->
            <div class="row align-items-center py-4 py-lg-5 mb-4">
                
                <!-- Kolom Kiri: Teks Pengantar & Tombol CTA -->
                <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-4 text-center text-lg-start">
                    <!-- Badge Kategori / Tag Tugas -->
                    <div class="d-inline-flex align-items-center gap-2 badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold fs-7 shadow-xs">
                        <i class="bi bi-stars text-warning"></i>
                        <span>#TugasPakFaruq • Laravel & Vue</span>
                    </div>

                    <!-- Judul Utama dengan Tipografi Responsif -->
                    <h1 class="display-5 display-md-4 fw-extrabold text-dark mb-3 lh-sm">
                        Selamat Datang di <br class="d-none d-sm-inline" />
                        <span class="text-gradient">Aplikasi Tugas</span>
                    </h1>

                    <!-- Paragraf Deskripsi -->
                    <p class="lead text-secondary mb-4 fs-6 fs-md-5 pe-lg-3">
                        Aplikasi ini merupakan hasil pengerjaan tugas dari <strong>Pak Faruq</strong>. 
                        Di sini Anda dapat mengelola data dan mempublikasikan postingan dengan mudah, cepat, responsif, dan aman.
                    </p>

                    <!-- Tombol Aksi (CTA) Responsif: wrap rapi di layar kecil -->
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3">
                        <Link :href="route('login')" class="btn btn-gradient-primary btn-lg fw-bold rounded-pill px-4 py-2-5 shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <span>Mulai Sekarang</span>
                            <i class="bi bi-arrow-right"></i>
                        </Link>
                        <a href="#tata-cara" class="btn btn-white btn-lg fw-bold border rounded-pill px-4 py-2-5 d-flex align-items-center justify-content-center gap-2 text-dark shadow-xs hover-bg-light">
                            <i class="bi bi-info-circle text-primary"></i>
                            <span>Pelajari Panduan</span>
                        </a>
                    </div>

                    <!-- Indikator Keunggulan Cepat (Quick Highlights) -->
                    <div class="row g-3 mt-4 pt-2 text-start justify-content-center justify-content-lg-start">
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>100% Responsif Mobile</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <i class="bi bi-shield-check text-primary"></i>
                                <span>Autentikasi Terproteksi</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <i class="bi bi-lightning-charge-fill text-warning"></i>
                                <span>SPA Cepat (Inertia)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Foto & Visual Interaktif dengan Floating Glass Badges -->
                <div class="col-lg-6 text-center position-relative mt-2 mt-lg-0">
                    
                    <!-- Elemen Dekoratif Lingkaran Berpendar di Latar Belakang -->
                    <div class="hero-glow-blob position-absolute top-50 start-50 translate-middle rounded-circle"></div>

                    <!-- Container Visual Kartu Foto / Ilustrasi Utama -->
                    <div class="hero-image-card position-relative p-2 p-sm-3 bg-white rounded-5 shadow-lg mx-auto">
                        <!-- Foto Utama yang Menarik & Relevan: Siswa/Developer berfokus mengerjakan tugas modern -->
                        <img 
                            src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80" 
                            alt="Workspace Tugas Pak Faruq" 
                            class="img-fluid hero-img-responsive shadow-sm"
                            loading="lazy"
                        >

                        <!-- Floating Glass Badge 1 (Kiri Bawah): Menampilkan status aktif tugas -->
                        <div class="glass-badge position-absolute bottom-0 start-0 translate-middle-y ms-2 ms-sm-4 p-2 p-sm-3 rounded-4 d-flex align-items-center gap-3 animate-float shadow-sm text-start">
                            <div class="badge-icon rounded-circle bg-success bg-opacity-10 text-success p-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-check2-circle fs-5"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark small">Status Tugas</div>
                                <div class="text-success small fw-semibold">Siap Digunakan &amp; Aktif</div>
                            </div>
                        </div>

                        <!-- Floating Glass Badge 2 (Kanan Atas): Menampilkan fitur CRUD -->
                        <div class="glass-badge position-absolute top-0 end-0 -translate-middle-y me-2 me-sm-4 mt-3 p-2 p-sm-3 rounded-4 d-flex align-items-center gap-2 animate-float-delayed shadow-sm text-start">
                            <div class="badge-icon rounded-circle bg-primary bg-opacity-10 text-primary p-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark small">CRUD Posts</div>
                                <div class="text-muted small">Create, Read, Update, Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ----------------------------------------------------------------------
                 TATA CARA PENGGUNAAN SECTION
                 Deskripsi: Panduan 3 langkah praktis dan mudah dipahami dalam menggunakan sistem
                 ---------------------------------------------------------------------- -->
            <div id="tata-cara" class="row justify-content-center mt-4 mt-md-5 pt-5 border-top">
                <div class="col-lg-10">
                    
                    <!-- Header Section Tata Cara -->
                    <div class="text-center mb-5">
                        <div class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-1 rounded-pill fw-semibold">
                            Panduan Praktis
                        </div>
                        <h2 class="fw-extrabold text-dark mb-3">Tata Cara Penggunaan</h2>
                        <p class="text-muted mx-auto" style="max-width: 600px;">
                            Ikuti 3 langkah mudah di bawah ini untuk mulai menggunakan dan mengelola data di aplikasi tugas ini.
                        </p>
                    </div>
                    
                    <!-- Grid 3 Kartu Tata Cara (Responsif: 1 kolom di mobile, 3 di desktop) -->
                    <div class="row g-4">
                        
                        <!-- Langkah 1: Login -->
                        <div class="col-12 col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift step-card">
                                <div class="card-body p-4 text-center d-flex flex-column align-items-center">
                                    <!-- Nomor Langkah -->
                                    <span class="step-number fw-bold text-primary mb-3">01</span>
                                    <!-- Icon Langkah -->
                                    <div class="step-icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mb-3 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-box-arrow-in-right fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">1. Login ke Sistem</h5>
                                    <p class="text-secondary small mb-0">
                                        Klik tombol <strong>Masuk</strong> atau <strong>Mulai Sekarang</strong>, lalu masukkan kredensial akun Anda untuk mengakses dashboard utama.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Langkah 2: Kelola Data Post -->
                        <div class="col-12 col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift step-card">
                                <div class="card-body p-4 text-center d-flex flex-column align-items-center">
                                    <!-- Nomor Langkah -->
                                    <span class="step-number fw-bold text-success mb-3">02</span>
                                    <!-- Icon Langkah -->
                                    <div class="step-icon-wrapper bg-success bg-opacity-10 text-success rounded-circle mb-3 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-card-text fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">2. Kelola Data Post</h5>
                                    <p class="text-secondary small mb-0">
                                        Gunakan menu CRUD yang tersedia di dashboard untuk menambah, mengedit konten, maupun menghapus data postingan sesuai kebutuhan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Langkah 3: Selesai -->
                        <div class="col-12 col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift step-card">
                                <div class="card-body p-4 text-center d-flex flex-column align-items-center">
                                    <!-- Nomor Langkah -->
                                    <span class="step-number fw-bold text-warning mb-3">03</span>
                                    <!-- Icon Langkah -->
                                    <div class="step-icon-wrapper bg-warning bg-opacity-10 text-warning rounded-circle mb-3 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-circle-fill fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">3. Selesai</h5>
                                    <p class="text-secondary small mb-0">
                                        Setelah selesai mengelola data, Anda bisa meninjau hasilnya secara langsung atau keluar (logout) dari sistem dengan aman.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        <!-- ==========================================================================
             3. FOOTER
             Deskripsi: Bagian kaki halaman dengan informasi hak cipta dan teknologi
             ========================================================================== -->
        <footer class="bg-white py-4 py-md-5 mt-5 border-top">
            <div class="container text-center">
                <div class="mb-3">
                    <h5 class="fw-bold text-dark d-inline-flex align-items-center gap-2 justify-content-center">
                        <i class="bi bi-journal-code text-primary"></i>
                        <span>Tugas App</span>
                    </h5>
                    <p class="text-muted small mb-0 mt-2 mx-auto" style="max-width: 500px;">
                        Halaman landing ini dirancang untuk memberikan informasi awal, panduan ringkas, serta kemudahan akses masuk ke dalam sistem pengelolaan tugas.
                    </p>
                </div>
                <hr class="my-4 text-muted opacity-25">
                <p class="text-secondary small mb-0">
                    &copy; {{ new Date().getFullYear() }} <strong>Tugas Pak Faruq</strong>. Dibuat dengan 
                    <i class="bi bi-heart-fill text-danger mx-1"></i> menggunakan 
                    <span class="fw-semibold text-dark">Laravel v{{ laravelVersion }}</span> &amp; 
                    <span class="fw-semibold text-dark">Vue 3 + Inertia</span>.
                </p>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* ==========================================================================
   STYLING SCOPED KHUSUS LANDING PAGE (Welcome.vue)
   ========================================================================== */

/* Efek blur transparan pada navbar */
.backdrop-blur {
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

/* Teks dengan gradien warna modern */
.text-gradient {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Ketebalan font ekstra */
.fw-extrabold {
    font-weight: 800;
}

/* Ukuran tombol di navbar saat mobile agar pas dan tidak terpotong */
.btn-nav {
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

/* Bayangan sangat lembut untuk kartu kecil */
.shadow-xs {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
}

/* Efek background saat tombol sekunder di-hover */
.hover-bg-light:hover {
    background-color: #f8fafc;
    border-color: #cbd5e1 !important;
}

/* Lingkaran blur dekoratif di belakang foto hero */
.hero-glow-blob {
    width: 360px;
    height: 360px;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.22) 0%, rgba(139, 92, 246, 0.08) 50%, transparent 70%);
    filter: blur(40px);
    z-index: 0;
    pointer-events: none;
}

/* Kartu pembungkus foto hero dengan border tipis dan sudut membulat */
.hero-image-card {
    max-width: 520px;
    border: 1px solid rgba(226, 232, 240, 0.8);
    z-index: 1;
}

/* Ukuran icon pada floating glass badge */
.badge-icon {
    width: 38px;
    height: 38px;
}

/* Ukuran wrapper icon pada kartu langkah tata cara */
.step-icon-wrapper {
    width: 64px;
    height: 64px;
}

/* Angka penunjuk langkah pada kartu panduan */
.step-number {
    font-size: 0.85rem;
    letter-spacing: 0.1em;
    padding: 2px 10px;
    background: rgba(0, 0, 0, 0.03);
    border-radius: 20px;
}

/* Garis aksen atas pada kartu tata cara */
.step-card {
    position: relative;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.step-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--primary-gradient);
    opacity: 0;
    transition: opacity 0.25s ease;
}

.step-card:hover::before {
    opacity: 1;
}

/* Responsivitas pada layar smartphone */
@media (max-width: 576px) {
    .hero-glow-blob {
        width: 260px;
        height: 260px;
    }
    
    .glass-badge {
        padding: 0.5rem 0.75rem !important;
        font-size: 0.8rem;
    }
}
</style>
