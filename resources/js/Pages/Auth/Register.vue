<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark mb-1">Buat Akun Baru 🚀</h3>
            <p class="text-muted small">Lengkapi data Anda untuk mulai menggunakan aplikasi</p>
        </div>

        <form @submit.prevent="submit">
            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label fw-medium text-secondary small">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted">
                        <i class="bi bi-person"></i>
                    </span>
                    <input
                        id="name"
                        type="text"
                        class="form-control bg-light border-start-0 rounded-end-3 py-2 ps-0"
                        :class="{ 'is-invalid': form.errors.name }"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Nama Anda"
                    />
                </div>
                <InputError class="mt-1" :message="form.errors.name" />
            </div>

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
                        autocomplete="username"
                        placeholder="nama@email.com"
                    />
                </div>
                <InputError class="mt-1" :message="form.errors.email" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-medium text-secondary small">Kata Sandi</label>
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
                        autocomplete="new-password"
                        placeholder="Minimal 8 karakter"
                    />
                </div>
                <InputError class="mt-1" :message="form.errors.password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-medium text-secondary small">Konfirmasi Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted">
                        <i class="bi bi-shield-check"></i>
                    </span>
                    <input
                        id="password_confirmation"
                        type="password"
                        class="form-control bg-light border-start-0 rounded-end-3 py-2 ps-0"
                        :class="{ 'is-invalid': form.errors.password_confirmation }"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Ulangi kata sandi"
                    />
                </div>
                <InputError class="mt-1" :message="form.errors.password_confirmation" />
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="btn btn-gradient-primary w-100 py-2-5 rounded-3 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2"
                :disabled="form.processing"
            >
                <span v-if="form.processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span><i class="bi bi-person-plus-fill me-1"></i> Daftar Akun</span>
            </button>

            <!-- Login Link -->
            <div class="text-center mt-4 pt-2 border-top">
                <p class="small text-muted mb-0">
                    Sudah memiliki akun? 
                    <Link :href="route('login')" class="text-primary fw-bold text-decoration-none ms-1">
                        Masuk di Sini
                    </Link>
                </p>
            </div>
        </form>
    </GuestLayout>
</template>
