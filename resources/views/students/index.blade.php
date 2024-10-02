<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh viên</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Danh sách Sinh viên</h1>

        <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm Sinh viên</a>

        <table class="table">
            <thead>
                <tr>
                    <th>MSSV</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->MSSV }}</td>
                        <td>{{ $student->LastName }}</td>
                        <td>{{ $student->FirstName }}</td>
                        <td>{{ $student->BirthDay }}</td>
                        <td>{{ $student->Gender }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->MSSV) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('students.destroy', $student->MSSV) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
