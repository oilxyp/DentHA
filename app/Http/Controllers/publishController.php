<?php

namespace App\Http\Controllers;

use App\Models\publish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class publishController extends Controller
{   
    public function index()
    {
        return redirect('homeController');
    }
    
    public function create()
    {
        // return redirect('home');
        return view('home.index');
    }

    public function store(Request $request)
    {
        // dd(1);
        // publish::insert([
        //     'name' => $request->name,
        //     'detail' => $request->detail,
        //     'picture' => '12',
        // ]);

        $request->validate([
            'name'=>'required',
            'detail'=>'required',	
        ]);
        $input=$request->all();

        if($request->hasFile('picture'))
        {
            $destinayion_path='public/images/publish';
            $image=$request->file('picture');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('picture')->storeAs($destinayion_path,$image_name);

            $input['picture'] = $image_name;
        }

        publish::create($input);
        
         return redirect('home');
        //  return redirect()->route('homeController');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $publish = publish::where('id', $id)->first();
        // dd($publish);
        return view('home.public.edit_public',compact('publish'));
    }

    public function update(Request $request, string $id)
    {
        // publish::where('id', $id)
        // ->update([
        // 'name' => $request->name,
        // 'detail' => $request->detail,
        // ]);

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $publish = publish::find($id); // ปรับเปลี่ยน $id เป็นรหัสของเมนูที่ต้องการแก้ไข

        $input = $request->all();

        if($request->hasFile('picture'))
        {
            $destinayion_path='public/images/publish';
            $image=$request->file('picture');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('picture')->storeAs($destinayion_path,$image_name);

            $input['picture'] = $image_name;
        }
        if ($publish->picture) {
            Storage::delete('public/images/publish/' . $publish->picture);
        }

        $publish->update($input);

    return redirect('home');
    }

    public function destroy(string $id)
    {
        // publish::where('id', $id)->delete();

        $publish = publish::findOrFail($id);
        $publish->delete();

        // ลบไฟล์รูปภาพที่เกี่ยวข้อง
        if ($publish->picture) {
            Storage::delete('public/images/publish/' . $publish->picture);
        }
        return redirect('home');
    }
}
