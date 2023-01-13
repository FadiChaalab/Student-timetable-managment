<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroupeCursus;
use App\Models\Horaire;
use App\Models\InstanceGroupeHoraire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InstanceGroupeCursusHoraireController extends Controller
{
    public function show()
    {
        $instance_groupe_horaires = InstanceGroupeHoraire::with('horaire', 'groupeCursus')->orderBy('created_at', 'desc')->paginate(4);
        $horaires = Horaire::all();
        $groupe_cursuses = GroupeCursus::all();
        return view('admin.instance_groupe_horaire.index', compact('instance_groupe_horaires', 'horaires', 'groupe_cursuses'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_groupe_cursus' => 'required',
            'id_horaire' => 'required'
        ]);

        $data = $request->all();

        $instance_groupe_horaire = new InstanceGroupeHoraire();
        $instance_groupe_horaire->libelle = $data['libelle'];
        $instance_groupe_horaire->id_groupe_cursus = intval($data['id_groupe_cursus']);
        $instance_groupe_horaire->id_horaire = intval($data['id_horaire']);
        $instance_groupe_horaire->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/instance_groupe_horaire");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_groupe_cursus' => 'required',
            'id_horaire' => 'required'
        ]);

        $data = $request->all();
        $instance_groupe_horaire = InstanceGroupeHoraire::find($id);
        $instance_groupe_horaire->libelle = $data['libelle'];
        $instance_groupe_horaire->id_groupe_cursus = intval($data['id_groupe_cursus']);
        $instance_groupe_horaire->id_horaire = intval($data['id_horaire']);
        $instance_groupe_horaire->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/instance_groupe_horaire");
    }

    public function delete($id)
    {
        $instance_groupe_horaire = InstanceGroupeHoraire::find($id);
        $instance_groupe_horaire->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/instance_groupe_horaire");
    }
}