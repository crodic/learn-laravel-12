@extends('layouts.root');


@section('content')
<div class="container mt-5">

    <form class="p-4 border rounded shadow-sm bg-light" method="POST" action="{{route("classes.update", ["id" => $class->id])}}">
        @csrf
        <h4 class="mb-3">Chỉnh Sửa Lớp Học</h4>
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label for="className" class="form-label">Tên lớp</label>
            <input type="text" name="class_name" value="{{$class->class_name}}" class="form-control" id="className" placeholder="Nhập tên lớp" required>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Khoa</label>
            <input type="text" name="department" value="{{$class->department}}" class="form-control" id="department" placeholder="Nhập tên khoa">
        </div>

        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <button type="button" class="btn btn-danger">
                <a href="{{route("classes.home")}}" class="text-decoration-none text-white">
                    Huỷ bỏ
                </a>
            </button>
        </div>
    </form>


</div>
@endsection
