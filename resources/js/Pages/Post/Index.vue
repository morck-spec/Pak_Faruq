<!-- 
  ==========================================================================
  Halaman Daftar Post (Post/Index.vue)
  Deskripsi: Menampilkan tabel daftar seluruh artikel/postingan yang ada di database.
  Fitur: Flash message notifikasi, tombol tambah data, tabel responsif dengan hover,
         tombol edit dan hapus, serta konfirmasi sebelum menghapus data.
  ==========================================================================
-->

<script setup>
// Mengimport Layout induk aplikasi
import Layout from '../../Layouts/App.vue'

// Mengimport Link untuk navigasi cepat dan router untuk mengeksekusi request HTTP seperti delete
import { Link, router, Head } from '@inertiajs/vue3'

// Menerima prop 'posts' yang dikirim dari PostController@index
defineProps({
    posts: Array
});

// Fungsi untuk menangani penghapusan data post berdasarkan id
function deletePost(id) {
    // Menampilkan kotak konfirmasi sebelum melakukan request DELETE ke server
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        // Mengirimkan request DELETE ke route /posts/{id}
        router.delete(`/posts/${id}`);
    }
}
</script>

<template>
    <Layout>
        <!-- Judul Tab Browser -->
        <Head title="Kelola Data Posts" />

        <div class="row">
            <div class="col-md-12">
                
                <!-- Notifikasi Flash Message (misal: Data Berhasil Disimpan / Diupdate / Dihapus) -->
                <div 
                    v-if="$page.props.flash?.message" 
                    class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center gap-3 mb-4 p-3 alert-dismissible fade show" 
                    role="alert"
                >
                    <div class="alert-icon bg-success bg-opacity-10 text-success rounded-circle p-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                    </div>
                    <div class="fw-semibold">{{ $page.props.flash.message }}</div>
                </div>

                <!-- Bagian Header Halaman: Judul & Tombol Tambah Data -->
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
                    <div>
                        <h2 class="fw-bold text-dark m-0 d-flex align-items-center gap-2">
                            <i class="bi bi-journal-text text-primary"></i>
                            <span>Data Posts</span>
                        </h2>
                        <p class="text-muted small m-0 mt-1">Kelola seluruh postingan artikel &amp; konten tugas Anda di sini</p>
                    </div>

                    <!-- Tombol Menuju Halaman Tambah Postingan Baru -->
                    <Link href="/posts/create" class="btn btn-gradient-primary rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2 hover-lift">
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>TAMBAH DATA</span>
                    </Link>
                </div>

                <!-- Kartu Pembungkus Tabel Data -->
                <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
                    <div class="card-body p-0">
                        
                        <!-- Wrapper responsif agar tabel bisa digeser menyamping dengan rapi di smartphone -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 custom-table">
                                <!-- Baris Judul Kolom Tabel -->
                                <thead class="table-light border-bottom">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-uppercase text-secondary fs-7 fw-bold">TITLE</th>
                                        <th scope="col" class="px-4 py-3 text-uppercase text-secondary fs-7 fw-bold">CONTENT</th>
                                        <th scope="col" class="px-4 py-3 text-uppercase text-secondary fs-7 fw-bold text-end">ACTIONS</th>
                                    </tr>
                                </thead>
                                
                                <!-- Isi Data Tabel -->
                                <tbody>
                                    <!-- Keadaan jika data masih kosong -->
                                    <tr v-if="!posts || posts.length === 0">
                                        <td colspan="3" class="text-center py-5 text-muted">
                                            <div class="empty-state py-4">
                                                <i class="bi bi-inbox fs-1 d-block mb-3 text-secondary opacity-50"></i>
                                                <h6 class="fw-bold text-dark">Belum ada data post</h6>
                                                <p class="small text-muted mb-3">Mulai buat postingan pertama Anda dengan menekan tombol Tambah Data.</p>
                                                <Link href="/posts/create" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                    <i class="bi bi-plus-lg me-1"></i> Buat Post Baru
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Melakukan perulangan untuk menampilkan setiap baris data postingan -->
                                    <tr v-for="post in posts" :key="post.id" class="table-row-item">
                                        <!-- Kolom Judul Post -->
                                        <td class="px-4 py-3">
                                            <div class="fw-semibold text-dark">{{ post.title }}</div>
                                        </td>

                                        <!-- Kolom Konten Post (dengan truncate agar tidak merusak layout jika teks panjang) -->
                                        <td class="px-4 py-3 text-secondary text-truncate" style="max-width: 320px;">
                                            {{ post.content }}
                                        </td>

                                        <!-- Kolom Tombol Aksi (Edit dan Hapus) -->
                                        <td class="px-4 py-3 text-end">
                                            <div class="d-inline-flex gap-2">
                                                <!-- Tombol Edit: Mengarah ke halaman form edit post -->
                                                <Link 
                                                    :href="`/posts/${post.id}/edit`" 
                                                    class="btn btn-sm btn-outline-primary rounded-pill px-3 d-inline-flex align-items-center gap-1 hover-lift"
                                                    title="Edit Data"
                                                >
                                                    <i class="bi bi-pencil-square"></i>
                                                    <span>EDIT</span>
                                                </Link>

                                                <!-- Tombol Delete: Menjalankan konfirmasi dan penghapusan data -->
                                                <button 
                                                    @click.prevent="deletePost(`${post.id}`)" 
                                                    class="btn btn-sm btn-outline-danger rounded-pill px-3 d-inline-flex align-items-center gap-1 hover-lift"
                                                    title="Hapus Data"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                    <span>DELETE</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </Layout>
</template>

<style scoped>
/* Styling icon notifikasi flash message */
.alert-icon {
    width: 36px;
    height: 36px;
}

/* Transisi halus saat kursor mengarah ke baris tabel */
.table-row-item {
    transition: background-color 0.15s ease;
}

.table-row-item:hover {
    background-color: #f8fafc;
}

/* Penataan padding header tabel */
.custom-table th {
    letter-spacing: 0.05em;
    font-size: 0.75rem;
}
</style>
