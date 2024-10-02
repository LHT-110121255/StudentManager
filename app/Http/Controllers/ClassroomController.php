<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    // Hiển thị danh sách lớp học
    public function index()
    {
        $classrooms = Classroom::with('students')->get(); // Lấy danh sách lớp học kèm theo sinh viên
        return view('classrooms.index', compact('classrooms'));
    }

    // Hiển thị form tạo lớp học
    public function create()
    {
        return view('classrooms.create');
    }

    // Lưu lớp học mới
    public function store(Request $request)
    {
        $request->validate([
            'NameClass' => 'required|string|max:255',
            'Note' => 'nullable|string',
        ]);

        Classroom::create($request->all()); // Tạo lớp học mới
        return redirect()->route('classrooms.index')->with('success', 'Lớp học đã được tạo thành công.');
    }

    // Hiển thị form sửa lớp học
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    // Cập nhật lớp học
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'NameClass' => 'required|string|max:255',
            'Note' => 'nullable|string',
        ]);

        $classroom->update($request->all()); // Cập nhật thông tin lớp học
        return redirect()->route('classrooms.index')->with('success', 'Lớp học đã được cập nhật thành công.');
    }

    // Xóa lớp học (giả)
    public function destroy(Classroom $classroom)
    {
        if ($classroom->students()->count() > 0) {
            // Nếu lớp học có sinh viên, xóa tất cả sinh viên trước
            $classroom->students()->delete();
        }

        $classroom->delete(); // Xóa lớp học
        return redirect()->route('classrooms.index')->with('success', 'Lớp học đã được xóa thành công.');
    }
}
