<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Models\InstanceModuleCursus;
use App\Models\ModuleCursus;
use App\Models\SemesterAu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InstanceModuleCursusController extends Controller
{
    public function show()
    {
        $instance_module_cursuses = InstanceModuleCursus::with('ecole', 'moduleCursus', 'semesterAu')->orderBy('created_at', 'desc')->paginate(4);
        $module_cursuses = ModuleCursus::all();
        $semester_aus = SemesterAu::all();
        $ecoles = Ecole::all();
        return view('admin.instance_module_cursus.index', compact('instance_module_cursuses', 'module_cursuses', 'semester_aus', 'ecoles'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_module_cursus' => 'required',
            'id_semester_au' => 'required',
            'id_ecole' => 'required'
        ]);

        $data = $request->all();

        $instance_module_cursus = new InstanceModuleCursus();
        $instance_module_cursus->libelle = $data['libelle'];
        $instance_module_cursus->id_module_cursus = intval($data['id_module_cursus']);
        $instance_module_cursus->id_semester_au = intval($data['id_semester_au']);
        $instance_module_cursus->id_ecole = intval($data['id_ecole']);
        $instance_module_cursus->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/instance_module_cursus");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_module_cursus' => 'required',
            'id_semester_au' => 'required',
            'id_ecole' => 'required'
        ]);

        $data = $request->all();
        $instance_module_cursus = InstanceModuleCursus::find($id);
        $instance_module_cursus->libelle = $data['libelle'];
        $instance_module_cursus->id_module_cursus = intval($data['id_module_cursus']);
        $instance_module_cursus->id_semester_au = intval($data['id_semester_au']);
        $instance_module_cursus->id_ecole = intval($data['id_ecole']);
        $instance_module_cursus->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/instance_module_cursus");
    }

    public function delete($id)
    {
        $instance_module_cursus = InstanceModuleCursus::find($id);
        $instance_module_cursus->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/instance_module_cursus");
    }
}