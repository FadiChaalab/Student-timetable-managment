<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeFiliere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TypeFiliereController extends Controller
{
    public function show()
    {
        $types = TypeFiliere::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.type_filiere.index', compact('types'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $type = new TypeFiliere();
        $type->libelle = $data['libelle'];
        $type->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/type_filiere");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $type = TypeFiliere::find($id);
        $type->libelle = $data['libelle'];
        $type->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/type_filiere");
    }

    public function delete($id)
    {
        $type = TypeFiliere::find($id);
        $type->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/type_filiere");
    }
}