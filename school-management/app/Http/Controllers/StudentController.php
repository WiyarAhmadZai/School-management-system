<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'class' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'nullable|string|max:20',
            'status' => 'required|string|in:active,inactive,on_leave',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->parent_name = $request->parent_name;
        $student->parent_phone = $request->parent_phone;
        $student->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students', 'public');
            $student->image = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'class' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'parent_name' => 'nullable|string|max:255',
            'parent_phone' => 'nullable|string|max:20',
            'status' => 'required|string|in:active,inactive,on_leave',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->parent_name = $request->parent_name;
        $student->parent_phone = $request->parent_phone;
        $student->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $imagePath = $request->file('image')->store('students', 'public');
            $student->image = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
