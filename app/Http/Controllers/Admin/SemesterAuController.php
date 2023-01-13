<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Au;
use App\Models\Semester;
use App\Models\SemesterAu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SemesterAuController extends Controller
{
    public function show()
    {
        $semester_aus = SemesterAu::with('au', 'semester')->orderBy('created_at', 'desc')->paginate(4);
        $aus = Au::all();
        $semesters = Semester::all();
        return view('admin.semester_au.index', compact('semester_aus', 'aus', 'semesters'));
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'id_au' => 'required',
                'id_semester' => 'required',
                'debut' => "nullable|date_format:Y-m-d",
                'fin' => 'nullable|required_with:date_debut|date_format:Y-m-d|after_or_equal:date_debut'
            ]);

            $data = $request->all();

            $semester_au = new SemesterAu();
            $semester_au->libelle = $data['libelle'];
            $semester_au->id_au = intval($data['id_au']);
            $semester_au->id_semester = intval($data['id_semester']);
            $semester_au->debut = $data['debut'];
            $semester_au->fin = $data['fin'];
            $semester_au->save();
            Session::flash('success', 'You added a new record');
            return redirect("/admin/semester_au");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'id_au' => 'required',
            'id_semester' => 'required',
            'debut' => "nullable|date_format:Y-m-d",
            'fin' => 'nullable|required_with:date_debut|date_format:Y-m-d|after_or_equal:date_debut'
        ]);

        $data = $request->all();
        $semester_au = SemesterAu::find($id);
        $semester_au->libelle = $data['libelle'];
        $semester_au->id_au = intval($data['id_au']);
        $semester_au->id_semester = intval($data['id_semester']);
        $semester_au->debut = $data['debut'];
        $semester_au->fin = $data['fin'];
        $semester_au->save();
        Session::flash('success', 'Record was successfully updated');
        return redirect("/admin/semester_au");
    }

    public function delete($id)
    {
        $semester_au = SemesterAu::find($id);
        $semester_au->delete();
        Session::flash('success', 'Record was successfully deleted');
        return redirect("/admin/semester_au");
    }
}