<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materiel;
use App\Models\Salle;
use App\Models\SalleMateriel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalleMaterielController extends Controller
{
    public function show()
    {
        $salle_materiels = SalleMateriel::with('salle', 'materiel')->orderBy('created_at', 'desc')->paginate(4);
        $salles = Salle::all();
        $materiels = Materiel::all();
        return view('admin.salle_materiel.index', compact('salle_materiels', 'salles', 'materiels'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_salle' => 'required',
            'id_materiel' => 'required',
            'mobilite' => 'required'
        ]);

        $data = $request->all();

        $salle_materiel = new SalleMateriel();
        $salle_materiel->libelle = $data['libelle'];
        $salle_materiel->mobilite = intval($data['mobilite']);
        $salle_materiel->id_salle = intval($data['id_salle']);
        $salle_materiel->id_materiel = intval($data['id_materiel']);
        $salle_materiel->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/salle_materiel");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_salle' => 'required',
            'id_materiel' => 'required',
            'mobilite' => 'required'
        ]);

        $data = $request->all();
        $salle_materiel = SalleMateriel::find($id);
        $salle_materiel->libelle = $data['libelle'];
        $salle_materiel->mobilite = intval($data['mobilite']);
        $salle_materiel->id_salle = intval($data['id_salle']);
        $salle_materiel->id_materiel = intval($data['id_materiel']);
        $salle_materiel->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/salle_materiel");
    }

    public function delete($id)
    {
        $salle_materiel = SalleMateriel::find($id);
        $salle_materiel->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/salle_materiel");
    }
}