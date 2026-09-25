@extends('layout1')
@section('title', 'Danh sách sinh viên')
@push('styles')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
@endpush

@section('content')
    <h2>Danh sách sinh viên</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Lớp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
           <tr>
                <td>{{ $student['id'] }}</td>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['age'] }}</td>
                <td>{{ $student['class'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection