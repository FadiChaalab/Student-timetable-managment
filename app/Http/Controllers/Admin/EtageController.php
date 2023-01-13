<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EtageController extends Controller
{
    public function show()
    {
        $etages = Etage::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.etage.index', compact('etages'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $etage = new Etage();
        $etage->libelle = $data['libelle'];
        $etage->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/etage");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $etage = Etage::find($id);
        $etage->libelle = $data['libelle'];
        $etage->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/etage");
    }

    public function delete($id)
    {
        $etage = Etage::find($id);
        $etage->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/etage");
    }
}