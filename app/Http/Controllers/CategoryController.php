<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
   public function getIndex()
{
    $categories = Category::all(); // Trae todas las categorías desde la BD
    return view('category.index', compact('categories'));
}
public function getShow($id)
{
    $category = Category::with('posts')->findOrFail($id);
    return view('category.show', compact('category'));
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'excerpt' => 'nullable|string',
        'content' => 'required|string',
        'image_main' => 'nullable|string',
        'image_2' => 'nullable|string',
        'image_3' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'published' => 'nullable|boolean',
    ]);

    // Opcional: generar slug automáticamente desde el título
    $validatedData['slug'] = Str::slug($validatedData['title']);

    // Si el checkbox de publicar viene tildado
    $validatedData['published'] = $request->has('published');

    Post::create($validatedData);

    return redirect()->route('categories.index')->with('success', 'Post creado correctamente.');
}
    // Mostrar los posts de una categoría específica
    public function getCategoryPosts($region)
    {
        // Busca posts donde el campo 'poster' coincida con la región
        $posts = Post::where('poster', $region)->get();
        return view('category.show', compact('posts', 'region'));
    }

    // Mostrar un solo post completo
    public function getShowPost($id)
    {
        $post = Post::findOrFail($id);
        return view('category.showPost', compact('post'));
    }

    // Mostrar formulario para crear un nuevo post
    public function create()
    {
        $categories = Category::all();
    return view('category.create', compact('categories'));
    }
   public function getEdit($id)
{
    $categories = Category::all();
    $post = Post::findOrFail($id);
    return view('category.edit', compact('post', 'categories'));
}
    public function update(Request $request, $id){
        $post = Post::findOrFail($id);

        // Validar los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'image_main' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Actualizar campos
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;

        // Reemplazar imágenes si hay nuevas
        if ($request->hasFile('image_main')) {
            $post->image_main = $request->file('image_main')->store('posts', 'public');
        }
        if ($request->hasFile('image_2')) {
            $post->image_2 = $request->file('image_2')->store('posts', 'public');
        }
        if ($request->hasFile('image_3')) {
            $post->image_3 = $request->file('image_3')->store('posts', 'public');
        }
        $post->save();
        return redirect()->route('posts.show', $post->id)->with('success', 'Post actualizado correctamente.');
    } 
    public function destroy($id){

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('category.show', $post->category_id)->with('success', 'Post eliminado correctamente.');
    }

}
