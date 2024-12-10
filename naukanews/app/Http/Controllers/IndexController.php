<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function Index()
    {
        $header = "Новости науки";
        $rubrics = Rubric::all();
        $articles = Article::with('rubric')->orderBy('created_at', 'desc')->get();

        return view('index', compact('header', 'rubrics', 'articles'));
    }

    public function Rubric($rubric_id)
    {
        $header = "Новости науки";
        $rubrics = Rubric::all();
        $rubric = Rubric::with('articles')->findOrFail($rubric_id);
        $articles = $rubric->articles;

        return view('rubric', compact('header', 'rubrics', 'rubric', 'articles'));
    }

    public function Article($id)
    {
        $rubrics = Rubric::all();
        $article = Article::with('rubric')->findOrFail($id);

        return view('article', compact('rubrics', 'article'));
    }

    public function AddArticle()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $rubrics = Rubric::all();
            return view('add', compact('rubrics'));
        }

        return redirect()->route('index');
    }

    public function Store(Request $request)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $request->validate([
                'title' => 'required|string|max:255',
                'lid' => 'required|string|max:255',
                'content' => 'required|string|max:10000',
                'rubric_id' => 'required|exists:rubrics,id',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $data = $request->all();

            if ($request->hasFile('image')) {
                // Сохранение файла и получение имени
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName(); // Генерация уникального имени
                $file->move(public_path('images'), $fileName); // Сохранение в public/images
                $data['image'] = $fileName; // Сохраняем только имя файла
            }

            Article::create($data);

            return redirect()->route('index')->with('success', 'Статья успешно добавлена.');
        }

        return redirect()->route('index');
    }

    public function Delete($id)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $article = Article::findOrFail($id);

            $article->delete();

            return redirect()->route('index')->with('success', 'Статья успешно удалена.');
        }

        return redirect()->route('index');
    }
}
