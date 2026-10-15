<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="auth-wrapper min-vh-100 d-flex align-items-center justify-content-center p-3">
        <div class="auth-card-container">
            <div class="text-center mb-4">
                <Link href="/" class="d-inline-flex align-items-center text-decoration-none gap-2">
                    <div class="brand-icon-wrapper">
                        <i class="bi bi-box-seam-fill brand-icon"></i>
                    </div>
                    <span class="brand-title">TUGAS PAK FARUQ</span>
                </Link>
            </div>
            
            <div class="auth-card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="auth-card-body p-4 p-md-5">
                    <slot />
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted small mb-0">&copy; {{ new Date().getFullYear() }} Tugas Pak Faruq • Powered by Laravel & Vue 3</p>
            </div>
        </div>
    </div>
</template>
