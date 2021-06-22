<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Fichier;
use App\Models\Filiere;
use GuzzleHttp\Psr7\Stream;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\CachingStream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FileController;

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

    public function upload()
    {
        return view('upload');
    }

    public function send(Request $request)
    {
      

        // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
$s3 = new \Aws\S3\S3Client([
    'version'  => '2006-03-01',
    'region'   => 'us-east-1',
]);
$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
       

                $upload = $s3->putObject([
                    'Bucket'        => $bucket,
                    'Key'           => $request->userfile->getClientOriginalName(),
                    'Body'          => new CachingStream(
                        new Stream(fopen($request->userfile, 'r'))
                    ),
                    'ACL'           => 'public-read',
                    
                ]);
                
                
                
                
                
                // $s3->upload($bucket, $request->userfile->getClientOriginalName(),  new CachingStream(
                //     new Stream(fopen($file, 'r'))
                // ), 'rb'), 'public-read');
        
                dd($upload->get('ObjectURL'));
                
        
    }


}
