@extends('layouts.root')


@section('content')
<div class="container mt-5">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @session('message')
    <div class="alert alert-success">
        {{session("message")}}
    </div>
    @endsession

    <div class="d-flex justify-content-between">
        <h4 class="mb-4">Danh sách lớp học</h4>
        <div>
            <button class="btn btn-primary">
                <a href="{{ route("classes.create") }}" class="text-decoration-none text-white">
                    Thêm lớp
                </a>
            </button>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tên lớp</th>
                <th>Khoa</th>
                <th>Tổng số sinh viên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu mẫu -->
            @forelse($classes as $class)
            <tr>
                <td>{{$class->id}}</td>
                <td>{{$class->class_name}}</td>
                <td>{{$class->department}}</td>
                <td>{{count($class->students)}}</td>
                <td>
                    <button class="btn btn-sm btn-info me-1">
                        <a href="{{route("classes.show", ["id" => $class->id])}}" class="text-decoration-none text-white">
                            Xem
                        </a>
                    </button>
                    <button class="btn btn-sm btn-warning me-1">
                        <a href="{{route("classes.edit", ["id" => $class->id])}}" class="text-decoration-none text-white">
                            Sửa
                        </a>
                    </button>
                    <button class="btn btn-sm btn-danger">
                        <a href="{{route("classes.destroy", ["id" => $class->id])}}" class="text-decoration-none text-white">
                            Xoá
                        </a>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="col-span-4 text-center">
                    Chưa có dữ liệu
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
