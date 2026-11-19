<?php

// Menentukan namespace lokasi file ini berada, yaitu di dalam folder App\Http\Controllers
namespace App\Http\Controllers;

// Mengimport Model Post untuk berinteraksi dengan tabel 'posts' di database
use App\Models\Post;

// Mengimport class Inertia untuk merender komponen frontend (seperti Vue/React)
use Inertia\Inertia;

// Mengimport tipe data Response dari Inertia sebagai return type method controller
use Inertia\Response;

// Mengimport class Request untuk menangkap data yang dikirim dari HTTP request/form
use Illuminate\Http\Request;

// Mengimport tipe data RedirectResponse untuk return type redirect
use Illuminate\Http\RedirectResponse;

// Mengimport Facade Redirect untuk melakukan pengalihan halaman (redirect route)
use Illuminate\Support\Facades\Redirect;

// Mendefinisikan class PostController yang mewarisi (extends) fitur dasar dari Controller
class PostController extends Controller
{
    /**
     * index
     *
     * @return Response
     */
    // Method/fungsi 'index': Digunakan untuk menampilkan daftar semua postingan (halaman utama posts)
    // Bentuk: Public function tanpa parameter dengan return type Response
    public function index(): Response
    {
        // Mengambil semua data postingan dari database melalui model Post,
        // diurutkan dari yang paling terbaru (latest() / ORDER BY created_at DESC)
        // get all posts from database
        $posts = Post::latest()->get();

        // Mengembalikan tampilan (view) komponen frontend 'Post/Index' melalui Inertia
        // sambil membawa data '$posts' sebagai props
        // render with data "posts"
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * create
     *
     * @return Response
     */
    // Method/fungsi 'create': Digunakan untuk menampilkan form input pembuatan post baru
    // Bentuk: Public function tanpa parameter dengan return type Response
    public function create(): Response
    {
        // Merender dan menampilkan halaman formulir tambah data 'Post/Create'
        return Inertia::render('Post/Create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return RedirectResponse
     */
    // Method/fungsi 'store': Digunakan untuk menerima dan menyimpan data post baru ke database
    // Bentuk: Menerima parameter $request (objek Request) dan mengembalikan tipe RedirectResponse
    public function store(Request $request): RedirectResponse
    {
        // Melakukan validasi input form: memastikan input 'title' dan 'content' wajib diisi (required)
        // set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        // Menyimpan data post baru ke tabel database menggunakan metode mass assignment Eloquent
        // create post
        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        // Mengalihkan (redirect) pengguna kembali ke route 'posts.index'
        // dan mengirimkan pesan flash session bahwa data berhasil disimpan
        return Redirect::route('posts.index')->with('message', 'Data Berhasil Disimpan!');
    }

    /**
     * edit
     *
     * @param Post $post
     * @return Response
     */
    // Method/fungsi 'edit': Digunakan untuk menampilkan form edit beserta data post yang ingin diubah
    // Bentuk: Menggunakan Route Model Binding (Post $post) untuk mencari data post otomatis berdasarkan ID
    public function edit(Post $post): Response
    {
        // Merender tampilan form edit 'Post/Edit' sambil mengirimkan data '$post' yang dipilih sebagai props
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }

    /**
     * update
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    // Method/fungsi 'update': Digunakan untuk memperbarui data post yang ada di database
    // Bentuk: Menerima $request (data baru dari form) dan $post (data lama dari database yang akan diupdate)
    public function update(Request $request, Post $post): RedirectResponse
    {
        // Melakukan validasi input: memastikan 'title' dan 'content' tidak boleh kosong
        // set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        // Memperbarui data post di database dengan data baru dari request
        // update post
        $post->update([
            'title'   => $request->title,
            'content' => $request->content
        ]);

        // Mengalihkan kembali ke route 'posts.index' dengan flash session pesan berhasil
        return Redirect::route('posts.index')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * destroy
     *
     * @param Post $post
     * @return RedirectResponse
     */
    // Method/fungsi 'destroy': Digunakan untuk menghapus data post tertentu dari database
    // Bentuk: Menggunakan Route Model Binding (Post $post) untuk menentukan post mana yang dihapus
    public function destroy(Post $post): RedirectResponse
    {
        // Menghapus data post yang dipilih dari database
        // delete post
        $post->delete();

        // Mengalihkan kembali ke route 'posts.index' dengan pesan bahwa data berhasil dihapus
        return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
    }
}
