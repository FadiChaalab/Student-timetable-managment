<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bloc;
use App\Models\Etage;
use App\Models\Salle;
use App\Models\TypeSalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalleController extends Controller
{
    public function show()
    {
        $salles = Salle::with('bloc', 'etage', 'typeSalle')->orderBy('created_at', 'desc')->paginate(4);
        $blocs = Bloc::all();
        $etages = Etage::all();
        $types = TypeSalle::all();
        return view('admin.salle.index', compact('salles', 'blocs', 'etages', 'types'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer',
            'planification' => 'required|string|max:255',
            'id_bloc' => 'required',
            'id_etage' => 'required',
            'id_type_salle' => 'required'
        ]);

        $data = $request->all();
        $salle = new Salle();
        $salle->libelle = $data['libelle'];
        $salle->description = $data['description'];
        $salle->capacity = $data['capacity'];
        $salle->planification = $data['planification'];
        $salle->id_bloc = intval($data['id_bloc']);
        $salle->id_etage = intval($data['id_etage']);
        $salle->id_type_salle = intval($data['id_type_salle']);
        $salle->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/salle");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'capacity' => 'required|integer',
            'planification' => 'required|string|max:255',
            'id_bloc' => 'required|integer',
            'id_etage' => 'required|integer',
            'id_type_salle' => 'required|integer'
        ]);

        $data = $request->all();
        $salle = Salle::find($id);
        $salle->libelle = $data['libelle'];
        $salle->description = $data['description'];
        $salle->capacity = $data['capacity'];
        $salle->planification = $data['planification'];
        $salle->id_bloc = intval($data['id_bloc']);
        $salle->id_etage = intval($data['id_etage']);
        $salle->id_type_salle = intval($data['id_type_salle']);
        $salle->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/salle");
    }

    public function delete($id)
    {
        $salle = Salle::find($id);
        $salle->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/salle");
    }
}