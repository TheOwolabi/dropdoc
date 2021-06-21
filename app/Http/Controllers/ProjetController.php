<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FileController;
use App\Models\Fichier;
use App\Models\Projet;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::all();
       
        return view('projet.all',compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view('projet.create',compact('filieres'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($_POST['save']))
        {
            $request->validate([
                'File' => 'required',
                'File.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf,zip,docx'
              ]);
          
              if($request->hasfile('File')) 
              {
      
                  foreach($request->file('File') as $file)
                  {
                    $fileModal = new Fichier();

                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $file->storeAs('public/files', $fileNameToStore);
            
               
                    $fileModal->nom = $fileNameToStore;
                    $fileModal->extension = $extension;
                    $fileModal->user_id = Auth::id();
                
                    $fileModal->save();
             
                
                  }

                    
                        $fdate = $request->debut;
                        $tdate = $request->fin;
                        $datetime1 = new \DateTime($fdate);
                        $datetime2 = new \DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);

                    
                    $projet = Projet::create([
                            'nom' => $request->nom,
                            'description' => $request->description,
                            'duree' => $interval->days,
                            'debut' => $request->debut,
                            'fin' => $request->fin,
                            'filiere_id' => $request->filiere,
                            'user_id' => Auth::id(),
                        ]);

                        $files = Fichier::where('user_id',Auth::id())->get();

                        foreach ($files as $file ) 
                        {
                          $file->projet_id = $projet->id;
                          $file->save();
                        }


          
                  return back()->with('success', 'Creation du projet réussi !');
              }

        }
        else
        {
            if($request->hasfile('File')) 
            {

        

                foreach($request->file('File') as $file)
                {
                    $fileModal = new Fichier();

                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $file->storeAs('public/files', $fileNameToStore);

            
                    $fileModal->nom = $fileNameToStore;
                    $fileModal->extension = $extension;
                    $fileModal->user_id = Auth::id();
                
                    $fileModal->save();
                }

                
                    $fdate = $request->debut;
                    $tdate = $request->fin;
                    $datetime1 = new \DateTime($fdate);
                    $datetime2 = new \DateTime($tdate);
                    $interval = $datetime1->diff($datetime2);

                
                $projet = Projet::create([
                        'nom' => $request->nom,
                        'description' => $request->description,
                        'duree' => $interval->days,
                        'debut' => $request->debut,
                        'fin' => $request->fin,
                        'filiere_id' => $request->filiere,
                        'user_id' => Auth::id(),
                    ]);

                    $files = Fichier::where('user_id',Auth::id())->get();

                    foreach ($files as $file ) 
                    {
                        $file->projet_id = $projet->id;
                        $file->save();
                    }


        
                return back()->with('success', 'Creation du projet réussi !');
            }


    

            $fdate = $request->debut;
            $tdate = $request->fin;
            $datetime1 = new \DateTime($fdate);
            $datetime2 = new \DateTime($tdate);
            $interval = $datetime1->diff($datetime2);

        
                 $projet = Projet::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'duree' => $interval->days,
                'debut' => $request->debut,
                'fin' => $request->fin,
                'filiere_id' => $request->filiere,
                'user_id' => Auth::id(),
            ]);

            $files = Fichier::where('user_id',Auth::id())->get();

            foreach ($files as $file ) 
            {
            $file->projet_id = $projet->id;
            }

            return back()->with('success', 'Creation du projet réussi !');

        }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        $fichiers = Fichier::all();
        
        return view('projet.show',compact(['projet','fichiers']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $filieres = Filiere::all();
        return view('projet.edit',compact(['projet','filieres']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        $fichiers = Fichier::all();

        if(isset($_POST['save']))
        {
            $request->validate([
                'File' => 'required',
                'File.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf,zip,docx'
              ]);
          
              if($request->hasfile('File')) 
              {
      
                  foreach($request->file('File') as $file)
                  {
                    $fileModal = new Fichier();

                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $file->storeAs('public/files', $fileNameToStore);
            
               
                    $fileModal->nom = $fileNameToStore;
                    $fileModal->extension = $extension;
                    $fileModal->user_id = Auth::id();
                
                    $fileModal->save();
             
                
                  }

                    
                        $fdate = $request->debut;
                        $tdate = $request->fin;
                        $datetime1 = new \DateTime($fdate);
                        $datetime2 = new \DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);

                        
                    
                    $projet->update([
                            'nom' => $request->nom,
                            'description' => $request->description,
                            'duree' => $interval->days,
                            'debut' => $request->debut,
                            'fin' => $request->fin,
                            'filiere_id' => $request->filiere,
                            'user_id' => Auth::id(),
                        ]);

                        $files = Fichier::where('user_id',Auth::id())->get();

                        foreach ($files as $file ) 
                        {
                          $file->projet_id = $projet->id;
                          $file->save();
                        }


          
                        return view('projet.show',compact(['projet','fichiers']))->with('success', 'Modification du projet réussie !');

              }

        }
        else
        {
            if($request->hasfile('File')) 
            {

        

                foreach($request->file('File') as $file)
                {
                    $fileModal = new Fichier();

                    $filenameWithExt = $file->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $file->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $file->storeAs('public/files', $fileNameToStore);

            
                    $fileModal->nom = $fileNameToStore;
                    $fileModal->extension = $extension;
                    $fileModal->user_id = Auth::id();
                
                    $fileModal->save();
                }

                
                    $fdate = $request->debut;
                    $tdate = $request->fin;
                    $datetime1 = new \DateTime($fdate);
                    $datetime2 = new \DateTime($tdate);
                    $interval = $datetime1->diff($datetime2);

                
                $projet->update([
                        'nom' => $request->nom,
                        'description' => $request->description,
                        'duree' => $interval->days,
                        'debut' => $request->debut,
                        'fin' => $request->fin,
                        'filiere_id' => $request->filiere,
                        'user_id' => Auth::id(),
                    ]);

                    $files = Fichier::where('user_id',Auth::id())->get();

                    foreach ($files as $file ) 
                    {
                        $file->projet_id = $projet->id;
                        $file->save();
                    }


        
                    return view('projet.show',compact(['projet','fichiers']))->with('success', 'Modification du projet réussie !');

            }
            $fdate = $request->debut;
            $tdate = $request->fin;
            $datetime1 = new \DateTime($fdate);
            $datetime2 = new \DateTime($tdate);
            $interval = $datetime1->diff($datetime2);

        
                 $projet->update([
                'nom' => $request->nom,
                'description' => $request->description,
                'duree' => $interval->days,
                'debut' => $request->debut,
                'fin' => $request->fin,
                'filiere_id' => $request->filiere,
                'user_id' => Auth::id(),
            ]);

            $files = Fichier::where('user_id',Auth::id())->get();

            foreach ($files as $file ) 
            {
            $file->projet_id = $projet->id;
            }

            
            return view('projet.show',compact(['projet','fichiers']))->with('success', 'Modification du projet réussie !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet->destroy($projet);
    }

    public function download(Fichier $file)
    {
        
        return response()->download(public_path('storage/files/'.$file->nom), $file->nom);
    }


}
