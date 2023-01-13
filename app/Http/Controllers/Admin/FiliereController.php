<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Filiere;
use App\Models\TypeFiliere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FiliereController extends Controller
{
    public function show()
    {
        $filieres = Filiere::with('departement', 'type')->orderBy('created_at', 'desc')->paginate(4);
        $types = TypeFiliere::all();
        $departements = Departement::all();
        return view('admin.filiere.index', compact('filieres', 'types', 'departements'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'id_type_filiere' => 'required',
                'id_departement' => 'required'
            ]);

            $data = $request->all();

            $filiere = new Filiere();
            $filiere->libelle = $data['libelle'];
            $filiere->id_type_filiere = intval($data['id_type_filiere']);
            $filiere->id_departement = intval($data['id_departement']);
            $filiere->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/filiere");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_type_filiere' => 'required',
            'id_departement' => 'required'
        ]);

        $data = $request->all();
        $filiere = Filiere::find($id);
        $filiere->libelle = $data['libelle'];
        $filiere->id_type_filiere = intval($data['id_type_filiere']);
        $filiere->id_departement = intval($data['id_departement']);
        $filiere->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/filiere");
    }

    public function delete($id)
    {
        $filiere = Filiere::find($id);
        $filiere->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/filiere");
    }
}