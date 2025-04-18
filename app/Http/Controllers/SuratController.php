<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuks;
use Illuminate\Http\Request;

class SuratController extends Controller
{
  
public function index()
{
    $surats = SuratMasuks::all();
    return view('pages.super-admin.surat-masuk', compact('surats'));
}
   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   public function show($id)
{
   $surat = SuratMasuks::find($id);
    if (!$surat) {
        return redirect()->route('surat.index')->with('error', 'Surat not found');
    }

    return view('pages.super-admin.detail-surat', compact('surat'));
}

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
