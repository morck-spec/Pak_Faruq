<script setup>
import Layout from '@/Layouts/App.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Layout>
        <Head title="Dashboard" />

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 rounded-4 shadow-sm text-white mb-4 p-4 p-md-5 position-relative overflow-hidden" style="background: var(--primary-gradient) !important;">
                    <div class="position-relative z-1">
                        <h2 class="fw-bold mb-2">Selamat Datang di Dashboard! 🎉</h2>
                        <p class="mb-4 opacity-90 fs-5">Anda berhasil login ke dalam sistem aplikasi Tugas Pak Faruq. Anda dapat mengelola postingan artikel dan konten dengan mudah.</p>
                        <Link href="/posts" class="btn btn-light text-primary fw-bold rounded-pill px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2">
                            <i class="bi bi-file-earmark-text-fill"></i> Kelola Posts Sekarang
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
