<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Mostrar', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return Inertia::render('FormCrear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        try {
            $create = Post::create($request->only('title', 'author'));
            dd($create);
            return Redirect::route('posts.index')->with('success', 'Post creado correctamente');
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Hubo un error al guardar el post.']);
        }
    }

    public function edit(Post $post)
    {
        return Inertia::render('FormEditar', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'title' => 'required',
                'author' => 'required'
            ]);
            throw new Exception('error test');
            $test = POST::where('id', $id)->update($request->only('title', 'author'));
            return Redirect::route('posts.index')->with('success', 'Post actualizado correctamente');
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Hubo un error al guardar el post.']);
        }
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return Redirect::route('posts.index')->with('success', 'Post eliminado correctamente');
        } catch (Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Hubo un error al eliminar el post.']);
        }
    }
}
