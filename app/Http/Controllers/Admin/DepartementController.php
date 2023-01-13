<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartementController extends Controller
{
    public function show()
    {
        $departements = Departement::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.departement.index', compact('departements'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $departement = new Departement();
        $departement->libelle = $data['libelle'];
        $departement->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/departement");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $departement = Departement::find($id);
        $departement->libelle = $data['libelle'];
        $departement->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/departement");
    }

    public function delete($id)
    {
        $departement = Departement::find($id);
        $departement->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/departement");
    }
}