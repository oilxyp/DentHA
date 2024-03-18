<?php

namespace App\Http\Controllers;

use App\Models\emergency;
use App\Models\elderlygroup;
use Illuminate\Http\Request;
use App\Models\special_patientgroup;

class recordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elderlygroup = elderlygroup::all();
        $specialpatientgroup = special_patientgroup::all();
        $emergency = emergency::all();
        // dd($elderlygroup);
        return view('about/record/index', compact('elderlygroup', 'specialpatientgroup', 'emergency'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $source = request('source');
        if ($source === 'elderlygroup' || $source === 'specialpatientgroup' || $source === 'emergency') {
            return view('about.record.create', compact('source'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $source = request('source');
        if ($source === 'elderlygroup') {
            elderlygroup::insert([
                'name' => $request->name,
                'HN' => $request->HN,
                'sex' => $request->sex,
                'old' => $request->old,
                'congenital_disease' => $request->congenital_disease,
                'gero' => $request->gero ?? 0,
                'low_dependence' => $request->low_dependence ?? 0,
                'medium_dependence' => $request->medium_dependence,
                'endo' => $request->endo ?? 0,
                'fillng' => $request->fillng ?? 0,
                'perio' => $request->perio ?? 0,
                'prosth' => $request->prosth ?? 0,
                'extraction' => $request->extraction ?? 0,
                'year' => $request->year,
            ]);
        } elseif ($source === 'specialpatientgroup') {
            special_patientgroup::insert([
                'year' => $request->year,
                'name' => $request->name,
                'HN' => $request->HN,
                'phon' => $request->phon,
                'old' => $request->old,
                'sex' => $request->sex,
                'U_D' => $request->U_D,
                'GA' => $request->GA,

                'Filling' => $request->Filling ?? 0,
                'Perio' => $request->Perio ?? 0,
                'Fluoride' => $request->Fluoride ?? 0,
                'Scaling' => $request->Scaling ?? 0,
                'Ext' => $request->Ext ?? 0,
                'OHI' => $request->OHI ?? 0,
                'Sealant' => $request->Sealant ?? 0,
            ]);
        } elseif ($source === 'emergency') {
            emergency::insert([
                'date' => $request->date,
                'HN' => $request->HN,
                'name' => $request->name,
                'endo' => $request->endo,
                'filling' => $request->filling ?? 0,
                'perio' => $request->perio ?? 0,
                'other' => $request->other,
                'month' => $request->month ?? 0,
                'year' => $request->year,
            ]);
        } else;
        return redirect('record_manage');
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
        $source = request('source');
        if ($source === 'elderlygroup') {
            $data = elderlygroup::where('id', $id)->first();
        } elseif ($source === 'specialpatientgroup') {
            $data = special_patientgroup::where('id', $id)->first();
        } elseif ($source === 'emergency') {
            $data = emergency::where('id', $id)->first();
        } else {
        }
        // dd($data);
        return view('about.record.edit', compact('data', 'source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $source = $request->input('source');
        // ตรวจสอบค่า $source เพื่อดำเนินการต่อไป
        if ($source === 'elderlygroup') {
            elderlygroup::where('id', $id)->update([
                'name' => $request->name,
                'HN' => $request->HN,
                'sex' => $request->sex,
                'old' => $request->old,
                'congenital_disease' => $request->congenital_disease,
                'gero' => $request->gero ?? 0,
                'low_dependence' => $request->low_dependence ?? 0,
                'medium_dependence' => $request->medium_dependence,
                'endo' => $request->endo ?? 0,
                'fillng' => $request->fillng ?? 0,
                'perio' => $request->perio ?? 0,
                'prosth' => $request->prosth ?? 0,
                'extraction' => $request->extraction ?? 0,
                'year' => $request->year,
            ]);
        } elseif ($source === 'specialpatientgroup') {
            special_patientgroup::where('id', $id)->update([
                'year' => $request->year,
                'name' => $request->name,
                'HN' => $request->HN,
                'phon' => $request->phon,
                'old' => $request->old,
                'sex' => $request->sex,
                'U_D' => $request->U_D,
                'GA' => $request->GA,

                'Filling' => $request->Filling ?? 0,
                'Perio' => $request->Perio ?? 0,
                'Fluoride' => $request->Fluoride ?? 0,
                'Scaling' => $request->Scaling ?? 0,
                'Ext' => $request->Ext ?? 0,
                'OHI' => $request->OHI ?? 0,
                'Sealant' => $request->Sealant ?? 0,
            ]);
        } elseif ($source === 'emergency') {
            emergency::where('id', $id)->update([
                'date' => $request->date,
                'HN' => $request->HN,
                'name' => $request->name,
                'endo' => $request->endo,
                'filling' => $request->filling ?? 0,
                'perio' => $request->perio ?? 0,
                'other' => $request->other,
                'month' => $request->month ?? 0,
                'year' => $request->year,
            ]);
        }
        return redirect('record_manage');
        // dd($request,$source);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $source = request('source');
        if ($source === 'elderlygroup') {
            elderlygroup::find($id)->delete();
        } elseif ($source === 'specialpatientgroup') {
            special_patientgroup::find($id)->delete();
        } elseif ($source === 'emergency') {
            emergency::find($id)->delete();
        }
        return redirect('record_manage');
    }
}
