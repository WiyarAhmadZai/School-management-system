<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'status' => 'required|string|in:active,inactive,on_leave',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'status' => 'required|string|in:active,inactive,on_leave',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}