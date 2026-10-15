
<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    posts: Array
})
</script>

<template>
    <div>
        <h1>Data Post</h1>

        <Link href="/posts/create">
            TAMBAH DATA
        </Link>

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>TITLE</th>
                    <th>CONTENT</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.title }}</td>
                    <td>{{ post.content }}</td>
                    <td>
                        <Link :href="`/posts/${post.id}/edit`">
                            EDIT
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

