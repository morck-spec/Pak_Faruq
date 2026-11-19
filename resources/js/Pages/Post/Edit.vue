<!-- 
  ==========================================================================
  Halaman Edit Post (Post/Edit.vue)
  Deskripsi: Formulir untuk mengubah / memperbarui data artikel yang sudah ada.
  Fitur: Mengisi data lama ke dalam form secara otomatis, validasi input,
         dan pengiriman request update (PUT) ke server.
  ==========================================================================
-->

<script setup>
// Mengimport Layout induk aplikasi
import Layout from '../../Layouts/App.vue'

// Mengimport fungsi reactive dari Vue untuk mengikat data form yang dapat diedit
import { reactive } from 'vue'

// Mengimport router untuk mengirimkan request HTTP PUT dan Link untuk navigasi kembali
import { router, Link, Head } from '@inertiajs/vue3'

// Menerima props 'post' (data yang akan diedit) dan 'errors' (jika ada kegagalan validasi)
const props = defineProps({
    post: Object,
    errors: Object
})

// Menginisialisasi state form dengan data post yang sudah ada dari database
const post = reactive({
    title: props.post ? props.post.title : '',
    content: props.post ? props.post.content : ''
})

// Fungsi untuk menangani proses submit perubahan data post
function updatePost() {
    // Mengirimkan request PUT ke route /posts/{id} dengan membawa data yang sudah diperbarui
    router.put(`/posts/${props.post.id}`, post)
}
</script>

<template>
    <Layout>
        <!-- Judul pada tab browser -->
        <Head :title="`Edit Post: ${props.post?.title || ''} - Tugas Pak Faruq`" />

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                
                <!-- Navigasi Kembali & Judul Halaman -->
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
                        <h3 class="fw-bold text-dark m-0">Edit Post</h3>
                        <p class="text-muted small m-0 mt-1">Perbarui judul dan isi konten postingan tugas ini</p>
                    </div>
                </div>

                <!-- Kartu Formulir Edit -->
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form @submit.prevent="updatePost">
                            
                            <!-- Input Judul Postingan (Title) -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary small">JUDUL POSTINGAN (TITLE) <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control form-control-lg bg-light border-0 rounded-3 fs-6" 
                                    :class="{ 'is-invalid border-danger': errors?.title }" 
                                    v-model="post.title" 
                                    placeholder="Masukkan judul postingan..."
                                    required
                                >
                                <!-- Pesan error jika validasi title gagal -->
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
                                    placeholder="Perbarui isi konten postingan di sini..."
                                    required
                                ></textarea>
                                <!-- Pesan error jika validasi content gagal -->
                                <div v-if="errors?.content" class="invalid-feedback mt-1">
                                    {{ errors.content }}
                                </div>
                            </div>

                            <!-- Tombol Aksi: Update dan Reset -->
                            <div class="d-flex flex-wrap gap-2 pt-2">
                                <button type="submit" class="btn btn-gradient-primary rounded-pill px-4 py-2-5 fw-bold shadow-sm d-flex align-items-center gap-2 hover-lift">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>UPDATE DATA</span>
                                </button>
                                <Link href="/posts" class="btn btn-light border rounded-pill px-4 py-2-5 text-secondary fw-semibold">
                                    BATAL
                                </Link>
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
