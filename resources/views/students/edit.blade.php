@extends('layouts.root')

@section('content')
<div class="container mt-5">
    <form class="p-4 border rounded shadow-sm bg-light mt-5" method="POST" action="{{route("students.update", ["id" => $student->id])}}">
        @csrf
        <h4 class="mb-3">Chỉnh Sửa Sinh Viên</h4>
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
            <label for="studentName" class="form-label">Tên sinh viên</label>
            <input type="text" name="student_name" value="{{$student->student_name}}" class="form-control" id="studentName" placeholder="Nhập họ tên" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Giới tính</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">-- Chọn giới tính --</option>
                <option value="male" @selected($student->gender === "male")>Nam</option>
                <option value="female" @selected($student->gender === "female")>Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="birthDate" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" value="{{$student->birthday}}" name="birthday" id="birthDate" required>
        </div>

        <div class="mb-3">
            <label for="classSelect" class="form-label">Lớp</label>
            <select class="form-select" name="classes_id" id="classSelect" required>
                <option value="{{$class->id}}">{{$class->class_name}}</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>

    <div class="d-flex justify-content-center mt-2">
        <button class="btn btn-secondary">
            <a href="{{route("classes.show", ["id" => $class->id])}}" class="text-decoration-none text-white">
                Quay Lại
            </a>
        </button>
    </div>
</div>

@endsection
