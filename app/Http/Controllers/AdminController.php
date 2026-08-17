<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function blogs()
    {
        $blogs = DB::table('blogs')->get();

        return view('blogs', compact('blogs'));
    }

    function abouts()
    {
        $name = 'Suphitcha Piaza';
        $date = '6 กรกฎาคม 2026';
        return view('abouts', compact('name', 'date'));
    }
    function create()
    {
        return view('form');
    }
    function insert (Request $request)
    {
        $request->validate([
            'title' => 'required|max:10',
            'content' => 'required',
        ],[
            'title.required' => "กรุณาใส่ชื่อบทความ",
            'title.max' => "ชื่อบทความต้องไม่เกิน 10 ตัวอักษร",
            'content.required' => "กรุณาใส่เนื้อหาบทความ"
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
            DB::table("blogs")->insert($data);
            return redirect('/blogs');
    }
        function delete($id){
            DB::table('blogs')->where('id', $id)->delete();
            return redirect('/blogs');
        }
        
}
