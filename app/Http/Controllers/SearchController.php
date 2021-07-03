<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class SearchController extends Controller
{
    function list(Request $request)
    {
        $data = $request->get('data');
        $prs = $request->get('projets');
        $ids = [];
        
        foreach ($prs as $projet) {
            $i =  (int)$projet['id'];
            array_push( $ids, $i);

            
        }
        
        


        $dat = Projet::where('nom', 'LIKE', "%{$data}%")->orWhere('description', 'LIKE', "%{$data}%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

        $data = $dat->only($ids);

        foreach ($data as $row) {
            $output .= '
        <li><a href="projet/'.$row->id.'" class="ml-2"  style="color:black;font-weight: bold;">' . $row->nom . '</a></li>';
        }
        $output .= '</ul>';
        echo $output;
    }
}


