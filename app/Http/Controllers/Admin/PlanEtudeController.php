<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Models\Filiere;
use App\Models\PlanEtude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlanEtudeController extends Controller
{
    public function show()
    {
        $plan_etudes = PlanEtude::with('ecole', 'filiere')->orderBy('created_at', 'desc')->paginate(4);
        $ecoles = Ecole::all();
        $filieres = Filiere::all();
        return view('admin.plan_etude.index', compact('plan_etudes', 'filieres', 'ecoles'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'date_debut' => "nullable|date_format:Y-m-d",
            'date_fin' => 'nullable|required_with:date_debut|date_format:Y-m-d|after_or_equal:date_debut',
            'id_ecole' => 'required|integer',
            'id_filiere' => 'required|integer'
        ]);

        $data = $request->all();
        $plan_etude = new PlanEtude();
        $plan_etude->libelle = $data['libelle'];
        $plan_etude->date_debut = $data['date_debut'];
        $plan_etude->date_fin = $data['date_fin'];
        $plan_etude->id_ecole = $data['id_ecole'];
        $plan_etude->id_filiere = $data['id_filiere'];
        $plan_etude->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/plan_etude");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'date_debut' => "nullable|date_format:Y-m-d",
            'date_fin' => 'nullable|required_with:date_debut|date_format:Y-m-d|after_or_equal:date_debut',
            'id_ecole' => 'required|integer',
            'id_filiere' => 'required|integer'
        ]);

        $data = $request->all();
        $plan_etude = PlanEtude::find($id);
        $plan_etude->libelle = $data['libelle'];
        $plan_etude->date_debut = $data['date_debut'];
        $plan_etude->date_fin = $data['date_fin'];
        $plan_etude->id_ecole = $data['id_ecole'];
        $plan_etude->id_filiere = $data['id_filiere'];
        $plan_etude->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/plan_etude");
    }

    public function delete($id)
    {
        $plan_etude = PlanEtude::find($id);
        $plan_etude->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/plan_etude");
    }
}