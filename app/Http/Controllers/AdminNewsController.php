<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index() {

        //$actus = News::all() ; // Lister Tout

        $actus = News::orderBy('created_at', 'desc')->paginate(10) ; // Lister en ordre décroissant par rapport a la table created_at

        return view ("adminnews.liste", compact('actus')) ;

    }
    public function formAdd () { //affichage de mon formulaire

        return view ('adminnews.add') ;

    }
    public function add (Request $request) {//ajout des informations

        $newsModel = new News ; // Création d'une instance de class (model News) ; pour enregistrer en base

        // vérification des donées du formulaire
        $request->validate(['titre'=>'required|min:5']); //titre obligatoire min 5 caractère

        //Gestion de l'upload de l'image
        if ($request->file()) {

            $fileName = $request->image->store('public/images') ;
            $newsModel->image = $fileName ;

        }

        $newsModel->titre = $request->titre ;

        $newsModel->description = $request->description ;

        $newsModel->save() ; //Enregistrement des données

        return redirect(route('news.add')) ;


    }

    public function delete($id = 0){

        $actu = News::find($id) ; //Récupération d'une news à partir de son id

        dd($id) ;

        return 'delete' ;

    }

}
