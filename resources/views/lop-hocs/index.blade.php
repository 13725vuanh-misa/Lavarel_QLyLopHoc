@extends('layout1')
@section('title', 'Danh sách lớp học')
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
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .per-page-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pagination {
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <button onclick="window.location.href='{{ route('lop-hocs.create') }}'">Thêm lớp học</button>
    <h2>Danh sách lớp học</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên lớp</th>
                <th>Mã lớp</th>
                <th>Sĩ số</th>
                <th>Giáo viên</th>
                <th>Số điện thoại giáo viên</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lopHocs as $lopHoc)
           <tr>
                <td>{{ $lopHoc['id'] }}</td>
                <td>{{ $lopHoc['ten_lop'] }}</td>
                <td>{{ $lopHoc['ma_lop'] }}</td>
                <td>{{ $lopHoc['si_so'] }}</td>
                <td>{{ $lopHoc['giao_vien'] }}</td>
                <td>{{ $lopHoc['so_dien_thoai_gvien'] }}</td>
                <td>{{ $lopHoc['trang_thai'] ? 'Hoạt động' : 'Ngừng hoạt động' }}</td>
                <td>{{ $lopHoc['ghi_chu'] }}</td>
                <!-- dùng form để gửi yêu cầu xóa  để tránh việc sử dụng link trực tiếp -->
                <td> 
                    <a href="{{ route('lop-hocs.edit', $lopHoc['id']) }}">Sửa</a> 
                    <form action="{{ route('lop-hocs.destroy', $lopHoc['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
    <div class="pagination-container">

        <form method="GET" class="per-page-form">
            <label for="per_page">Số bản ghi/trang:</label>

            <select name="per_page" id="per_page" onchange="this.form.submit()">
                <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>
                    5
                </option>

                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>
                    10
                </option>

                <option value="20" {{ request('per_page', 10) == 20 ? 'selected' : '' }}>
                    20
                </option>
            </select>
        </form>

        <div class="pagination">
            {{ $lopHocs->links() }}
        </div>

    </div>
@endsection