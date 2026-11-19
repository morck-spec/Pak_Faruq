<!-- 
  ==========================================================================
  Halaman Tambah Post (Post/Create.vue)
  Deskripsi: Formulir untuk menambahkan artikel/postingan baru ke database.
  Fitur: Validasi input otomatis, penanganan pesan error, dan pengalihan ke daftar post.
  ==========================================================================
-->

<script setup>
// Mengimport Layout induk aplikasi
import Layout from '../../Layouts/App.vue'

// Mengimport fungsi reactive dari Vue untuk membuat objek state form
import { reactive } from 'vue'

// Mengimport router untuk mengirimkan data via POST dan Link untuk navigasi kembali
import { router, Link, Head } from '@inertiajs/vue3'

// Menerima pesan error validasi dari server (PostController@store)
defineProps({
    errors: Object
})

// Membuat objek reaktif untuk menampung nilai input form title dan content
const post = reactive({
    title: '',
    content: ''
})

// Fungsi untuk menangani proses submit form penambahan post baru
function storePost() {
    // Mengirim data post ke endpoint backend POST /posts
    router.post('/posts', post)
}
</script>

<template>
    <Layout>
        <!-- Judul pada tab browser -->
        <Head title="Tambah Post Baru - Tugas Pak Faruq" />

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                
                <!-- Navigasi Kembali & Judul Formulir -->
                <div class="d-flex align-items-center mb-4 gap-3">
                    <!-- Tombol Kembali ke Daftar Post -->
                    <Link 
                        href="/posts" 
                        class="btn btn-white border rounded-circle shadow-xs p-2 d-flex align-items-center justify-content-center hover-lift" 
                        style="width: 42px; height: 42px;"
                        title="Kembali ke Daftar Post"
                    >
                        <i class="bi bi-arrow-left fs-5 text-dark"></i>
                    </Link>
                    <div>
                        <h3 class="fw-bold text-dark m-0">Tambah Post Baru</h3>
                        <p class="text-muted small m-0 mt-1">Buat dan simpan artikel atau postingan tugas baru ke database</p>
                    </div>
                </div>

                <!-- Kartu Formulir Input -->
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form @submit.prevent="storePost">
                            
                            <!-- Input Judul Postingan (Title) -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary small">JUDUL POSTINGAN (TITLE) <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 fs-6" 
                                    :class="{ 'is-invalid border-danger': errors?.title }" 
                                    v-model="post.title" 
                                    placeholder="Masukkan judul postingan tugas..."
                                    required
                                >
                                <!-- Menampilkan pesan error validasi jika title kosong/salah -->
                                <div v-if="errors?.title" class="invalid-feedback mt-1">
                                    {{ errors.title }}
                                </div>
                            </div>

                            <!-- Input Konten Postingan (Content) -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary small">KONTEN / ISI POSTINGAN <span class="text-danger">*</span></label>
                                <textarea 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 fs-6" 
                                    rows="6" 
                                    :class="{ 'is-invalid border-danger': errors?.content }" 
                                    v-model="post.content" 
                                    placeholder="Tuliskan isi atau detail postingan tugas di sini..."
                                    required
                                ></textarea>
                                <!-- Menampilkan pesan error validasi jika content kosong/salah -->
                                <div v-if="errors?.content" class="invalid-feedback mt-1">
                                    {{ errors.content }}
                                </div>
                            </div>

                            <!-- Tombol Aksi: Simpan dan Reset -->
                            <div class="d-flex flex-wrap gap-2 pt-2">
                                <button type="submit" class="btn btn-gradient-primary rounded-pill px-4 py-2-5 fw-bold shadow-sm d-flex align-items-center gap-2 hover-lift">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>SIMPAN DATA</span>
                                </button>
                                <button type="reset" class="btn btn-light border rounded-pill px-4 py-2-5 text-secondary fw-semibold">
                                    RESET
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </Layout>
</template>

<style scoped>
/* Styling bayangan lembut */
.shadow-xs {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
</style>
