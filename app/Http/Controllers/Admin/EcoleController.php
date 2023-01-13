<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EcoleController extends Controller
{
    public function show()
    {
        $ecoles = Ecole::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.ecole.index', compact('ecoles'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $ecole = new Ecole();
        $ecole->type = $data['type'];
        $ecole->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/ecole");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $ecole = Ecole::find($id);
        $ecole->type = $data['type'];
        $ecole->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/ecole");
    }

    public function delete($id)
    {
        $ecole = Ecole::find($id);
        $ecole->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/ecole");
    }
}