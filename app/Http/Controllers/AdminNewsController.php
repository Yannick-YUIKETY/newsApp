<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index() {

        //$actus = News::all() ; // Lister Tout

        $actus = News::orderBy('created_at', 'desc')->paginate(10) ; // Lister en ordre décroissant par rapport a la table created_at

        return view ("adminnews.liste", compact('actus')) ;

    }
    public function formAdd () { //affichage de mon formulaire

        $categories = Category::orderBy('name','asc')->get();

        return view ('adminnews.edit', compact('categories')) ;

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

        $newsModel->category_id = $request->category ;
        $newsModel->description = $request->description ;

        $newsModel->titre = $request->titre ;

        $newsModel->description = $request->description ;

        $newsModel->save() ; //Enregistrement des données

        return redirect(route('news.add')) ;


    }

    public function formEdit ($id = 0) { //affichage de mon formulaire

        $actu = News::findOrFail($id) ; //Lecture des données en bases à partir de l'identifiant
        $categories = Category::orderBy('name','asc')->get(); //classer les categoeies par ordre croissant
        return view ('adminnews.edit',compact('actu','categories')) ;



    }

    public function edit(Request $request ,$id =0){

        $actu = News::findOrFail($id) ; //Création d'une instance de class(model News a modifier à partir de id) pour enregistrer en base
        $request->validate(['titre'=>'required|min:5']);

        if ($request->file()) {

            if ($actu->image != '') {
                Storage::delete($actu->image) ;
            }

            $fileName = $request->image->store('public/images') ;
            $actu->image = $fileName ;

        }
        $actu->category_id = $request->category ;
        $actu->titre = $request->titre ;
        $actu->description = $request->description ;
        $actu->save();

        return redirect(route('news.liste')) ;
    }

    public function delete($id = 0){

        $actu = News::findOrFail($id) ; //Récupération d'une news à partir de son id
        //supression de la news
        if($actu->image != ''){//verification de l'existence du fichier

        Storage::delete($actu->image) ; //delete file

        }
        $actu->delete() ; //supprimer l'image dans la base de donnée


        return redirect(route('news.liste')) ;

    }





}
