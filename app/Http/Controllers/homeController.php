<?php

namespace App\Http\Controllers;

use App\Models\general;
use App\Models\publish;
use App\Models\activitys;
use App\Models\howtoservice;
use App\Models\management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function index()
    {
        $activitys = activitys::all();
        $publish = publish::all();
        // $publish = publish::orderBy('created_by', 'desc')->take(2)->get();

        $general = general::all();
        $management = management::all();
        $howtoservice = howtoservice::all();
        // dd($activitys,$publish);
        return view('home.index', compact('activitys', 'publish', 'general', 'management','howtoservice'));
    }

    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request)
    {
        // activitys::insert([
        //     'name' => $request->name,
        //     'detail' => $request->detail,
        //     'picture.*' => $request->picture,
        // ]);

        // เก็บลงactivitys
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'picture.*' => 'required|image',
        ]);

        $input = $request->all();

        if ($request->hasFile('picture')) {
            $destination_path = 'public/images/activity';
            $pictures = []; // สร้างอาร์เรย์เพื่อเก็บชื่อรูปภาพที่อัปโหลด

            foreach ($request->file('picture') as $image) {
                $image_name = $image->getClientOriginalName();
                $image->storeAs($destination_path, $image_name);
                $pictures[] = $image_name; // เก็บชื่อไฟล์ภาพลงในอาร์เรย์
            }

            // รวมชื่อรูปภาพให้เป็นสตริงแยกด้วยเครื่องหมาย ,
            $input['picture'] = implode(',', $pictures);
        }

        activitys::create($input);

        return redirect('home');
    }

    // public function store(Request $request)
    // {
    //     // ตรวจสอบว่ามีไฟล์รูปถูกส่งมาหรือไม่
    //     if ($request->hasFile('picture')) {
    //         // สร้าง path และบันทึกไฟล์รูป
    //         $imagePath = $request->file('picture')->store('images', 'public');
    //     } else {
    //         $imagePath = null; // ถ้าไม่มีไฟล์, กำหนดให้เป็น null
    //     }

    //     // ใช้ Eloquent Model เพื่อบันทึกข้อมูลลงในฐานข้อมูล
    //     activitys::create([
    //         'name' => $request->name,
    //         'detail' => $request->detail,
    //         'picture' => $imagePath, // ใช้ path ที่เก็บไฟล์รูปภาพ
    //     ]);

    //     return redirect('home');
    // }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $activitys = activitys::where('id', $id)->first();
        // dd($activitys);
        return view('home.activity.edit_activity', compact('activitys'));

    }

    public function update(Request $request, string $id)
    {
        // dd($request,$id);
        // activitys::where('id', $id)
        //     ->update([
        //         'name' => $request->name,
        //         'detail' => $request->detail,
        //         'picture' => $request->picture,
        //     ]);

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $activitys = activitys::find($id);
        $input = $request->all();

        if ($request->hasFile('picture')) {
            $destination_path = 'public/images/activity';
            $pictures = []; // สร้างอาร์เรย์เพื่อเก็บชื่อรูปภาพที่อัปโหลด

            foreach ($request->file('picture') as $image) {
                $image_name = $image->getClientOriginalName();
                $image->storeAs($destination_path, $image_name);
                $pictures[] = $image_name; // เก็บชื่อไฟล์ภาพลงในอาร์เรย์
            }
            // รวมชื่อรูปภาพให้เป็นสตริงแยกด้วยเครื่องหมาย ,
            $input['picture'] = implode(',', $pictures);
        }
        if ($activitys->picture) {
            Storage::delete('public/images/activity/' . $activitys->picture);
        }

        $activitys->update($input);


        return redirect('home');
    }

    public function destroy(string $id)
    {
        // dd($id);
        // activitys::destroy($id);
        // activitys::where('id', $id)->delete();

        $activitys = activitys::findOrFail($id);
        $activitys->delete();

        // ลบไฟล์รูปภาพที่เกี่ยวข้อง
        if ($activitys->picture) {
            Storage::delete('public/images/activity/' . $activitys->picture);
        }
        return redirect('home');
    }
}
