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
        $staffs = Staff::with('persons')->get();
        return view('page', compact('staffs','header'));
    }

    public function Show($id)
    {
        $header = "Резюме и вакансии";
        $person = Person::with('staff')->findOrFail($id); // Получаем запись из базы данных по ID
        return view('resume', compact('person', 'header'));
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

    public function create()
    {
        $header = "Добавление";
        $staff = Staff::all();
        return view('resumes.add-content', compact('staff', 'header'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'FIO' => [
                'required',
                'string',
                'max:255',
                'regex:/^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/u'
            ],
            'staff_id' => 'required|exists:staff,id',
            'phone' => [
                'required',
                'string',
                'regex:/^[78]\d{10}$/'
            ],
            'stage' => 'required|integer|min:1',
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

        Person::create($data);

        return redirect()->route('home')->with('success', 'Резюме успешно добавлено!');
    }

    public function edit(Person $person)
    {
        $header = "Редактирование";
        $staff = Staff::all();
        return view('resumes.edit-content', compact('person', 'staff', 'header'));
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'FIO' => [
                'required',
                'string',
                'max:255',
                'regex:/^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/u'
            ],
            'staff_id' => 'required|exists:staff,id',
            'phone' => [
                'required',
                'string',
                'regex:/^[78]\d{10}$/'
            ],
            'stage' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Удаление старого изображения, если оно существует
//            if ($person->image && file_exists(public_path('images/' . $person->image))) {
//                unlink(public_path('images/' . $person->image));
//            }

            // Сохранение нового изображения
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $data['image'] = $fileName;
        }

        $person->update($data);

        return redirect()->route('home')->with('success', 'Резюме успешно обновлено!');
    }

    public function delete(Person $person)
    {
        $person->delete();

        return redirect()->route('home')->with('success', 'Резюме успешно удалено!');
    }
}
