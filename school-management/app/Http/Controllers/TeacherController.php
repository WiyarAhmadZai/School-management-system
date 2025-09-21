<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Teacher::query();

        // Apply search filter
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('department', 'like', "%{$search}%");
            });
        }

        // Apply subject filter
        if ($request->has('subject') && $request->subject) {
            $query->where('subject', $request->subject);
        }

        // Apply department filter
        if ($request->has('department') && $request->department) {
            $query->where('department', $request->department);
        }

        // Apply status filter
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $teachers = $query->paginate(10)->appends($request->except('page'));

        // Get unique subjects and departments for filter dropdowns
        $subjects = Teacher::select('subject')->distinct()->orderBy('subject')->pluck('subject');
        $departments = Teacher::select('department')->distinct()->orderBy('department')->pluck('department');
        $statuses = ['active', 'inactive', 'on_leave'];

        return view('teachers.index', compact('teachers', 'subjects', 'departments', 'statuses'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'status' => 'required|string|in:active,inactive,on_leave',
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->subject = $request->subject;
        $teacher->department = $request->department;
        $teacher->qualification = $request->qualification;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->salary = $request->salary;
        $teacher->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teachers', 'public');
            $teacher->image = $imagePath;
        }

        $teacher->save();

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:100',
            'qualification' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'status' => 'required|string|in:active,inactive,on_leave',
        ]);

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->subject = $request->subject;
        $teacher->department = $request->department;
        $teacher->qualification = $request->qualification;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->salary = $request->salary;
        $teacher->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            $imagePath = $request->file('image')->store('teachers', 'public');
            $teacher->image = $imagePath;
        }

        $teacher->save();

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
