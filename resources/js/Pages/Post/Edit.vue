<script setup>
import Layout from '../../Layouts/App.vue'
import { reactive } from 'vue'
import { router, Link } from '@inertiajs/vue3'

const props = defineProps({
    post: Object,
    errors: Object
})

const post = reactive({
    title: props.post ? props.post.title : '',
    content: props.post ? props.post.content : ''
})

function updatePost() {
    router.put(`/posts/${props.post.id}`, post)
}
</script>

<template>
    <Layout>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex align-items-center mb-4 gap-2">
                    <Link href="/posts" class="btn btn-light rounded-circle shadow-sm p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </Link>
                    <div>
                        <h3 class="fw-bold text-dark m-0">Edit Post</h3>
                        <p class="text-muted small m-0">Perbarui informasi postingan Anda</p>
                    </div>
                </div>

                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form @submit.prevent="updatePost">
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary">TITLE POST</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0 rounded-3 fs-6" :class="{ 'is-invalid': errors?.title }" v-model="post.title" placeholder="Masukkan Title Post">
                                <div v-if="errors?.title" class="invalid-feedback mt-1">
                                    {{ errors.title }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary">CONTENT POST</label>
                                <textarea class="form-control form-control-lg bg-light border-0 rounded-3 fs-6" rows="6" :class="{ 'is-invalid': errors?.content }" v-model="post.content" placeholder="Masukkan Content Post"></textarea>
                                <div v-if="errors?.content" class="invalid-feedback mt-1">
                                    {{ errors.content }}
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-gradient-primary rounded-3 px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill"></i> UPDATE
                                </button>
                                <button type="reset" class="btn btn-light border rounded-3 px-4 py-2 text-secondary fw-semibold">
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
