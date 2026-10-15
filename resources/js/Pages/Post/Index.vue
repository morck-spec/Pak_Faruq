<script setup>
import Layout from '../../Layouts/App.vue'
import { Link, router } from '@inertiajs/vue3'

defineProps({
    posts: Array
});

function deletePost(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        router.delete(`/posts/${id}`)
    }
}
</script>

<template>
    <Layout>
        <div class="row">
            <div class="col-md-12">
                <!-- Flash Message -->
                <div v-if="$page.props.flash?.message" class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ $page.props.flash.message }}</div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark m-0">Data Posts</h2>
                        <p class="text-muted small m-0">Kelola postingan artikel & konten Anda di sini</p>
                    </div>
                    <Link href="/posts/create" class="btn btn-gradient-primary rounded-3 shadow-sm d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle-fill"></i> TAMBAH DATA
                    </Link>
                </div>

                <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 text-uppercase text-secondary fs-7 fw-bold">TITLE</th>
                                        <th scope="col" class="px-4 py-3 text-uppercase text-secondary fs-7 fw-bold">CONTENT</th>
                                        <th scope="col" class="px-4 py-3 text-uppercase text-secondary fs-7 fw-bold text-end">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!posts || posts.length === 0">
                                        <td colspan="3" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                            <span>Belum ada data post. Silakan tambah data baru!</span>
                                        </td>
                                    </tr>
                                    <tr v-for="post in posts" :key="post.id">
                                        <td class="px-4 py-3 fw-semibold text-dark">{{ post.title }}</td>
                                        <td class="px-4 py-3 text-secondary text-truncate" style="max-width: 300px;">{{ post.content }}</td>
                                        <td class="px-4 py-3 text-end">
                                            <div class="d-inline-flex gap-2">
                                                <Link :href="`/posts/${post.id}/edit`" class="btn btn-sm btn-outline-primary rounded-2 d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> EDIT
                                                </Link>
                                                <button @click.prevent="deletePost(`${post.id}`)" class="btn btn-sm btn-outline-danger rounded-2 d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-trash"></i> DELETE
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
