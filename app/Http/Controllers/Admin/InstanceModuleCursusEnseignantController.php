<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\InstanceModuleCursus;
use App\Models\InstanceModuleCursusEnseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InstanceModuleCursusEnseignantController extends Controller
{
    public function show()
    {
        $instance_module_cursus_enseignants = InstanceModuleCursusEnseignant::with('instanceModuleCursus', 'enseignant')->orderBy('created_at', 'desc')->paginate(4);
        $instance_module_cursuses = InstanceModuleCursus::all();
        $enseignants = Enseignant::all();
        return view('admin.instance_module_cursus_enseignant.index', compact('instance_module_cursus_enseignants', 'instance_module_cursuses', 'enseignants'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_i_m_c' => 'required',
            'id_enseignant' => 'required'
        ]);

        $data = $request->all();

        $instance_module_cursus_enseignant = new InstanceModuleCursusEnseignant();
        $instance_module_cursus_enseignant->libelle = $data['libelle'];
        $instance_module_cursus_enseignant->id_i_m_c = intval($data['id_i_m_c']);
        $instance_module_cursus_enseignant->id_enseignant = intval($data['id_enseignant']);
        $instance_module_cursus_enseignant->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/instance_module_cursus_enseignant");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_i_m_c' => 'required',
            'id_enseignant' => 'required'
        ]);

        $data = $request->all();
        $instance_module_cursus_enseignant = InstanceModuleCursusEnseignant::find($id);
        $instance_module_cursus_enseignant->libelle = $data['libelle'];
        $instance_module_cursus_enseignant->id_i_m_c = intval($data['id_i_m_c']);
        $instance_module_cursus_enseignant->id_enseignant = intval($data['id_enseignant']);
        $instance_module_cursus_enseignant->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/instance_module_cursus_enseignant");
    }

    public function delete($id)
    {
        $instance_module_cursus_enseignant = InstanceModuleCursusEnseignant::find($id);
        $instance_module_cursus_enseignant->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/instance_module_cursus_enseignant");
    }
}