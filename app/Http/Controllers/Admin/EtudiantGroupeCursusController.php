<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\EtudiantGroupeCursus;
use App\Models\GroupeCursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EtudiantGroupeCursusController extends Controller
{
    public function show()
    {
        $etudiant_groupe_cursuses = EtudiantGroupeCursus::with('groupeCursus', 'student')->orderBy('created_at', 'desc')->paginate(4);
        $students = Etudiant::all();
        $groupe_cursuses = GroupeCursus::all();
        return view('admin.etudiant_groupe_cursus.index', compact('etudiant_groupe_cursuses', 'students', 'groupe_cursuses'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'id_groupe_cursus' => 'required',
                'id_etudiant' => 'required'
            ]);

            $data = $request->all();

            $etudiant_groupe_cursus = new EtudiantGroupeCursus();
            $etudiant_groupe_cursus->libelle = $data['libelle'];
            $etudiant_groupe_cursus->id_groupe_cursus = intval($data['id_groupe_cursus']);
            $etudiant_groupe_cursus->id_etudiant = intval($data['id_etudiant']);
            $etudiant_groupe_cursus->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/etudiant_groupe_cursus");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_groupe_cursus' => 'required',
            'id_etudiant' => 'required'
        ]);

        $data = $request->all();
        $etudiant_groupe_cursus = EtudiantGroupeCursus::find($id);
        $etudiant_groupe_cursus->libelle = $data['libelle'];
        $etudiant_groupe_cursus->id_groupe_cursus = intval($data['id_groupe_cursus']);
        $etudiant_groupe_cursus->id_etudiant = intval($data['id_etudiant']);
        $etudiant_groupe_cursus->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/etudiant_groupe_cursus");
    }

    public function delete($id)
    {
        $etudiant_groupe_cursus = EtudiantGroupeCursus::find($id);
        $etudiant_groupe_cursus->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/etudiant_groupe_cursus");
    }
}