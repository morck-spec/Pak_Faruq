<!-- 
  ==========================================================================
  Layout Utama Aplikasi (App.vue)
  Deskripsi: Komponen layout induk yang membungkus seluruh halaman internal
             (seperti Dashboard, Daftar Posts, Tambah Post, dan Edit Post).
  Fitur: Navigasi responsif (dengan toggler mobile), badge avatar pengguna,
         serta footer konsisten.
  ==========================================================================
-->

<script setup>
// Mengimport Link untuk navigasi SPA tanpa reload dan usePage untuk membaca data session Inertia
import { Link, usePage } from '@inertiajs/vue3';

// Mengimport computed dari Vue untuk reaktivitas status otentikasi
import { computed } from 'vue';

// Mengakses instance page props saat ini
const page = usePage();

// Mengambil data pengguna yang sedang login secara reaktif
const auth = computed(() => page.props.auth);
</script>

<template>
  <!-- Pembungkus layout aplikasi dengan tinggi minimal layar penuh dan struktur flexbox vertikal -->
  <div class="app-layout min-vh-100 d-flex flex-column bg-light-subtle">
    
    <!-- ==========================================================================
         NAVBAR APLIKASI
         Deskripsi: Navigasi atas dengan tema modern gelap dan sticky di bagian atas
         ========================================================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm py-2-5">
      <div class="container">
        
        <!-- Brand / Logo Aplikasi yang mengarah ke halaman utama -->
        <Link class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/">
          <div class="brand-icon-sm shadow-xs">
            <i class="bi bi-rocket-takeoff-fill"></i>
          </div>
          <span class="brand-text">TUGAS PAK FARUQ</span>
        </Link>

        <!-- Tombol Hamburger untuk Layar Ponsel (Mobile Toggler) -->
        <button 
          class="navbar-toggler border-0 shadow-none p-2" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#navbarCollapse" 
          aria-controls="navbarCollapse" 
          aria-expanded="false" 
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Konten Navigasi yang dapat di-collapse pada layar kecil -->
        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarCollapse">
          
          <!-- Menu Navigasi Sisi Kiri -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3 gap-1">
            <!-- Menu Posts / Artikel -->
            <li class="nav-item">
              <Link 
                class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-2" 
                href="/posts" 
                :class="{ 'active fw-bold': $page.url.startsWith('/posts') }"
              >
                <i class="bi bi-file-text"></i>
                <span>POSTS</span>
              </Link>
            </li>
            <!-- Tautan Referensi Ebook Eksternal -->
            <li class="nav-item">
              <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-2" href="https://santrikoding.com/ebook" target="_blank">
                <i class="bi bi-book"></i>
                <span>EBOOK</span>
              </a>
            </li>
            <!-- Tautan Tutorial Eksternal -->
            <li class="nav-item">
              <a class="nav-link px-3 py-2 rounded-3 d-flex align-items-center gap-2" href="https://santrikoding.com/tutorial-set" target="_blank">
                <i class="bi bi-collection-play"></i>
                <span>TUTORIAL SET</span>
              </a>
            </li>
          </ul>

          <!-- Menu Navigasi Sisi Kanan (Status Pengguna & Tombol Keluar/Masuk) -->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-2 pt-2 pt-lg-0 border-top border-lg-0 border-secondary border-opacity-25">
            <!-- Kondisi jika pengguna telah login -->
            <template v-if="auth && auth.user">
              <!-- Avatar inisial dan nama pengguna -->
              <li class="nav-item text-white fw-medium d-flex align-items-center gap-2 px-2 py-1">
                <span class="avatar-sm bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center fw-bold small shadow-sm" style="width: 32px; height: 32px;">
                  {{ auth.user.name ? auth.user.name.charAt(0).toUpperCase() : 'U' }}
                </span>
                <span class="small">{{ auth.user.name }}</span>
              </li>
              <!-- Tombol Logout -->
              <li class="nav-item">
                <Link 
                  href="/logout" 
                  method="post" 
                  as="button" 
                  class="btn btn-outline-light btn-sm rounded-pill px-3 py-1-5 w-100 w-lg-auto d-flex align-items-center justify-content-center gap-1 hover-lift"
                >
                  <i class="bi bi-box-arrow-right"></i>
                  <span>LOGOUT</span>
                </Link>
              </li>
            </template>

            <!-- Kondisi jika pengguna belum login -->
            <template v-else>
              <li class="nav-item">
                <Link href="/login" class="btn btn-outline-light btn-sm rounded-pill px-3 py-1-5 w-100 w-lg-auto d-flex align-items-center justify-content-center gap-1">
                  <i class="bi bi-box-arrow-in-right"></i>
                  <span>LOGIN</span>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/register" class="btn btn-gradient-primary btn-sm rounded-pill px-3 py-1-5 w-100 w-lg-auto d-flex align-items-center justify-content-center gap-1">
                  <i class="bi bi-person-plus"></i>
                  <span>REGISTER</span>
                </Link>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ==========================================================================
         KONTEN UTAMA HALAMAN
         Deskripsi: Tempat di mana halaman anak (child pages) diinjeksikan via slot
         ========================================================================== -->
    <main class="container my-4 my-md-5 flex-grow-1">
      <slot />
    </main>

    <!-- ==========================================================================
         FOOTER APLIKASI
         Deskripsi: Catatan kaki aplikasi yang konsisten di semua halaman internal
         ========================================================================== -->
    <footer class="footer mt-auto py-3 bg-white border-top text-center text-muted small">
      <div class="container">
        &copy; {{ new Date().getFullYear() }} <strong>Tugas Pak Faruq</strong> • Dibangun dengan Laravel &amp; Vue 3 + Inertia
      </div>
    </footer>
  </div>
</template>

<style scoped>
/* Styling khusus layout */
.brand-text {
  letter-spacing: 0.03em;
  font-size: 1.05rem;
}

/* Transisi halus saat link navigasi di-hover */
.nav-link {
  transition: all 0.2s ease;
}

/* Padding tombol kecil */
.py-1-5 {
  padding-top: 0.35rem;
  padding-bottom: 0.35rem;
}
</style>
