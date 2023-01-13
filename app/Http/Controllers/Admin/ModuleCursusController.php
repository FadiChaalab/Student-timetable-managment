<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursus;
use App\Models\ModuleCursus;
use App\Models\ModulePlanEtude;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModuleCursusController extends Controller
{
    public function show()
    {
        $module_cursuses = ModuleCursus::with('semester', 'cursus', 'modulePlanEtude')->orderBy('created_at', 'desc')->paginate(4);
        $cursuses = Cursus::all();
        $semesters = Semester::all();
        $module_plan_etudes = ModulePlanEtude::all();
        return view('admin.module_cursus.index', compact('module_cursuses', 'cursuses', 'semesters', 'module_plan_etudes'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'commentaire' => 'required|string|max:255',
                'id_module_plan_etude' => 'required',
                'id_cursus' => 'required',
                'id_semester' => 'required'
            ]);

            $data = $request->all();

            $module_cursus = new ModuleCursus();
            $module_cursus->libelle = $data['libelle'];
            $module_cursus->commentaire = $data['commentaire'];
            $module_cursus->id_module_plan_etude = intval($data['id_module_plan_etude']);
            $module_cursus->id_cursus = intval($data['id_cursus']);
            $module_cursus->id_semester = intval($data['id_semester']);
            $module_cursus->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/module_cursus");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'commentaire' => 'required|string|max:255',
            'id_module_plan_etude' => 'required',
            'id_cursus' => 'required',
            'id_semester' => 'required'
        ]);

        $data = $request->all();
        $module_cursus = ModuleCursus::find($id);
        $module_cursus->libelle = $data['libelle'];
        $module_cursus->commentaire = $data['commentaire'];
        $module_cursus->id_module_plan_etude = intval($data['id_module_plan_etude']);
        $module_cursus->id_cursus = intval($data['id_cursus']);
        $module_cursus->id_semester = intval($data['id_semester']);
        $module_cursus->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/module_cursus");
    }

    public function delete($id)
    {
        $module_cursus = ModuleCursus::find($id);
        $module_cursus->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/module_cursus");
    }
}