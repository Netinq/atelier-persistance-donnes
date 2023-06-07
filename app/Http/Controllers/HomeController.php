<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use App\Models\Auteur;
use App\Models\Categorie;
use App\Models\Emprunt;
use App\Models\Livre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function searchByAuthor(Request $request) {
            $search = request('search');
        $split = explode(' ', $search);
        $auteur = Auteur::where('nom', $split[0])->first();
        if ($auteur == null) {
            if (count($split) > 1 ) {
                $auteur = Auteur::where('nom', $split[1])->first();
                if ($auteur == null) {
                    $auteur = Auteur::where('prenom', $split[0])->first();
                    if ($auteur == null) {
                        $auteur = Auteur::where('prenom', $split[1])->first();
                    }
                }
            } else {
                $auteur = Auteur::where('prenom', $split[0])->first();
            }
        }

        if ($auteur != null) {
            $livres = Livre::where('auteur_id', $auteur->id)->get();
            return view('searchresult', compact('livres'));
        } else {
            $livres = [];
            return view('searchresult', compact('livres'));
        }
    }

    public function searchEmpruntByDate(Request $request) {
        $date_debut = request('date_debut');
        $date_fin = request('date_fin');

        $emprunts = Emprunt::with(['adherent', 'livre'])->whereBetween('date_emprunt', [$date_debut, $date_fin])->get();

        return view('searchempruntresult', compact('emprunts'));
    }

    public function stats() {
        $emprunts = Emprunt::with(['adherent', 'livre'])->where('date_retour', null)->get();
        $livres = Livre::all();
        $adherents = Adherent::all();
        $auteurs = Auteur::all();
        $categories = Categorie::all();
        return view('stats', compact('emprunts', 'livres', 'adherents', 'auteurs', 'categories'));
    }

    public function index()
    {
        return view('home', $this->loadData());
    }

    public function categories() {
        $categories = Categorie::all();
        return view('categories', compact('categories'));
    }

    private function loadData($withInactif = false) {
        $nb_livres = Livre::count();
        $nb_adherents = Adherent::count();
        $nb_auteurs = Auteur::count();
        if ($withInactif) {
            $livres = Livre::with(['auteur', 'emprunts'])->orderBy('date_de_parution', 'DESC')->get();
        } else {
            $livres = Livre::with(['auteur', 'emprunts'])->where('actif', true)->orderBy('date_de_parution', 'DESC')->get();
        }
        return compact('nb_livres', 'nb_adherents', 'nb_auteurs', 'livres');
    }

    public function admin() {
        return view('admin', $this->loadData(true));
    }

    public function livres()
    {
        $auteurs = Auteur::all();
        $categories = Categorie::all();
        return view('livres', compact('auteurs', 'categories'));
    }

    public function deleteCategorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->route('home');
    }

    public function createCategorie(Request $request)
    {
        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect()->route('home');
    }

    public function storeLivre(Request $request)
    {
        $livre = new Livre();
        $livre->titre = $request->titre;
        $livre->auteur_id = $request->auteur_id;
        $livre->date_de_parution = Carbon::createFromFormat('d/m/Y', $request->date_de_parution);
        $livre->nombre_de_pages = $request->nombre_de_pages;
        $livre->save();
        return redirect()->route('home');
    }

    public function toggle($id)
    {
        $livre = Livre::find($id);
        if ($livre->actif) {
            $livre->actif = false;
        } else {
            $livre->actif = true;
        }
        $livre->save();
        return redirect()->route('home');
    }
}
