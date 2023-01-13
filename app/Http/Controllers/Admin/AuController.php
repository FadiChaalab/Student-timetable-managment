<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Au;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuController extends Controller
{
    public function show()
    {
        $aus = Au::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.au.index', compact('aus'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'annee' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $au = new Au();
        $au->libelle = $data['libelle'];
        $au->annee = $data['annee'];
        $au->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/au");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'annee' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $au = Au::find($id);
        $au->libelle = $data['libelle'];
        $au->annee = $data['annee'];
        $au->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/au");
    }

    public function delete($id)
    {
        $au = Au::find($id);
        $au->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/au");
    }
}