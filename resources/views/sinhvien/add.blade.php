@extends('layout1')
@section('title', 'Thêm sinh viên mới')

@section('content')
    <h2>Thêm sinh viên mới</h2>
    
    {{-- Form nhập liệu --}}
    <form action="{{ route('sinhvien.store') }}" method="POST">
        @csrf {{-- Bắt buộc phải có trong form Laravel --}}

        <div>
            <label>ID:</label><br>
            <input type="text" name="id" required>
        </div>
        <div>
            <label>Tên:</label><br>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Tuổi:</label><br>
            <input type="number" name="age" required>
        </div>

        <div>
            <label>Lớp:</label><br>
            <input type="text" name="class" required>
        </div>

        <br>
        <button type="submit">Lưu sinh viên</button>
    </form>
@endsection