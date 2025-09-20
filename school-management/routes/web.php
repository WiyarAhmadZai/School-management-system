<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Post;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PostController::class, 'showHomepagePosts'])->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('/dashboard');
})->name('register.post');

Route::get('/dashboard', function () {
    // Get statistics for the dashboard
    $totalStudents = Student::count();
    $totalTeachers = Teacher::count();
    $totalCourses = Course::count();
    $totalPosts = Post::count();

    // Get recent activities
    $recentStudents = Student::latest()->take(5)->get();
    $recentTeachers = Teacher::latest()->take(5)->get();
    $recentPosts = Post::with('user')->latest()->take(5)->get();

    return view('dashboard.index', compact(
        'totalStudents',
        'totalTeachers',
        'totalCourses',
        'totalPosts',
        'recentStudents',
        'recentTeachers',
        'recentPosts'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Students routes
    Route::resource('students', StudentController::class);

    // Teachers routes
    Route::resource('teachers', TeacherController::class);

    // Courses routes
    Route::resource('courses', CourseController::class);

    // Grades routes
    Route::resource('grades', GradeController::class);

    // Posts routes
    Route::resource('posts', PostController::class);
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/share', [PostController::class, 'share'])->name('posts.share');
    Route::get('/posts/{post}/likes', [PostController::class, 'showLikes'])->name('posts.likes');

    // News page route
    Route::get('/news', [PostController::class, 'index'])->name('news.index');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
