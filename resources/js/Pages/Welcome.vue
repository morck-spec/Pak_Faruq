<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Selamat Datang" />
    
    <div class="min-vh-100 d-flex flex-column bg-light font-sans antialiased">
        <!-- Header / Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary fs-4" href="#">
                    <i class="bi bi-journal-code me-2"></i>Tugas App
                </a>
                <div class="d-flex">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="btn btn-outline-primary px-4 rounded-pill fw-bold">Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="btn btn-primary px-4 rounded-pill fw-bold shadow-sm"><i class="bi bi-box-arrow-in-right me-2"></i>Masuk</Link>
                    </template>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow-1 container py-5">
            <div class="row align-items-center mb-5 pb-4">
                <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-5">
                    <div class="badge bg-primary bg-opacity-10 text-primary mb-3 px-3 py-2 rounded-pill fw-semibold">
                        #TugasPakFaruq
                    </div>
                    <h1 class="display-4 fw-bolder text-dark mb-4 lh-sm">
                        Selamat Datang di <span class="text-primary">Aplikasi Tugas</span>
                    </h1>
                    <p class="lead text-secondary mb-5">
                        Aplikasi ini merupakan hasil pengerjaan tugas dari Pak Faruq. 
                        Di sini Anda dapat mengelola data dan mempublikasikan postingan dengan mudah, cepat, dan aman.
                    </p>
                    <div class="d-flex gap-3">
                        <Link :href="route('login')" class="btn btn-primary btn-lg fw-bold shadow-sm rounded-pill px-4 d-flex align-items-center">
                            Mulai Sekarang <i class="bi bi-arrow-right ms-2"></i>
                        </Link>
                        <a href="#tata-cara" class="btn btn-light btn-lg fw-bold border rounded-pill px-4 d-flex align-items-center text-dark">
                            Pelajari <i class="bi bi-info-circle ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center position-relative">
                    <div class="position-absolute top-50 start-50 translate-middle bg-primary rounded-circle" style="width: 400px; height: 400px; opacity: 0.05; z-index: 0;"></div>
                    <img src="https://illustrations.popsy.co/amber/freelancer.svg" alt="Illustration" class="img-fluid position-relative" style="max-height: 450px; z-index: 1;">
                </div>
            </div>

            <!-- Tata Cara Section -->
            <div id="tata-cara" class="row justify-content-center mt-5 pt-5 border-top">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h2 class="fw-bolder text-dark mb-3">Tata Cara Penggunaan</h2>
                        <p class="text-muted">Ikuti 3 langkah mudah di bawah ini untuk mulai menggunakan aplikasi.</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift transition-all">
                                <div class="card-body p-4 text-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                        <i class="bi bi-box-arrow-in-right fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">1. Login ke Sistem</h5>
                                    <p class="text-secondary small mb-0">Klik tombol Masuk atau Mulai Sekarang, lalu masukkan kredensial Anda untuk mengakses dashboard utama.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift transition-all">
                                <div class="card-body p-4 text-center">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                        <i class="bi bi-card-text fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">2. Kelola Data Post</h5>
                                    <p class="text-secondary small mb-0">Gunakan menu CRUD yang tersedia di dashboard untuk menambah, mengubah, atau menghapus postingan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 hover-lift transition-all">
                                <div class="card-body p-4 text-center">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                                        <i class="bi bi-check-circle-fill fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3">3. Selesai</h5>
                                    <p class="text-secondary small mb-0">Setelah selesai mengelola data, Anda bisa melihat hasilnya atau keluar dari sistem dengan aman.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white py-5 mt-5 border-top">
            <div class="container text-center">
                <div class="mb-3">
                    <h5 class="fw-bold text-dark"><i class="bi bi-journal-code text-primary me-2"></i>Tugas App</h5>
                    <p class="text-muted small mb-0 mt-2 max-w-md mx-auto">
                        Penjelasan: Halaman landing ini dirancang khusus untuk memberikan informasi awal, panduan ringkas, serta akses masuk (login) ke dalam sistem pengelolaan tugas.
                    </p>
                </div>
                <hr class="my-4 text-muted opacity-25">
                <p class="text-secondary small mb-0">
                    &copy; 2024 Tugas Pak Faruq. Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> menggunakan 
                    <span class="fw-semibold text-dark">Laravel v{{ laravelVersion }}</span> &amp; <span class="fw-semibold text-dark">Vue</span>.
                </p>
            </div>
        </footer>
    </div>
</template>

<style scoped>
.hover-lift {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}
</style>
