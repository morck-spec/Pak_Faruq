<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="text-center mb-4">
            <div class="mb-3">
                <Link href="/" class="text-decoration-none text-muted small hover-primary transition">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                </Link>
            </div>
            <h3 class="fw-bold text-dark mb-1">Selamat Datang Kembali! 👋</h3>
            <p class="text-muted small">Silakan masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <div v-if="status" class="alert alert-success border-0 rounded-3 mb-4 shadow-sm text-center">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-medium text-secondary small">Alamat Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input
                        id="email"
                        type="email"
                        class="form-control bg-light border-start-0 rounded-end-3 py-2 ps-0"
                        :class="{ 'is-invalid': form.errors.email }"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="nama@email.com"
                    />
                </div>
                <InputError class="mt-1" :message="form.errors.email" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label for="password" class="form-label fw-medium text-secondary small mb-0">Kata Sandi</label>
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-decoration-none small text-primary fw-semibold"
                    >
                        Lupa sandi?
                    </Link>
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input
                        id="password"
                        type="password"
                        class="form-control bg-light border-start-0 rounded-end-3 py-2 ps-0"
                        :class="{ 'is-invalid': form.errors.password }"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                    />
                </div>
                <InputError class="mt-1" :message="form.errors.password" />
            </div>

            <!-- Remember me -->
            <div class="mb-4 form-check">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    id="remember" 
                    v-model="form.remember"
                />
                <label class="form-check-label small text-secondary" for="remember">
                    Ingat saya di perangkat ini
                </label>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="btn btn-gradient-primary w-100 py-2-5 rounded-3 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2"
                :disabled="form.processing"
            >
                <span v-if="form.processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span><i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang</span>
            </button>

            <!-- Register Link -->
            <div class="text-center mt-4 pt-2 border-top">
                <p class="small text-muted mb-0">
                    Belum punya akun? 
                    <Link :href="route('register')" class="text-primary fw-bold text-decoration-none ms-1">
                        Daftar Akun Baru
                    </Link>
                </p>
            </div>
        </form>
    </GuestLayout>
</template>
