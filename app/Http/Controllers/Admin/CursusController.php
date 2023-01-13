<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Au;
use App\Models\Cursus;
use App\Models\FiliereNiveau;
use App\Models\PlanEtude;
use App\Models\TypeCursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CursusController extends Controller
{
    public function show()
    {
        $cursuses = Cursus::with('au', 'type', 'filiereNiveau', 'planEtude')->orderBy('created_at', 'desc')->paginate(4);
        $types = TypeCursus::all();
        $aus = Au::all();
        $filiere_niveaux = FiliereNiveau::all();
        $plan_etudes = PlanEtude::all();
        return view('admin.cursus.index', compact('cursuses', 'types', 'aus', 'filiere_niveaux', 'plan_etudes'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'id_plan_etude' => 'required',
                'id_au' => 'required',
                'id_filiere_niveau' => 'required',
                'id_type_cursus' => 'required'
            ]);

            $data = $request->all();

            $cursus = new Cursus();
            $cursus->libelle = $data['libelle'];
            $cursus->id_plan_etude = intval($data['id_plan_etude']);
            $cursus->id_au = intval($data['id_au']);
            $cursus->id_filiere_niveau = intval($data['id_filiere_niveau']);
            $cursus->id_type_cursus = intval($data['id_type_cursus']);
            $cursus->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/cursus");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_plan_etude' => 'required',
            'id_au' => 'required',
            'id_filiere_niveau' => 'required',
            'id_type_cursus' => 'required'
        ]);

        $data = $request->all();
        $cursus = Cursus::find($id);
        $cursus->libelle = $data['libelle'];
        $cursus->id_plan_etude = intval($data['id_plan_etude']);
        $cursus->id_au = intval($data['id_au']);
        $cursus->id_filiere_niveau = intval($data['id_filiere_niveau']);
        $cursus->id_type_cursus = intval($data['id_type_cursus']);
        $cursus->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/cursus");
    }

    public function delete($id)
    {
        $cursus = Cursus::find($id);
        $cursus->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/cursus");
    }
}