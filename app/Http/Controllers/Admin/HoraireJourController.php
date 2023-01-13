<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoraireJour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HoraireJourController extends Controller
{
    public function show()
    {
        $jours = HoraireJour::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.jour.index', compact('jours'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $jour = new HoraireJour();
        $jour->libelle = $data['libelle'];
        $jour->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/jour");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $jour = HoraireJour::find($id);
        $jour->libelle = $data['libelle'];
        $jour->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/jour");
    }

    public function delete($id)
    {
        $jour = HoraireJour::find($id);
        $jour->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/jour");
    }
}