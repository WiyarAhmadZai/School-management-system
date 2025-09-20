<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('teacher')->paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses,code|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id',
            'class' => 'nullable|string|max:50',
            'department' => 'nullable|string|max:100',
            'credits' => 'required|integer|min:1|max:10',
            'status' => 'required|string|in:active,inactive',
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->code = $request->code;
        $course->description = $request->description;
        $course->teacher_id = $request->teacher_id;
        $course->class = $request->class;
        $course->department = $request->department;
        $course->credits = $request->credits;
        $course->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
            $course->image = $imagePath;
        }

        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('teacher');
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses,code,' . $course->id . '|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|exists:teachers,id',
            'class' => 'nullable|string|max:50',
            'department' => 'nullable|string|max:100',
            'credits' => 'required|integer|min:1|max:10',
            'status' => 'required|string|in:active,inactive',
        ]);

        $course->name = $request->name;
        $course->code = $request->code;
        $course->description = $request->description;
        $course->teacher_id = $request->teacher_id;
        $course->class = $request->class;
        $course->department = $request->department;
        $course->credits = $request->credits;
        $course->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $imagePath = $request->file('image')->store('courses', 'public');
            $course->image = $imagePath;
        }

        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
