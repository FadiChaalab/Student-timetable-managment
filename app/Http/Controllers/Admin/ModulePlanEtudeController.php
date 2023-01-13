<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FiliereNiveau;
use App\Models\ModulePlanEtude;
use App\Models\PlanEtude;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModulePlanEtudeController extends Controller
{
    public function show()
    {
        $module_plan_etudes = ModulePlanEtude::with('planEtude', 'filiereNiveau', 'semester')->orderBy('created_at', 'desc')->paginate(4);
        $plan_etudes = PlanEtude::all();
        $filiere_niveaux = FiliereNiveau::all();
        $semesters = Semester::all();
        return view('admin.module_plan_etude.index', compact('module_plan_etudes', 'filiere_niveaux', 'plan_etudes', 'semesters'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'id_plan_etude' => 'required',
                'id_filiere_niveau' => 'required',
                'id_semester' => 'required',
                'libelle' => 'required|string|max:255',
                'coefficient' => 'required|numeric'
            ]);

            $data = $request->all();

            $module_plan_etude = new ModulePlanEtude();
            $module_plan_etude->id_plan_etude = intval($data['id_plan_etude']);
            $module_plan_etude->id_filiere_niveau = intval($data['id_filiere_niveau']);
            $module_plan_etude->id_semester = intval($data['id_semester']);
            $module_plan_etude->libelle = $data['libelle'];
            $module_plan_etude->coefficient = $data['coefficient'];
            $module_plan_etude->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/module_plan_etude");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_plan_etude' => 'required',
            'id_filiere_niveau' => 'required',
            'id_semester' => 'required',
            'libelle' => 'required|string|max:255',
            'coefficient' => 'required|numeric'
        ]);

        $data = $request->all();
        $module_plan_etude = ModulePlanEtude::find($id);
        $module_plan_etude->id_plan_etude = intval($data['id_plan_etude']);
        $module_plan_etude->id_filiere_niveau = intval($data['id_filiere_niveau']);
        $module_plan_etude->id_semester = intval($data['id_semester']);
        $module_plan_etude->libelle = $data['libelle'];
        $module_plan_etude->coefficient = $data['coefficient'];
        $module_plan_etude->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/module_plan_etude");
    }

    public function delete($id)
    {
        $module_plan_etude = ModulePlanEtude::find($id);
        $module_plan_etude->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/module_plan_etude");
    }
}