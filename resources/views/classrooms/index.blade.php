<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Lớp học</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Liên kết đến file CSS -->
</head>
<body>
    <div class="container">
        <h1>Danh sách Lớp học</h1>

        <a href="{{ route('classrooms.create') }}" class="btn btn-primary">Thêm Lớp học</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Lớp</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                    <tr>
                        <td>{{ $classroom->IdClass }}</td>
                        <td>{{ $classroom->NameClass }}</td>
                        <td>{{ $classroom->Note }}</td>
                        <td>
                            <a href="{{ route('classrooms.edit', $classroom->IdClass) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('classrooms.destroy', $classroom->IdClass) }}" method="POST" style="display:inline;">
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
