<?php

use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/students/create', function () {
    $student = new Student();
    $student->first_name = 'Mark Steven';
    $student->last_name = 'Peligro';
    $student->age = '20';
    $student->email = 'smorphyguy12@gmail.com';
    $student->save();
    return 'Student Created!';
});

Route::get('/students', function () {
    $student = Student::all();
    return $student;
});

Route::get('/students/update', function () {
    $student = Student::where('email', 'smorphyguy12@gmail.com')->first();
    $student->email = 'markpeligro1234@gmail.com';
    $student->save();
    return 'Student Updated!';
});

Route::get('students/delete', function() {
    $student = Student::where('email', 'markpeligro1234@gmail.com')->first();
    $student->delete();
    return 'Student Delete';
});

Route::get('courses/create', function () {
    $course = new Course();
    $course->course_name = "Introduction to Databases";
    $course->save();
    return 'Course Created!';

});

Route::get('/course/{id}/students', function ($id) {
    $course = Course::find($id);
    return $course->student;
});