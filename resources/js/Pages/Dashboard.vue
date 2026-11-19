<!-- 
  ==========================================================================
  Halaman Dashboard (Dashboard.vue)
  Deskripsi: Halaman beranda setelah pengguna berhasil masuk (login).
  Fitur: Banner sambutan modern, kartu ringkasan, dan pintasan cepat ke fitur posts.
  ==========================================================================
-->

<script setup>
// Mengimport Layout induk aplikasi
import Layout from '@/Layouts/App.vue';

// Mengimport Head untuk judul tab dan Link untuk navigasi SPA
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Layout>
        <!-- Judul pada tab browser -->
        <Head title="Dashboard - Tugas Pak Faruq" />

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                
                <!-- Kartu Banner Sambutan dengan Aksen Gradien -->
                <div class="card border-0 rounded-4 shadow-sm text-white mb-4 p-4 p-md-5 position-relative overflow-hidden welcome-banner" style="background: var(--primary-gradient) !important;">
                    
                    <!-- Elemen dekoratif latar belakang kartu -->
                    <div class="banner-circle-decoration position-absolute top-0 end-0 translate-middle-y"></div>

                    <!-- Konten Teks Sambutan -->
                    <div class="position-relative z-1">
                        <div class="badge bg-white bg-opacity-20 text-white rounded-pill px-3 py-1 mb-3 small fw-semibold">
                            <i class="bi bi-person-check-fill me-1"></i> Sesi Login Aktif
                        </div>

                        <h2 class="fw-bold mb-2 display-6">Selamat Datang di Dashboard! 🎉</h2>
                        
                        <p class="mb-4 opacity-90 fs-6 fs-md-5 text-light" style="max-width: 650px;">
                            Anda berhasil login ke dalam sistem aplikasi <strong>Tugas Pak Faruq</strong>. 
                            Anda dapat mulai mengelola data postingan, menambahkan artikel baru, serta memperbarui konten tugas dengan mudah.
                        </p>

                        <!-- Tombol CTA menuju menu kelola posts -->
                        <div class="d-flex flex-wrap gap-3">
                            <Link href="/posts" class="btn btn-light text-primary fw-bold rounded-pill px-4 py-2-5 shadow-sm d-inline-flex align-items-center gap-2 hover-lift">
                                <i class="bi bi-file-earmark-text-fill"></i>
                                <span>Kelola Posts Sekarang</span>
                            </Link>

                            <Link href="/posts/create" class="btn btn-outline-light fw-bold rounded-pill px-4 py-2-5 d-inline-flex align-items-center gap-2">
                                <i class="bi bi-plus-circle"></i>
                                <span>Tambah Post Baru</span>
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Kartu Ringkasan Informasi Fitur Cepat -->
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm p-3 h-100 bg-white">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-journal-check fs-4"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Data Posts</div>
                                    <div class="text-muted small">Lihat daftar seluruh artikel</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm p-3 h-100 bg-white">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-lock-fill fs-4"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Keamanan Akun</div>
                                    <div class="text-muted small">Sistem terproteksi autentikasi</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm p-3 h-100 bg-white">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-speedometer2 fs-4"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Akses Cepat</div>
                                    <div class="text-muted small">SPA ditenagai Vue &amp; Inertia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </Layout>
</template>

<style scoped>
/* Dekorasi lingkaran di latar belakang banner */
.banner-circle-decoration {
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}
</style>
