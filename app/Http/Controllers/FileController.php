<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;

class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req){
        $req->validate([
          'File' => 'required',
          'File.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf,docx|max:2048'
        ]);
    
        if($req->hasfile('File')) {
            foreach($req->file('File') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $Data[] = $name;  
            }
    
            $fileModal = new Fichier();
            $fileModal->nom = json_encode($Data);
            $fileModal->extension = json_encode($Data);
            
           
            $fileModal->save();
    
           return back()->with('success', 'Ajout(s) réussi !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichier $fichier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichier $fichier)
    {
        //
    }
}
