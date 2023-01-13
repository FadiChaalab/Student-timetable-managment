<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HoraireController extends Controller
{
    public function show()
    {
        $horaires = Horaire::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.horaire.index', compact('horaires'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'nb_seances' => 'required|integer'
        ]);

        $data = $request->all();
        $horaire = new Horaire();
        $horaire->libelle = $data['libelle'];
        $horaire->nb_seances = $data['nb_seances'];
        $horaire->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/horaire");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'nb_seances' => 'required|integer'
        ]);

        $data = $request->all();
        $horaire = Horaire::find($id);
        $horaire->libelle = $data['libelle'];
        $horaire->nb_seances = $data['nb_seances'];
        $horaire->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/horaire");
    }

    public function delete($id)
    {
        $horaire = Horaire::find($id);
        $horaire->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/horaire");
    }
}