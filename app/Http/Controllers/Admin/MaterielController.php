<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MaterielController extends Controller
{
    public function show()
    {
        $materiels = Materiel::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.materiel.index', compact('materiels'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
            'num_serie' => 'required|integer',
            'description' => 'required|string',
            'etat' => 'required|string|max:255',
            'disponibilite' => 'required|integer',
            'version' => 'required|string|max:255',
            'annee' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $materiel = new Materiel();
        $materiel->libelle = $data['libelle'];
        $materiel->matricule = $data['matricule'];
        $materiel->num_serie = $data['num_serie'];
        $materiel->description = $data['description'];
        $materiel->etat = $data['etat'];
        $materiel->disponibilite = $data['disponibilite'];
        $materiel->version = $data['version'];
        $materiel->annee = $data['annee'];
        $materiel->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/materiel");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
            'num_serie' => 'required|integer',
            'description' => 'required|string',
            'etat' => 'required|string|max:255',
            'disponibilite' => 'required|integer',
            'version' => 'required|string|max:255',
            'annee' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $materiel = Materiel::find($id);
        $materiel->libelle = $data['libelle'];
        $materiel->matricule = $data['matricule'];
        $materiel->num_serie = $data['num_serie'];
        $materiel->description = $data['description'];
        $materiel->etat = $data['etat'];
        $materiel->disponibilite = $data['disponibilite'];
        $materiel->version = $data['version'];
        $materiel->annee = $data['annee'];
        $materiel->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/materiel");
    }

    public function delete($id)
    {
        $materiel = Materiel::find($id);
        $materiel->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/materiel");
    }
}