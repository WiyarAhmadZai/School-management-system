<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Grade::with(['student', 'course']);

        // Apply search filter
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('student', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('course', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhere('grade', 'like', "%{$search}%");
            });
        }

        // Apply course filter
        if ($request->has('course_id') && $request->course_id) {
            $query->where('course_id', $request->course_id);
        }

        // Apply class filter (based on course class)
        if ($request->has('class') && $request->class) {
            $query->whereHas('course', function ($q) use ($request) {
                $q->where('class', $request->class);
            });
        }

        $grades = $query->paginate(10)->appends($request->except('page'));

        // Get unique courses and classes for filter dropdowns
        $courses = Course::orderBy('name')->pluck('name', 'id');
        $classes = Course::select('class')->distinct()->orderBy('class')->pluck('class');

        return view('grades.index', compact('grades', 'courses', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('grades.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'required|string|max:5',
            'marks' => 'nullable|numeric|min:0|max:100',
            'remarks' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        $grade->load(['student', 'course']);
        return view('grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        $students = Student::all();
        $courses = Course::all();
        return view('grades.edit', compact('grade', 'students', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'grade' => 'required|string|max:5',
            'marks' => 'nullable|numeric|min:0|max:100',
            'remarks' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')
            ->with('success', 'Grade deleted successfully.');
    }
}
