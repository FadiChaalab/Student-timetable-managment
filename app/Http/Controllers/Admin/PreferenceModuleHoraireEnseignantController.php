<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\JourHoraireHeure;
use App\Models\PreferenceModuleHoraireEnseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PreferenceModuleHoraireEnseignantController extends Controller
{
    public function show()
    {
        $preference_module_horaire_enseignants = PreferenceModuleHoraireEnseignant::with('jourHoraireHeure', 'enseignant')->orderBy('created_at', 'desc')->paginate(4);
        $jour_horaire_heures = JourHoraireHeure::all();
        $enseignants = Enseignant::all();
        return view('admin.preference_module_horaire_enseignant.index', compact('preference_module_horaire_enseignants', 'jour_horaire_heures', 'enseignants'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_jhh' => 'required',
            'id_enseignant' => 'required'
        ]);

        $data = $request->all();

        $preference_module_horaire_enseignant = new PreferenceModuleHoraireEnseignant();
        $preference_module_horaire_enseignant->libelle = $data['libelle'];
        $preference_module_horaire_enseignant->id_jhh = intval($data['id_jhh']);
        $preference_module_horaire_enseignant->id_enseignant = intval($data['id_enseignant']);
        $preference_module_horaire_enseignant->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/preference_module_horaire_enseignant");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_jhh' => 'required',
            'id_enseignant' => 'required'
        ]);

        $data = $request->all();
        $preference_module_horaire_enseignant = PreferenceModuleHoraireEnseignant::find($id);
        $preference_module_horaire_enseignant->libelle = $data['libelle'];
        $preference_module_horaire_enseignant->id_jhh = intval($data['id_jhh']);
        $preference_module_horaire_enseignant->id_enseignant = intval($data['id_enseignant']);
        $preference_module_horaire_enseignant->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/preference_module_horaire_enseignant");
    }

    public function delete($id)
    {
        $preference_module_horaire_enseignant = PreferenceModuleHoraireEnseignant::find($id);
        $preference_module_horaire_enseignant->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/preference_module_horaire_enseignant");
    }
}