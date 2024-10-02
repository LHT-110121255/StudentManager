<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lớp học</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Liên kết đến file CSS -->
</head>
<body>
    <div class="container">
        <h1>Thêm Lớp học</h1>

        <form action="{{ route('classrooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên Lớp</label>
                <input type="text" class="form-control" id="name" name="NameClass" required>
            </div>
            <div class="form-group">
                <label for="note">Ghi chú</label>
                <textarea class="form-control" id="note" name="Note"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
