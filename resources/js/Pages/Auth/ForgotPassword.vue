<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Lupa Kata Sandi" />

        <div class="text-center mb-4">
            <h3 class="fw-bold text-dark mb-1">Lupa Kata Sandi? 🔑</h3>
            <p class="text-muted small">Masukkan email Anda dan kami akan mengirimkan link untuk reset kata sandi</p>
        </div>

        <div v-if="status" class="alert alert-success border-0 rounded-3 mb-4 shadow-sm text-center">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="mb-4">
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

            <button
                type="submit"
                class="btn btn-gradient-primary w-100 py-2-5 rounded-3 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2"
                :disabled="form.processing"
            >
                <span v-if="form.processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span>Kirim Link Reset Sandi</span>
            </button>

            <div class="text-center mt-4 pt-2 border-top">
                <Link :href="route('login')" class="text-primary fw-bold small text-decoration-none d-inline-flex align-items-center gap-1">
                    <i class="bi bi-arrow-left"></i> Kembali ke Login
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
