<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NiveauController extends Controller
{
    public function show()
    {
        $niveaux = Niveau::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.niveau.index', compact('niveaux'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $niveau = new Niveau();
        $niveau->libelle = $data['libelle'];
        $niveau->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/niveau");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $niveau = Niveau::find($id);
        $niveau->libelle = $data['libelle'];
        $niveau->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/niveau");
    }

    public function delete($id)
    {
        $niveau = Niveau::find($id);
        $niveau->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/niveau");
    }
}