<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const auth = computed(() => page.props.auth);
</script>

<template>
  <div class="app-layout min-vh-100 d-flex flex-column bg-light-subtle">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm">
      <div class="container">
        <Link class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/">
          <div class="brand-icon-sm">
            <i class="bi bi-rocket-takeoff-fill"></i>
          </div>
          <span>TUGAS PAK FARUQ</span>
        </Link>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
            <li class="nav-item">
              <Link class="nav-link px-3 rounded-2" href="/posts" :class="{ 'active fw-bold': $page.url.startsWith('/posts') }">
                <i class="bi bi-file-text me-1"></i> POSTS
              </Link>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 rounded-2" href="https://santrikoding.com/ebook" target="_blank">
                <i class="bi bi-book me-1"></i> EBOOK
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 rounded-2" href="https://santrikoding.com/tutorial-set" target="_blank">
                <i class="bi bi-collection-play me-1"></i> TUTORIAL SET
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-2">
            <template v-if="auth && auth.user">
              <li class="nav-item text-white fw-medium d-flex align-items-center gap-2 px-2">
                <span class="avatar-sm bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center fw-bold small">
                  {{ auth.user.name ? auth.user.name.charAt(0).toUpperCase() : 'U' }}
                </span>
                <span>{{ auth.user.name }}</span>
              </li>
              <li class="nav-item">
                <Link href="/logout" method="post" as="button" class="btn btn-outline-light btn-sm rounded-pill px-3">
                  <i class="bi bi-box-arrow-right me-1"></i> LOGOUT
                </Link>
              </li>
            </template>
            <template v-else>
              <li class="nav-item">
                <Link href="/login" class="btn btn-outline-light btn-sm rounded-pill px-3">
                  <i class="bi bi-box-arrow-in-right me-1"></i> LOGIN
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/register" class="btn btn-gradient-primary btn-sm rounded-pill px-3">
                  <i class="bi bi-person-plus me-1"></i> REGISTER
                </Link>
              </li>
            </template>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container my-5 flex-grow-1">
      <slot />
    </main>

    <footer class="footer mt-auto py-3 bg-white border-top text-center text-muted small">
      <div class="container">
        &copy; {{ new Date().getFullYear() }} Tugas Pak Faruq • Built with Laravel & Vue 3 + Inertia
      </div>
    </footer>
  </div>
</template>
