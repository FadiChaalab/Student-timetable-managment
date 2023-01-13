<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function show()
    {
        $roles = Role::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.role.index', compact('roles'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $role = new Role();
        $role->libelle = $data['libelle'];
        $role->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/role");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $role = Role::find($id);
        $role->libelle = $data['libelle'];
        $role->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/role");
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/role");
    }
}