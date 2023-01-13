<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Models\FiliereNiveau;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FiliereNiveauController extends Controller
{
    public function show()
    {
        $filiere_niveaux = FiliereNiveau::with('filiere', 'niveau')->orderBy('created_at', 'desc')->paginate(4);
        $filieres = Filiere::all();
        $niveaux = Niveau::all();
        return view('admin.filiere_niveau.index', compact('filiere_niveaux', 'filieres', 'niveaux'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'id_filiere' => 'required',
                'id_niveau' => 'required'
            ]);

            $data = $request->all();

            $filiere_niveau = new FiliereNiveau();
            $filiere_niveau->id_filiere = intval($data['id_filiere']);
            $filiere_niveau->id_niveau = intval($data['id_niveau']);
            $filiere_niveau->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/filiere_niveau");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_filiere' => 'required',
            'id_niveau' => 'required'
        ]);

        $data = $request->all();
        $filiere_niveau = FiliereNiveau::find($id);
        $filiere_niveau->id_filiere = intval($data['id_filiere']);
        $filiere_niveau->id_niveau = intval($data['id_niveau']);
        $filiere_niveau->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/filiere_niveau");
    }

    public function delete($id)
    {
        $filiere_niveau = FiliereNiveau::find($id);
        $filiere_niveau->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/filiere_niveau");
    }
}