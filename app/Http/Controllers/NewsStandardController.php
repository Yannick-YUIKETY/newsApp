<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsStandardController extends Controller
{
    public function index($id = 0){

        if ($id != 0) {// si id != 0 on liste category sinon on liste tout

            $actus =News::where('category_id',$id)->orderBy('created_at' , 'desc')->paginate(7) ; //afficher news de la category id par ordre croissant

        } else {

            $actus =News::orderBy('created_at' , 'desc')->paginate(7) ; // Affiche les news par date de création dans l'ordre croissant

        }

        $categories = Category::orderBy('name','asc')->get(); // get recuper tous les résultats

        return view ('news.standard',compact('actus' , 'categories')) ;


    }

    public function detail(News $actu){

        return view ('news.standardDetail',compact('actu',)) ;

    }
}
