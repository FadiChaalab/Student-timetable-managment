<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SemesterSession;
use App\Models\TypeCursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SemesterSessionController extends Controller
{
    public function show()
    {
        $semester_sessions = SemesterSession::with('typeCursus')->orderBy('created_at', 'desc')->paginate(4);
        $type_cursuses = TypeCursus::all();
        return view('admin.semester_session.index', compact('semester_sessions', 'type_cursuses'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_type_cursus' => 'required'
        ]);

        $data = $request->all();

        $semester_session = new SemesterSession();
        $semester_session->libelle = $data['libelle'];
        $semester_session->id_type_cursus = intval($data['id_type_cursus']);
        $semester_session->save();
        Session::flash('success', 'You added a new record');
        return redirect("/admin/semester_session");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_type_cursus' => 'required'
        ]);

        $data = $request->all();
        $semester_session = SemesterSession::find($id);
        $semester_session->libelle = $data['libelle'];
        $semester_session->id_type_cursus = intval($data['id_type_cursus']);
        $semester_session->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/semester_session");
    }

    public function delete($id)
    {
        $semester_session = SemesterSession::find($id);
        $semester_session->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/semester_session");
    }
}