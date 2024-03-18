<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = menu::all();
        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // menu::insert([
        //     'name' => $request->name,
        //     'detail' => $request->detail,
        //     'picture' => '14',
        // ]);

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $input = $request->all();
        if ($request->hasFile('picture')) {
            $destinayion_path = 'public/images/menu';
            $image = $request->file('picture');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('picture')->storeAs($destinayion_path, $image_name);

            $input['picture'] = $image_name;
        }

        Menu::create($input);
        return redirect('menu_manage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = menu::where('id', $id)->first();
        // dd($activitys);
        return view('menu.edit_menu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request,$id);
        //     menu::where('id', $id)
        //     ->update([
        //     'name' => $request->name,
        //     'detail' => $request->detail,
        // ]);

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $menu = Menu::find($id); // ปรับเปลี่ยน $id เป็นรหัสของเมนูที่ต้องการแก้ไข

        $input = $request->all();

        if ($request->hasFile('picture')) {
            $destinayion_path = 'public/images/menu';
            $image = $request->file('picture');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('picture')->storeAs($destinayion_path, $image_name);

            if ($menu->picture) {
                Storage::delete('public/images/menu/' . $menu->picture);
            }

            $input['picture'] = $image_name;
        }

        $menu->update($input);
        // return redirect('menu_manege');
        return redirect('menu_manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        menu::where('id', $id)->delete();
        return redirect('menu_manage');
    }
}
