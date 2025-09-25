<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('course.index', [
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());

        session()->flash('success', 'Registro creado exitosamente');

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
        ]);
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->validated());

        session()->flash('success', 'Registro actualizado exitosamente');

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        session()->flash('success', 'Registro eliminado exitosamente');

        return redirect()->route('courses.index');
    }
}
