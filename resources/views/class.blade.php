@php
$mappingGender = [
"male" => "Nam",
"female" => "Nữ"
];
@endphp

@extends('layouts.root')

@section('content')
<div class="container mt-5">

    <!-- Thông tin lớp học -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Thông tin lớp học</h4>
            <p><strong>Tên lớp: </strong>{{$class->class_name}}</p>
            <p><strong>Tên Khoa: </strong>{{$class->department}}</p>
        </div>
    </div>

    <!-- Danh sách sinh viên -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Danh sách sinh viên</h5>
                <div>
                    <button class="btn btn-primary">
                        <a href="{{route("students.create", ["classId" => $class->id])}}" class="text-decoration-none text-white">
                            Thêm sinh viên
                        </a>
                    </button>
                </div>
            </div>

            <table class="table table-striped table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu mẫu -->
                    @forelse($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->student_name}}</td>
                        <td>{{$mappingGender[$student->gender]}}</td>
                        <td>{{$student->birthday}}</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-1">
                                <a href="{{route("students.edit", ["studentId" => $student->id])}}" class="text-decoration-none text-white">
                                    Sửa
                                </a>
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <a href="{{route("students.destroy", ["id" => $student->id])}}" class="text-decoration-none text-white">
                                    Xoá
                                </a>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Chưa có sinh viên nào
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-2">
        <button class="btn btn-secondary">
            <a href="{{route("classes.home")}}" class="text-decoration-none text-white">
                Quay Lại
            </a>
        </button>
    </div>
</div>
@endsection
