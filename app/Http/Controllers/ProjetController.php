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

    public function __construct()
    {
       
        $this->middleware(['auth']);
    }

   

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

    public function FileUpload($request)
    {
        if($request->hasfile('File')) 
        {
            $request->validate([
                'File' => 'required',
                'File.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf,zip,docx'
            ]);

            foreach($request->file('File') as $file)
            {
              $this->sendToAWS($file);
              $this->saveFileInfos($file);
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fichiers = Fichier::all();

        $this->FileUpload($request);

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

        $fichiers = Fichier::where('user_id',Auth::id())->where('projet_id',null)->get();
        
        foreach ($fichiers as $fichier ) 
        {
            $fichier->projet_id = $projet->id;
            $fichier->save();
        }

        return redirect()->route('projet.show',compact(['projet','fichiers']));
    }

    public function saveFileInfos($file)
    {
        $fileModal = new Fichier();

        $filenameWithExt = $file->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        // $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        // $path = $file->storeAs('public/files', $filename);


        $fileModal->nom = $filename;
        $fileModal->extension = $extension;
        $fileModal->user_id = Auth::id();
    
        $fileModal->save();
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

        $this->FileUpload($request);
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

        $fichiers = Fichier::where('user_id',Auth::id())->where('projet_id',null)->get();

        foreach ($fichiers as $fichier ) 
        {
            $fichier->projet_id = $projet->id;
            $fichier->save();
        }

        return redirect()->route('projet.show',compact(['projet','fichiers']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet->delete($projet);

        return redirect()->route('projet.index');
    }

    public function deleteFile(Fichier $file)
    {
        $s3 = new \Aws\S3\S3Client([
            'version'  => '2006-03-01',
            'region'   => 'us-west-1',
        ]);

        $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

        $s3->deleteObject(array(
            'Bucket' => $bucket,
            'Key'    => $file->nom
        ));
        
        return back();
    }

    public function upload()
    {
        return view('upload');
    }

    public function sendToAWS($file)
    {
       // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
        $s3 = new \Aws\S3\S3Client([
            'version'  => '2006-03-01',
            'region'   => 'us-west-1',
        ]);

        $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

        $upload = $s3->putObject([
            'Bucket'        => $bucket,
            'Key'           => $file->getClientOriginalName(),
            'ACL'           => 'public-read',
            
        ]);
              
    }


}
