<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Hiển thị danh sách sinh viên
    public function index()
    {
        $students = Student::with('classroom')->get();
        return view('students.index', compact('students'));
    }

    // Hiển thị form tạo sinh viên
    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', compact('classrooms'));
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $request->validate([
            'MSSV' => 'required|string|max:255|unique:students',
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'BirthDay' => 'required|date',
            'Gender' => 'required|in:Male,Female',
            'Avatar' => 'nullable|image|max:2048',
            'IdClass' => 'required|exists:classrooms,IdClass',
        ]);

        // Xử lý upload hình ảnh nếu có
        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('avatars', 'public');
            $request->merge(['Avatar' => $avatarPath]);
        }

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được tạo thành công.');
    }

    // Hiển thị form sửa sinh viên
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('students.edit', compact('student', 'classrooms'));
    }

    // Cập nhật sinh viên
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'MSSV' => 'required|string|max:255|unique:students,MSSV,' . $student->id,
            'LastName' => 'required|string|max:255',
            'FirstName' => 'required|string|max:255',
            'BirthDay' => 'required|date',
            'Gender' => 'required|in:Male,Female',
            'Avatar' => 'nullable|image|max:2048',
            'IdClass' => 'required|exists:classrooms,IdClass',
        ]);

        // Xử lý upload hình ảnh nếu có
        if ($request->hasFile('Avatar')) {
            $avatarPath = $request->file('Avatar')->store('avatars', 'public');
            $request->merge(['Avatar' => $avatarPath]);
        }

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được cập nhật thành công.');
    }

    // Xóa sinh viên
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công.');
    }
}
