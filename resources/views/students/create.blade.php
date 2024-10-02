<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh viên</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Liên kết đến file CSS -->
</head>
<body>
    <div class="container">
        <h1>Thêm Sinh viên</h1>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="mssv">MSSV</label>
                <input type="text" class="form-control" id="mssv" name="MSSV" required>
            </div>
            <div class="form-group">
                <label for="lastname">Họ</label>
                <input type="text" class="form-control" id="lastname" name="LastName" required>
            </div>
            <div class="form-group">
                <label for="firstname">Tên</label>
                <input type="text" class="form-control" id="firstname" name="FirstName" required>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh</label>
                <input type="date" class="form-control" id="birthday" name="BirthDay" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select class="form-control" id="gender" name="Gender" required>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
