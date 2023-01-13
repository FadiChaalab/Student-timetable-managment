<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AuController;
use App\Http\Controllers\Admin\BlocController;
use App\Http\Controllers\Admin\CursusController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\EcoleController;
use App\Http\Controllers\Admin\EtageController;
use App\Http\Controllers\Admin\EtatCivilController;
use App\Http\Controllers\Admin\EtudiantGroupeCursusController;
use App\Http\Controllers\Admin\FiliereController;
use App\Http\Controllers\Admin\FiliereNiveauController;
use App\Http\Controllers\Admin\GroupeController;
use App\Http\Controllers\Admin\GroupeCursusController;
use App\Http\Controllers\Admin\HoraireController;
use App\Http\Controllers\Admin\HoraireHeureController;
use App\Http\Controllers\Admin\HoraireJourController;
use App\Http\Controllers\Admin\InstanceGroupeCursusHoraireController;
use App\Http\Controllers\Admin\InstanceModuleCursusController;
use App\Http\Controllers\Admin\InstanceModuleCursusEnseignantController;
use App\Http\Controllers\Admin\JourHoraireHeureController;
use App\Http\Controllers\Admin\MaterielController;
use App\Http\Controllers\Admin\ModuleCursusController;
use App\Http\Controllers\Admin\ModulePlanEtudeController;
use App\Http\Controllers\Admin\NiveauController;
use App\Http\Controllers\Admin\PlanEtudeController;
use App\Http\Controllers\Admin\PreferenceModuleHoraireEnseignantController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SalleController;
use App\Http\Controllers\Admin\SalleMaterielController;
use App\Http\Controllers\Admin\SemesterAuController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SemesterSessionController;
use App\Http\Controllers\Admin\TypeCursusController;
use App\Http\Controllers\Admin\TypeFiliereController;
use App\Http\Controllers\Admin\TypeSalleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::put('/admin/{id}/prodile_update', [AdminController::class, 'profile_update'])->name('admin.profile_update');
    Route::put('/admin/{id}/prodile_update_image', [AdminController::class, 'profile_update_image'])->name('admin.profile_update_image');
    // Au routes
    Route::get('/admin/au', [AuController::class, 'show'])->name('admin.au');
    Route::post('/admin/au_post', [AuController::class, 'add'])->name('admin.au.add');
    Route::put('/admin/au_edit/{id}', [AuController::class, 'update'])->name('admin.au.update');
    Route::delete('/admin/au_delete/{id}', [AuController::class, 'delete'])->name('admin.au.delete');
    // Bloc routes
    Route::get('/admin/bloc', [BlocController::class, 'show'])->name('admin.bloc');
    Route::post('/admin/bloc_post', [BlocController::class, 'add'])->name('admin.bloc.add');
    Route::put('/admin/bloc_edit/{id}', [BlocController::class, 'update'])->name('admin.bloc.update');
    Route::delete('/admin/bloc_delete/{id}', [BlocController::class, 'delete'])->name('admin.bloc.delete');
    // Departement routes
    Route::get('/admin/departement', [DepartementController::class, 'show'])->name('admin.departement');
    Route::post('/admin/departement_post', [DepartementController::class, 'add'])->name('admin.departement.add');
    Route::put('/admin/departement_edit/{id}', [DepartementController::class, 'update'])->name('admin.departement.update');
    Route::delete('/admin/departement_delete/{id}', [DepartementController::class, 'delete'])->name('admin.departement.delete');
    // Ecole routes
    Route::get('/admin/ecole', [EcoleController::class, 'show'])->name('admin.ecole');
    Route::post('/admin/ecole_post', [EcoleController::class, 'add'])->name('admin.ecole.add');
    Route::put('/admin/ecole_edit/{id}', [EcoleController::class, 'update'])->name('admin.ecole.update');
    Route::delete('/admin/ecole_delete/{id}', [EcoleController::class, 'delete'])->name('admin.ecole.delete');
    // Ecole routes
    Route::get('/admin/etage', [EtageController::class, 'show'])->name('admin.etage');
    Route::post('/admin/etage_post', [EtageController::class, 'add'])->name('admin.etage.add');
    Route::put('/admin/etage_edit/{id}', [EtageController::class, 'update'])->name('admin.etage.update');
    Route::delete('/admin/etage_delete/{id}', [EtageController::class, 'delete'])->name('admin.etage.delete');
    // Etat Civil routes
    Route::get('/admin/etatcivil', [EtatCivilController::class, 'show'])->name('admin.etatcivil');
    Route::post('/admin/etatcivil_post', [EtatCivilController::class, 'add'])->name('admin.etatcivil.add');
    Route::put('/admin/etatcivil_edit/{id}', [EtatCivilController::class, 'update'])->name('admin.etatcivil.update');
    Route::delete('/admin/etatcivil_delete/{id}', [EtatCivilController::class, 'delete'])->name('admin.etatcivil.delete');
    // Niveau routes
    Route::get('/admin/niveau', [NiveauController::class, 'show'])->name('admin.niveau');
    Route::post('/admin/niveau_post', [NiveauController::class, 'add'])->name('admin.niveau.add');
    Route::put('/admin/niveau_edit/{id}', [NiveauController::class, 'update'])->name('admin.niveau.update');
    Route::delete('/admin/niveau_delete/{id}', [NiveauController::class, 'delete'])->name('admin.niveau.delete');
    // Horaire routes
    Route::get('/admin/horaire', [HoraireController::class, 'show'])->name('admin.horaire');
    Route::post('/admin/horaire_post', [HoraireController::class, 'add'])->name('admin.horaire.add');
    Route::put('/admin/horaire_edit/{id}', [HoraireController::class, 'update'])->name('admin.horaire.update');
    Route::delete('/admin/horaire_delete/{id}', [HoraireController::class, 'delete'])->name('admin.horaire.delete');
    // Heure routes
    Route::get('/admin/heure', [HoraireHeureController::class, 'show'])->name('admin.heure');
    Route::post('/admin/heure_post', [HoraireHeureController::class, 'add'])->name('admin.heure.add');
    Route::put('/admin/heure_edit/{id}', [HoraireHeureController::class, 'update'])->name('admin.heure.update');
    Route::delete('/admin/heure_delete/{id}', [HoraireHeureController::class, 'delete'])->name('admin.heure.delete');
    // Jour routes
    Route::get('/admin/jour', [HoraireJourController::class, 'show'])->name('admin.jour');
    Route::post('/admin/jour_post', [HoraireJourController::class, 'add'])->name('admin.jour.add');
    Route::put('/admin/jour_edit/{id}', [HoraireJourController::class, 'update'])->name('admin.jour.update');
    Route::delete('/admin/jour_delete/{id}', [HoraireJourController::class, 'delete'])->name('admin.jour.delete');
    // Jour routes
    Route::get('/admin/jour_horaire_heure', [JourHoraireHeureController::class, 'show'])->name('admin.jour_horaire_heure');
    Route::post('/admin/jour_horaire_heure_post', [JourHoraireHeureController::class, 'add'])->name('admin.jour_horaire_heure.add');
    Route::put('/admin/jour_horaire_heure_edit/{id}', [JourHoraireHeureController::class, 'update'])->name('admin.jour_horaire_heure.update');
    Route::delete('/admin/jour_horaire_heure_delete/{id}', [JourHoraireHeureController::class, 'delete'])->name('admin.jour_horaire_heure.delete');
    // Role routes
    Route::get('/admin/role', [RoleController::class, 'show'])->name('admin.role');
    Route::post('/admin/role_post', [RoleController::class, 'add'])->name('admin.role.add');
    Route::put('/admin/role_edit/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    Route::delete('/admin/role_delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
    // Semester routes
    Route::get('/admin/semester', [SemesterController::class, 'show'])->name('admin.semester');
    Route::post('/admin/semester_post', [SemesterController::class, 'add'])->name('admin.semester.add');
    Route::put('/admin/semester_edit/{id}', [SemesterController::class, 'update'])->name('admin.semester.update');
    Route::delete('/admin/semester_delete/{id}', [SemesterController::class, 'delete'])->name('admin.semester.delete');
    // Semester au routes
    Route::get('/admin/semester_au', [SemesterAuController::class, 'show'])->name('admin.semester_au');
    Route::post('/admin/semester_au_post', [SemesterAuController::class, 'add'])->name('admin.semester_au.add');
    Route::put('/admin/semester_au_edit/{id}', [SemesterAuController::class, 'update'])->name('admin.semester_au.update');
    Route::delete('/admin/semester_au_delete/{id}', [SemesterAuController::class, 'delete'])->name('admin.semester_au.delete');
    // Semester session routes
    Route::get('/admin/semester_session', [SemesterSessionController::class, 'show'])->name('admin.semester_session');
    Route::post('/admin/semester_session_post', [SemesterSessionController::class, 'add'])->name('admin.semester_session.add');
    Route::put('/admin/semester_session_edit/{id}', [SemesterSessionController::class, 'update'])->name('admin.semester_session.update');
    Route::delete('/admin/semester_session_delete/{id}', [SemesterSessionController::class, 'delete'])->name('admin.semester_session.delete');
    // Groupe routes
    Route::get('/admin/groupe', [GroupeController::class, 'show'])->name('admin.groupe');
    Route::post('/admin/groupe_post', [GroupeController::class, 'add'])->name('admin.groupe.add');
    Route::put('/admin/groupe_edit/{id}', [GroupeController::class, 'update'])->name('admin.groupe.update');
    Route::delete('/admin/groupe_delete/{id}', [GroupeController::class, 'delete'])->name('admin.groupe.delete');
    // Type filiere routes
    Route::get('/admin/type_filiere', [TypeFiliereController::class, 'show'])->name('admin.type_filiere');
    Route::post('/admin/type_filiere_post', [TypeFiliereController::class, 'add'])->name('admin.type_filiere.add');
    Route::put('/admin/type_filiere_edit/{id}', [TypeFiliereController::class, 'update'])->name('admin.type_filiere.update');
    Route::delete('/admin/type_filiere_delete/{id}', [TypeFiliereController::class, 'delete'])->name('admin.type_filiere.delete');
    // Filiere routes
    Route::get('/admin/filiere', [FiliereController::class, 'show'])->name('admin.filiere');
    Route::post('/admin/filiere_post', [FiliereController::class, 'add'])->name('admin.filiere.add');
    Route::put('/admin/filiere_edit/{id}', [FiliereController::class, 'update'])->name('admin.filiere.update');
    Route::delete('/admin/filiere_delete/{id}', [FiliereController::class, 'delete'])->name('admin.filiere.delete');
    // Materiel routes
    Route::get('/admin/materiel', [MaterielController::class, 'show'])->name('admin.materiel');
    Route::post('/admin/materiel_post', [MaterielController::class, 'add'])->name('admin.materiel.add');
    Route::put('/admin/materiel_edit/{id}', [MaterielController::class, 'update'])->name('admin.materiel.update');
    Route::delete('/admin/materiel_delete/{id}', [MaterielController::class, 'delete'])->name('admin.materiel.delete');
    // Type cursus routes
    Route::get('/admin/type_cursus', [TypeCursusController::class, 'show'])->name('admin.type_cursus');
    Route::post('/admin/type_cursus_post', [TypeCursusController::class, 'add'])->name('admin.type_cursus.add');
    Route::put('/admin/type_cursus_edit/{id}', [TypeCursusController::class, 'update'])->name('admin.type_cursus.update');
    Route::delete('/admin/type_cursus_delete/{id}', [TypeCursusController::class, 'delete'])->name('admin.type_cursus.delete');
    // Plan etude routes
    Route::get('/admin/plan_etude', [PlanEtudeController::class, 'show'])->name('admin.plan_etude');
    Route::post('/admin/plan_etude_post', [PlanEtudeController::class, 'add'])->name('admin.plan_etude.add');
    Route::put('/admin/plan_etude_edit/{id}', [PlanEtudeController::class, 'update'])->name('admin.plan_etude.update');
    Route::delete('/admin/plan_etude_delete/{id}', [PlanEtudeController::class, 'delete'])->name('admin.plan_etude.delete');
    // Type salle routes
    Route::get('/admin/type_salle', [TypeSalleController::class, 'show'])->name('admin.type_salle');
    Route::post('/admin/type_salle_post', [TypeSalleController::class, 'add'])->name('admin.type_salle.add');
    Route::put('/admin/type_salle_edit/{id}', [TypeSalleController::class, 'update'])->name('admin.type_salle.update');
    Route::delete('/admin/type_salle_delete/{id}', [TypeSalleController::class, 'delete'])->name('admin.type_salle.delete');
    // Salle routes
    Route::get('/admin/salle', [SalleController::class, 'show'])->name('admin.salle');
    Route::post('/admin/salle_post', [SalleController::class, 'add'])->name('admin.salle.add');
    Route::put('/admin/salle_edit/{id}', [SalleController::class, 'update'])->name('admin.salle.update');
    Route::delete('/admin/salle_delete/{id}', [SalleController::class, 'delete'])->name('admin.salle.delete');
    // Salle materiel routes
    Route::get('/admin/salle_materiel', [SalleMaterielController::class, 'show'])->name('admin.salle_materiel');
    Route::post('/admin/salle_materiel_post', [SalleMaterielController::class, 'add'])->name('admin.salle_materiel.add');
    Route::put('/admin/salle_materiel_edit/{id}', [SalleMaterielController::class, 'update'])->name('admin.salle_materiel.update');
    Route::delete('/admin/salle_materiel_delete/{id}', [SalleMaterielController::class, 'delete'])->name('admin.salle_materiel.delete');
    // Instance module cursus routes
    Route::get('/admin/instance_module_cursus', [InstanceModuleCursusController::class, 'show'])->name('admin.instance_module_cursus');
    Route::post('/admin/instance_module_cursus_post', [InstanceModuleCursusController::class, 'add'])->name('admin.instance_module_cursus.add');
    Route::put('/admin/instance_module_cursus_edit/{id}', [InstanceModuleCursusController::class, 'update'])->name('admin.instance_module_cursus.update');
    Route::delete('/admin/instance_module_cursus_delete/{id}', [InstanceModuleCursusController::class, 'delete'])->name('admin.instance_module_cursus.delete');
    // Instance module cursus enseignant routes
    Route::get('/admin/instance_module_cursus_enseignant', [InstanceModuleCursusEnseignantController::class, 'show'])->name('admin.instance_module_cursus_enseignant');
    Route::post('/admin/instance_module_cursus_enseignant_post', [InstanceModuleCursusEnseignantController::class, 'add'])->name('admin.instance_module_cursus_enseignant.add');
    Route::put('/admin/instance_module_cursus_enseignant_edit/{id}', [InstanceModuleCursusEnseignantController::class, 'update'])->name('admin.instance_module_cursus_enseignant.update');
    Route::delete('/admin/instance_module_cursus_enseignant_delete/{id}', [InstanceModuleCursusEnseignantController::class, 'delete'])->name('admin.instance_module_cursus_enseignant.delete');
    // Preference module horaire enseignant routes
    Route::get('/admin/preference_module_horaire_enseignant', [PreferenceModuleHoraireEnseignantController::class, 'show'])->name('admin.preference_module_horaire_enseignant');
    Route::post('/admin/preference_module_horaire_enseignant_post', [PreferenceModuleHoraireEnseignantController::class, 'add'])->name('admin.preference_module_horaire_enseignant.add');
    Route::put('/admin/preference_module_horaire_enseignant_edit/{id}', [PreferenceModuleHoraireEnseignantController::class, 'update'])->name('admin.preference_module_horaire_enseignant.update');
    Route::delete('/admin/preference_module_horaire_enseignant_delete/{id}', [PreferenceModuleHoraireEnseignantController::class, 'delete'])->name('admin.preference_module_horaire_enseignant.delete');
    // Instance groupe cursus horaire enseignant routes
    Route::get('/admin/instance_groupe_horaire', [InstanceGroupeCursusHoraireController::class, 'show'])->name('admin.instance_groupe_horaire');
    Route::post('/admin/instance_groupe_horaire_post', [InstanceGroupeCursusHoraireController::class, 'add'])->name('admin.instance_groupe_horaire.add');
    Route::put('/admin/instance_groupe_horaire_edit/{id}', [InstanceGroupeCursusHoraireController::class, 'update'])->name('admin.instance_groupe_horaire.update');
    Route::delete('/admin/instance_groupe_horaire_delete/{id}', [InstanceGroupeCursusHoraireController::class, 'delete'])->name('admin.instance_groupe_horaire.delete');
    // Filiere niveau routes
    Route::get('/admin/filiere_niveau', [FiliereNiveauController::class, 'show'])->name('admin.filiere_niveau');
    Route::post('/admin/filiere_niveau_post', [FiliereNiveauController::class, 'add'])->name('admin.filiere_niveau.add');
    Route::put('/admin/filiere_niveau_edit/{id}', [FiliereNiveauController::class, 'update'])->name('admin.filiere_niveau.update');
    Route::delete('/admin/filiere_niveau_delete/{id}', [FiliereNiveauController::class, 'delete'])->name('admin.filiere_niveau.delete');
    // Module plan etude routes
    Route::get('/admin/module_plan_etude', [ModulePlanEtudeController::class, 'show'])->name('admin.module_plan_etude');
    Route::post('/admin/module_plan_etude_post', [ModulePlanEtudeController::class, 'add'])->name('admin.module_plan_etude.add');
    Route::put('/admin/module_plan_etude_edit/{id}', [ModulePlanEtudeController::class, 'update'])->name('admin.module_plan_etude.update');
    Route::delete('/admin/module_plan_etude_delete/{id}', [ModulePlanEtudeController::class, 'delete'])->name('admin.module_plan_etude.delete');
    // Cursus routes
    Route::get('/admin/cursus', [CursusController::class, 'show'])->name('admin.cursus');
    Route::post('/admin/cursus_post', [CursusController::class, 'add'])->name('admin.cursus.add');
    Route::put('/admin/cursus_edit/{id}', [CursusController::class, 'update'])->name('admin.cursus.update');
    Route::delete('/admin/cursus_delete/{id}', [CursusController::class, 'delete'])->name('admin.cursus.delete');
    // Module cursus routes
    Route::get('/admin/module_cursus', [ModuleCursusController::class, 'show'])->name('admin.module_cursus');
    Route::post('/admin/module_cursus_post', [ModuleCursusController::class, 'add'])->name('admin.module_cursus.add');
    Route::put('/admin/module_cursus_edit/{id}', [ModuleCursusController::class, 'update'])->name('admin.module_cursus.update');
    Route::delete('/admin/module_cursus_delete/{id}', [ModuleCursusController::class, 'delete'])->name('admin.module_cursus.delete');
    // Groupe cursus routes
    Route::get('/admin/groupe_cursus', [GroupeCursusController::class, 'show'])->name('admin.groupe_cursus');
    Route::post('/admin/groupe_cursus_post', [GroupeCursusController::class, 'add'])->name('admin.groupe_cursus.add');
    Route::put('/admin/groupe_cursus_edit/{id}', [GroupeCursusController::class, 'update'])->name('admin.groupe_cursus.update');
    Route::delete('/admin/groupe_cursus_delete/{id}', [GroupeCursusController::class, 'delete'])->name('admin.groupe_cursus.delete');
    // Etudiant groupe cursus routes
    Route::get('/admin/etudiant_groupe_cursus', [EtudiantGroupeCursusController::class, 'show'])->name('admin.etudiant_groupe_cursus');
    Route::post('/admin/etudiant_groupe_cursus_post', [EtudiantGroupeCursusController::class, 'add'])->name('admin.etudiant_groupe_cursus.add');
    Route::put('/admin/etudiant_groupe_cursus_edit/{id}', [EtudiantGroupeCursusController::class, 'update'])->name('admin.etudiant_groupe_cursus.update');
    Route::delete('/admin/etudiant_groupe_cursus_delete/{id}', [EtudiantGroupeCursusController::class, 'delete'])->name('admin.etudiant_groupe_cursus.delete');
    // Contact routes
    Route::get('/admin/contact', [ContactController::class, 'show'])->name('admin.contact');
    Route::get('/admin/contact/add', [ContactController::class, 'show_compose'])->name('admin.contact.compose');
    Route::get('/admin/contact/sent', [ContactController::class, 'show_sent'])->name('admin.contact.sent');
    Route::get('/admin/contact/read/{id}', [ContactController::class, 'read'])->name('admin.contact.read');
    Route::post('/admin/contact/add_post', [ContactController::class, 'add'])->name('admin.contact.add');
    Route::get('/admin/contact/star', [ContactController::class, 'show_star'])->name('admin.contact.star');
    Route::put('/admin/contact/star_post/{id}', [ContactController::class, 'star'])->name('admin.contact.star.post');
    Route::get('/admin/contact/important', [ContactController::class, 'show_important'])->name('admin.contact.important');
    Route::put('/admin/contact/important_post/{id}', [ContactController::class, 'important'])->name('admin.contact.important.post');
    Route::put('/admin/contact/unread_post/{id}', [ContactController::class, 'unread'])->name('admin.contact.unread.post');
    Route::get('/admin/contact/trash', [ContactController::class, 'show_trash'])->name('admin.contact.trash');
    Route::put('/admin/contact/trash_post/{id}', [ContactController::class, 'trash'])->name('admin.contact.trash.post');
    Route::delete('/admin/contact/delete', [ContactController::class, 'delete'])->name('admin.contact.delete');
    // Student routes
    Route::get('/admin/student', [AdminStudentController::class, 'show'])->name('admin.student');
    Route::get('/admin/student/add', [AdminStudentController::class, 'show_store'])->name('admin.student.add');
    Route::post('/admin/student/add_post', [AdminStudentController::class, 'store'])->name('admin.student.store');
    Route::get('/admin/student/edit/{id}', [AdminStudentController::class, 'show_edit'])->name('admin.student.edit');
    Route::put('/admin/student/edit_post/{id}', [AdminStudentController::class, 'update'])->name('admin.student.update');
    Route::put('/admin/student/deactivate/{id}', [AdminStudentController::class, 'deactivate'])->name('admin.student.deactivate');
    Route::delete('/admin/student/delete/{id}', [AdminStudentController::class, 'delete'])->name('admin.student.delete');
    // Teacher routes
    Route::get('/admin/teacher', [AdminTeacherController::class, 'show'])->name('admin.teacher');
    Route::get('/admin/teacher/add', [AdminTeacherController::class, 'show_store'])->name('admin.teacher.add');
    Route::post('/admin/teacher/add_post', [AdminTeacherController::class, 'store'])->name('admin.teacher.store');
    Route::get('/admin/teacher/edit/{id}', [AdminTeacherController::class, 'show_edit'])->name('admin.teacher.edit');
    Route::put('/admin/teacher/edit_post/{id}', [AdminTeacherController::class, 'update'])->name('admin.teacher.update');
    Route::put('/admin/teacher/deactivate/{id}', [AdminTeacherController::class, 'deactivate'])->name('admin.teacher.deactivate');
    Route::delete('/admin/teacher/delete/{id}', [AdminTeacherController::class, 'delete'])->name('admin.teacher.delete');
});

Route::group(['middleware' => 'student'], function () {
    Route::get('/student', [StudentController::class, 'home'])->name('student.home');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/student/logout', [StudentController::class, 'logout'])->name('student.logout');
    // Contact routes
    Route::get('/student/contact', [ContactController::class, 'show'])->name('student.contact');
    Route::get('/student/contact/add', [ContactController::class, 'show_compose'])->name('student.contact.compose');
    Route::get('/student/contact/read/{id}', [ContactController::class, 'read'])->name('student.contact.read');
    Route::post('/student/contact/add_post', [ContactController::class, 'add'])->name('student.contact.add');
    Route::get('/student/contact/sent', [ContactController::class, 'show_sent'])->name('student.contact.sent');
    Route::get('/student/contact/starred', [ContactController::class, 'show_star'])->name('student.contact.star');
    Route::put('/student/contact/star_post/{id}', [ContactController::class, 'star'])->name('student.contact.star.post');
    Route::get('/student/contact/important', [ContactController::class, 'show_important'])->name('student.contact.important');
    Route::put('/student/contact/important_post/{id}', [ContactController::class, 'important'])->name('student.contact.important.post');
    Route::put('/student/contact/unread_post/{id}', [ContactController::class, 'unread'])->name('student.contact.unread.post');
    Route::get('/student/contact/trash', [ContactController::class, 'show_trash'])->name('student.contact.trash');
    Route::put('/student/contact/trash_post/{id}', [ContactController::class, 'trash'])->name('student.contact.trash.post');
    Route::delete('/student/contact/delete', [ContactController::class, 'delete'])->name('student.contact.delete');
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('/teacher', [TeacherController::class, 'home'])->name('teacher.home');
    Route::get('/teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::post('/teacher/logout', [TeacherController::class, 'logout'])->name('teacher.logout');
    // Contact routes
    Route::get('/teacher/contact', [ContactController::class, 'show'])->name('teacher.contact');
    Route::get('/teacher/contact/add', [ContactController::class, 'show_compose'])->name('teacher.contact.compose');
    Route::get('/teacher/contact/sent', [ContactController::class, 'show_sent'])->name('teacher.contact.sent');
    Route::get('/teacher/contact/read/{id}', [ContactController::class, 'read'])->name('teacher.contact.read');
    Route::post('/teacher/contact/add_post', [ContactController::class, 'add'])->name('teacher.contact.add');
    Route::get('/teacher/contact/starred', [ContactController::class, 'show_star'])->name('teacher.contact.star');
    Route::put('/teacher/contact/star_post/{id}', [ContactController::class, 'star'])->name('teacher.contact.star.post');
    Route::get('/teacher/contact/important', [ContactController::class, 'show_important'])->name('teacher.contact.important');
    Route::put('/teacher/contact/important_post/{id}', [ContactController::class, 'important'])->name('teacher.contact.important.post');
    Route::put('/teacher/contact/unread_post/{id}', [ContactController::class, 'unread'])->name('teacher.contact.unread.post');
    Route::get('/teacher/contact/trash', [ContactController::class, 'show_trash'])->name('teacher.contact.trash');
    Route::put('/teacher/contact/trash_post/{id}', [ContactController::class, 'trash'])->name('teacher.contact.trash.post');
    Route::delete('/teacher/contact/delete', [ContactController::class, 'delete'])->name('teacher.contact.delete');
});

Route::get('admin/register', [AdminController::class, 'register'])->name('admin_register')->middleware('guest');
Route::post('admin/register_post', [AdminController::class, 'register_post'])->name('admin_register_post')->middleware('guest');
Route::get('admin/login', [AdminController::class, 'login'])->name('admin_login')->middleware('guest');
Route::post('admin/login_post', [AdminController::class, 'login_post'])->name('admin_login_post')->middleware('guest');

Route::get('student/login', [StudentController::class, 'login'])->name('student_login')->middleware('guest');
Route::post('student/login_post', [StudentController::class, 'login_post'])->name('student_login_post')->middleware('guest');

Route::get('teacher/login', [TeacherController::class, 'login'])->name('teacher_login')->middleware('guest');
Route::post('teacher/login_post', [TeacherController::class, 'login_post'])->name('teacher_login_post')->middleware('guest');