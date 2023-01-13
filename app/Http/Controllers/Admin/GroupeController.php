<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupeController extends Controller
{
    public function show()
    {
        $groupes = Groupe::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.groupe.index', compact('groupes'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'type' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $groupe = new Groupe();
        $groupe->libelle = $data['libelle'];
        $groupe->type = $data['type'];
        $groupe->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/groupe");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'type' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $groupe = Groupe::find($id);
        $groupe->libelle = $data['libelle'];
        $groupe->type = $data['type'];
        $groupe->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/groupe");
    }

    public function delete($id)
    {
        $groupe = Groupe::find($id);
        $groupe->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/groupe");
    }
}