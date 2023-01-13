<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SemesterController extends Controller
{
    public function show()
    {
        $semesters = Semester::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.semester.index', compact('semesters'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $semester = new Semester();
        $semester->libelle = $data['libelle'];
        $semester->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/semester");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $semester = Semester::find($id);
        $semester->libelle = $data['libelle'];
        $semester->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/semester");
    }

    public function delete($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/semester");
    }
}