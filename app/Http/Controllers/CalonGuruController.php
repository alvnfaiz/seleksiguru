<?php

namespace App\Http\Controllers;

use App\Models\CalonGuru;
use Illuminate\Http\Request;
use App\Models\SuratMenyurat;

class CalonGuruController extends Controller
{
    //
    public function profile(){
        $dataGuru = CalonGuru::find(auth()->user()->id);
        return view('calonGuru.profile', compact('dataGuru'));
    }

    public function dataDiri()
    {
        $dataGuru = CalonGuru::find(auth()->user()->id);
        return view('calonGuru.datadiri', compact('dataGuru'));
    }

    public function editProfile(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|min:16|max:16',
            'no_kk' => 'required|min:16|max:16',
            'alamat' => 'required',
            'current_password' => 'nullable|current_password',
            'password' => 'nullable|min:8',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'tamatan' => 'required',
            'instansi' => 'required',
            'no_hp' => 'nullable'
        ]);
        $dataGuru = CalonGuru::find(auth()->user()->id);
        $dataGuru->nik = $request->nik;
        $dataGuru->nik = $request->no_kk;
        $dataGuru->nik = $request->alamat;
        $dataGuru->nik = $request->tempat_lahir;
        $dataGuru->nik = $request->tanggal_lahir;
        $dataGuru->nik = $request->tamatan;
        $dataGuru->nik = $request->instansi;
        $dataGuru->nik = $request->no_hp;
        if($request->hasFile('foto_profile'))
        {
            $imageName = 'userID-'.auth()->user()->id.'-'.time().'.'.$request->foto_profile->extension();
            $storeImage = $request->foto_profile->move(public_path('images'), $imageName);
            $dataGuru->foto_profile = $storeImage;
        }
        $dataGuru->save();
            return redirect(route('surat'))->with('Success', 'Silahkan upload ijazah dan akta anda');
    }

    public function suratSurat()
    {
        $suratsurat = SuratMenyurat::find(auth()->user()->id);

        return view('calonGuru.inputsurat', compact('suratsurat'));
    }

    public function uploadSurat(Request $request)
    {

    }
}
