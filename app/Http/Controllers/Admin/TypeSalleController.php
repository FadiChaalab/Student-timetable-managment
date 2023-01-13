<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeSalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TypeSalleController extends Controller
{
    public function show()
    {
        $types = TypeSalle::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.type_salle.index', compact('types'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $type = new TypeSalle();
        $type->libelle = $data['libelle'];
        $type->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/type_salle");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $type = TypeSalle::find($id);
        $type->libelle = $data['libelle'];
        $type->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/type_salle");
    }

    public function delete($id)
    {
        $type = TypeSalle::find($id);
        $type->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/type_salle");
    }
}