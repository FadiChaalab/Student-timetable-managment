<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoraireHeure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HoraireHeureController extends Controller
{
    public function show()
    {
        $heures = HoraireHeure::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.heure.index', compact('heures'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'fin' => 'required|date_format:H:i'
        ]);

        $data = $request->all();
        $heure = new HoraireHeure();
        $heure->fin = $data['fin'];
        $heure->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/heure");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fin' => 'required|date_format:H:i'
        ]);

        $data = $request->all();
        $heure = HoraireHeure::find($id);
        $heure->fin = $data['fin'];
        $heure->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/heure");
    }

    public function delete($id)
    {
        $heure = HoraireHeure::find($id);
        $heure->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/heure");
    }
}