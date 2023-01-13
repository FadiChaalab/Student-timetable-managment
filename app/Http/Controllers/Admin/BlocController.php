<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bloc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlocController extends Controller
{
    public function show()
    {
        $blocs = Bloc::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.bloc.index', compact('blocs'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $bloc = new Bloc();
        $bloc->libelle = $data['libelle'];
        $bloc->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/bloc");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $bloc = Bloc::find($id);
        $bloc->libelle = $data['libelle'];
        $bloc->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/bloc");
    }

    public function delete($id)
    {
        $bloc = Bloc::find($id);
        $bloc->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/bloc");
    }
}