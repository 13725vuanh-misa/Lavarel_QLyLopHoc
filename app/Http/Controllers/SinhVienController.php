<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    //
    private $students = [
        ['id' => 1, 'name' => 'Nguyen Van A', 'age' => 20, 'class' => 'CNTT K1'],
        ['id' => 2, 'name' => 'Tran Thi B', 'age' => 21, 'class' => 'CNTT K1'],
        ['id' => 3, 'name' => 'Le Van C', 'age' => 22, 'class' => 'CNTT K1'],
    ];
    public function index()
    {
        return view('sinhvien.index', [
            'title' => 'Danh sách sinh viên',
            'students' => $this->students
        ]);
    }

    public function getID($id="") {
        $sinhvien = collect($this->students)->firstWhere('id', $id);

        return $sinhvien ? "" . $sinhvien['id'] . " - " . $sinhvien['name'] . " - " . $sinhvien['age'] . " - " . $sinhvien['class'] : "Không tìm thấy sinh viên có ID là: " . $id;
    }

    public function show2( $name="", $tuoi=0)
    {
        return "Đây là sinh viên có tên là: " . $name . " và tuổi là: " . $tuoi;
    }

    public function add(){
        return view('sinhvien.add', [
            'title' => 'Thêm sinh viên'
        ]);
    }
    public function store(Request $request){
        dd($request->all()); 
    }
}
