<?php

namespace App\Http\Controllers;

use App\Models\building;
use Illuminate\Http\Request;

class buildingController extends Controller
{
    public function index()
    {
        $building = building::all(); 
        return view('about.building.index', compact('building'));
    }


    public function create()
    {
        return view('about.building.create');
    }

    public function store(Request $request)
    {
        building::insert([
            'name'=>$request->name,
            'detail'=>$request->detail,
        ]);
        return redirect('building_manage');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $building = building::where('id',$id)->first();
        // dd($menu);
        return view('about.building.edit',compact('building'));
    }

    public function update(Request $request, string $id)
    {
        building::where('id',$id)->update([
            'name'=>$request->name,
            'detail'=>$request->detail,
        ]);
        return redirect('building_manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = building::find($id)->delete();
        return redirect('building_manage');
    }
}
