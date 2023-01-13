<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cursus;
use App\Models\Groupe;
use App\Models\GroupeCursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupeCursusController extends Controller
{
    public function show()
    {
        $groupe_cursuses = GroupeCursus::with('groupe', 'cursus')->orderBy('created_at', 'desc')->paginate(4);
        $cursuses = Cursus::all();
        $groupes = Groupe::all();
        return view('admin.groupe_cursus.index', compact('groupe_cursuses', 'cursuses', 'groupes'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'id_groupe' => 'required',
                'id_cursus' => 'required'
            ]);

            $data = $request->all();

            $groupe_cursus = new GroupeCursus();
            $groupe_cursus->libelle = $data['libelle'];
            $groupe_cursus->id_groupe = intval($data['id_groupe']);
            $groupe_cursus->id_cursus = intval($data['id_cursus']);
            $groupe_cursus->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/groupe_cursus");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_groupe' => 'required',
            'id_cursus' => 'required'
        ]);

        $data = $request->all();
        $groupe_cursus = GroupeCursus::find($id);
        $groupe_cursus->libelle = $data['libelle'];
        $groupe_cursus->id_groupe = intval($data['id_groupe']);
        $groupe_cursus->id_cursus = intval($data['id_cursus']);
        $groupe_cursus->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/groupe_cursus");
    }

    public function delete($id)
    {
        $groupe_cursus = GroupeCursus::find($id);
        $groupe_cursus->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/groupe_cursus");
    }
}