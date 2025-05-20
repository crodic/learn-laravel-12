@extends('layouts.root');


@section('content')
<div class="container mt-5">

    <form class="p-4 border rounded shadow-sm bg-light" method="POST" action="{{route("classes.store")}}">
        @csrf
        <h4 class="mb-3">Thêm Lớp Học</h4>

        <div class="mb-3">
            <label for="className" class="form-label">Tên lớp</label>
            <input type="text" name="class_name" class="form-control" id="className" placeholder="Nhập tên lớp" required>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Khoa</label>
            <input type="text" name="department" class="form-control" id="department" placeholder="Nhập tên khoa">
        </div>

        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary">Thêm Lớp</button>
            <button type="button" class="btn btn-danger">
                <a href="{{route("classes.home")}}" class="text-decoration-none text-white">
                    Huỷ bỏ
                </a>
            </button>
        </div>
    </form>
</div>
@endsection
