<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $perPage=$request ->input('per_page',10);
        $lopHocs = LopHoc::paginate($perPage)->withQueryString();
        return view('lop-hocs.index', compact('lopHocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lop-hocs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ten_lop' => 'required|string|max:255',
            'ma_lop' => 'required|string|max:6|unique:lop_hocs,ma_lop',
            'si_so' => 'required|integer|min:1',
            'giao_vien' => 'required|string|max:255',
            'so_dien_thoai_gvien' => ['nullable', 'regex:/^0[0-9]{9}$/'],
            'ghi_chu' => 'nullable|string|max:500',
            'trang_thai' => 'nullable|boolean',
        ]);
        /*$lophoc = new LopHoc();
        $lophoc->ten_lop = $request->input('ten_lop');
        $lophoc->ma_lop = $request->input('ma_lop');
        $lophoc->si_so = $request->input('si_so');
        $lophoc->giao_vien = $request->input('giao_vien');
        $lophoc->so_dien_thoai_gvien = $request->input('so_dien_thoai_gvien');
        $lophoc->ghi_chu = $request->input('ghi_chu');
        $lophoc->trang_thai = $request->input('trang_thai') === 'on' ? true : false;
        $lophoc->save();
        */
        try {

            $lophoc = LopHoc::create($request->all());

            return redirect()->route('lop-hocs.index')->with('success', 'Lớp học đã được tạo thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Có lỗi xảy ra khi tạo lớp học: ' . $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $lopHoc = LopHoc::findOrFail($id);
        return view('lop-hocs.create', ['lopHoc' => $lopHoc]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LopHoc $lopHoc)
    {
        $validated = $request->validate([
            'ten_lop' => 'required|string|max:255',
            'ma_lop' => 'required|string|max:6|unique:lop_hocs,ma_lop,' . $lopHoc->id,
            'si_so' => 'required|integer|min:1',
            'giao_vien' => 'required|string|max:255',
            'so_dien_thoai_gvien' => ['nullable', 'regex:/^0[0-9]{9}$/'],
            'ghi_chu' => 'nullable|string|max:500',
            'trang_thai' => 'nullable|boolean',
        ]);

        $lopHoc->update($validated);

        return redirect()->route('lop-hocs.index')->with('success', 'Lớp học đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LopHoc $lopHoc)
    {
        $lopHoc->delete();

        return redirect()->route('lop-hocs.index')->with('success', 'Lớp học đã được xóa thành công.');
    }
}
