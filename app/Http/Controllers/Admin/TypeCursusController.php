<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeCursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TypeCursusController extends Controller
{
    public function show()
    {
        $types = TypeCursus::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.type_cursus.index', compact('types'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $type = new TypeCursus();
        $type->libelle = $data['libelle'];
        $type->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/type_cursus");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $type = TypeCursus::find($id);
        $type->libelle = $data['libelle'];
        $type->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/type_cursus");
    }

    public function delete($id)
    {
        $type = TypeCursus::find($id);
        $type->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/type_cursus");
    }
}