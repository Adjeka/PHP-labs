<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class IndexController extends Controller
{
    public function Index()
    {
        $header = "Резюме и вакансии";
        return view('page', compact('header'));
    }

    public function Show()
    {
        $header = "Резюме и вакансии";
        $data = [
            'Фамилия' => 'Иванов',
            'Профессия' => 'Программист',
            'Телефон' => '55-55-55',
            'Стаж' => '4 года',
            'Аватар' => 'ava1.jpg',
        ];
        return view('resume', compact('data', 'header'));
    }

    public function getPeopleWithExperience()
    {
        $resumes = Person::whereBetween('experience', [5, 15])
            ->select('last_name')
            ->get();

        return view('resumes.experience', compact('resumes'));
    }

    public function getProgrammers()
    {
        $resumes = Person::where('profession', 'Программист')
            ->select('last_name', 'experience')
            ->get();

        return view('resumes.programmers', compact('resumes'));
    }

    public function getTotalResumes()
    {
        $total = Person::count();

        return view('resumes.total', compact('total'));
    }

    public function getProfessions()
    {
        $professions = Person::distinct()
            ->pluck('profession');

        return view('resumes.professions', compact('professions'));
    }
}
