<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Horaire;
use App\Models\HoraireHeure;
use App\Models\HoraireJour;
use App\Models\JourHoraireHeure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JourHoraireHeureController extends Controller
{
    public function show()
    {
        $jour_horaire_heures = JourHoraireHeure::with('jour', 'heure', 'horaire')->orderBy('created_at', 'desc')->paginate(4);
        $jours = HoraireJour::all();
        $heures = HoraireHeure::all();
        $horaires = Horaire::all();
        return view('admin.jour_horaire_heure.index', compact('jour_horaire_heures', 'jours', 'heures', 'horaires'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_horaire_jour' => 'required',
            'id_horaire_heure' => 'required',
            'id_horaire' => 'required'
        ]);

        $data = $request->all();

        $jour_horaire_heure = new JourHoraireHeure();
        $jour_horaire_heure->libelle = $data['libelle'];
        $jour_horaire_heure->id_horaire_jour = intval($data['id_horaire_jour']);
        $jour_horaire_heure->id_horaire_heure = intval($data['id_horaire_heure']);
        $jour_horaire_heure->id_horaire = intval($data['id_horaire']);
        $jour_horaire_heure->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/jour_horaire_heure");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_horaire_jour' => 'required',
            'id_horaire_heure' => 'required',
            'id_horaire' => 'required'
        ]);

        $data = $request->all();
        $jour_horaire_heure = JourHoraireHeure::find($id);
        $jour_horaire_heure->libelle = $data['libelle'];
        $jour_horaire_heure->id_horaire_jour = intval($data['id_horaire_jour']);
        $jour_horaire_heure->id_horaire_heure = intval($data['id_horaire_heure']);
        $jour_horaire_heure->id_horaire = intval($data['id_horaire']);
        $jour_horaire_heure->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/jour_horaire_heure");
    }

    public function delete($id)
    {
        $jour_horaire_heure = JourHoraireHeure::find($id);
        $jour_horaire_heure->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/jour_horaire_heure");
    }
}