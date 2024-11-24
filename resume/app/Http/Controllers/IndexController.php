<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Routing\Controller;

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

    // Фамилии персон, имеющих стаж от 5 до 15 лет
    public function GetPersonsWithExperience()
    {
        $header = "Люди со стажем от 5 до 15 лет.";
        $persons = Person::whereBetween('stage', [5, 15])->get(['FIO', 'stage']);
        return view('resumes.experience', compact('persons', 'header'));
    }

// Фамилии и стаж людей с профессией "Программист"
    public function GetProgrammers()
    {
        $header = "Программисты";
        $programmers = Person::join('staff', 'persons.staff_id', '=', 'staff.id')
            ->where('staff.name', 'Программист')
            ->get(['persons.FIO', 'persons.stage']);
        return view('resumes.programmers', compact('programmers', 'header'));
    }

// Общее число резюме в базе
    public function GetTotalResumes()
    {
        $header = "Общее число резюме";
        $total = Person::count();
        return view('resumes.total', compact('total', 'header'));
    }

// Профессии, представители которых имеются в резюме
    public function GetStaffWithResumes()
    {
        $header = "Профессии, представители которых имеются в резюме";
        $professions = Staff::join('persons', 'staff.id', '=', 'persons.staff_id')
            ->distinct()
            ->pluck('staff.name');
        return view('resumes.professions', compact('professions', 'header'));
    }
}
