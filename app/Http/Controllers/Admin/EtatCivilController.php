<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EtatCivil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EtatCivilController extends Controller
{
    public function show()
    {
        $etatcivils = EtatCivil::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.etatcivil.index', compact('etatcivils'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $etatcivil = new EtatCivil();
        $etatcivil->libelle = $data['libelle'];
        $etatcivil->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/etatcivil");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $etatcivil = EtatCivil::find($id);
        $etatcivil->libelle = $data['libelle'];
        $etatcivil->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/etatcivil");
    }

    public function delete($id)
    {
        $etatcivil = EtatCivil::find($id);
        $etatcivil->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/etatcivil");
    }
}