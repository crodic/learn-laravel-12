@extends('layouts.root')

@section('content')
<div class="container mt-5">
    <form class="p-4 border rounded shadow-sm bg-light mt-5" method="POST" action="{{route("students.store")}}">
        @csrf
        <h4 class="mb-3">Thêm Sinh Viên</h4>

        <div class="mb-3">
            <label for="studentName" class="form-label">Tên sinh viên</label>
            <input type="text" name="student_name" class="form-control" id="studentName" placeholder="Nhập họ tên" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Giới tính</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">-- Chọn giới tính --</option>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="birthDate" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="birthday" id="birthDate" required>
        </div>

        <div class="mb-3">
            <label for="classSelect" class="form-label">Lớp</label>
            <select class="form-select" name="classes_id" id="classSelect" required>
                <option value="{{$class->id}}">{{$class->class_name}}</option>
            </select>
        </div>

        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-success">Thêm sinh viên</button>
            <button type="button" class="btn btn-danger">
                <a href="{{route("classes.show", ["id" => $class->id])}}" class="text-decoration-none text-white">
                    Huỷ bỏ
                </a>
            </button>
        </div>
    </form>
</div>

@endsection
