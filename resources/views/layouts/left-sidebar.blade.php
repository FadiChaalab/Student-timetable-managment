<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
                @if (Auth::user()->id_role == 1)
                <li>
                    <a href="{{url('/admin')}}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>General</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/admin/au')}}">Au</a></li>
                        <li><a href="{{url('/admin/bloc')}}">Blocs</a></li>
                        <li><a href="{{url('/admin/type_cursus')}}">Type Cursuses</a></li>
                        <li><a href="{{url('/admin/cursus')}}">Cursuses</a></li>
                        <li><a href="{{url('/admin/departement')}}">Departements</a></li>
                        <li><a href="{{url('/admin/ecole')}}">Ecoles</a></li>
                        <li><a href="{{url('/admin/etage')}}">Etages</a></li>
                        <li><a href="{{url('/admin/etatcivil')}}">Etat Civils</a></li>
                        <li><a href="{{url('/admin/groupe_cursus')}}">Groupe Cursus</a></li>
                        <li><a href="{{url('/admin/etudiant_groupe_cursus')}}">Etudiant Groupe Cursus</a></li>
                        <li><a href="{{url('/admin/type_filiere')}}">Type Filieres</a></li>
                        <li><a href="{{url('/admin/filiere')}}">Filieres</a></li>
                        <li><a href="{{url('/admin/niveau')}}">Niveaux</a></li>
                        <li><a href="{{url('/admin/filiere_niveau')}}">Filiere Niveau</a></li>
                        <li><a href="{{url('/admin/groupe')}}">Groupes</a></li>
                        <li><a href="{{url('/admin/horaire')}}">Horaires</a></li>
                        <li><a href="{{url('/admin/heure')}}">Horaire Heures</a></li>
                        <li><a href="{{url('/admin/jour')}}">Horaire Jours</a></li>
                        <li><a href="{{url('/admin/jour_horaire_heure')}}">Jour Horaire Heure</a></li>
                        <li><a href="{{url('/admin/materiel')}}">Materiels</a></li>
                        <li><a href="{{url('/admin/module_cursus')}}">Module Cursuses</a></li>
                        <li><a href="{{url('/admin/module_plan_etude')}}">Module Plan Etudes</a></li>
                        <li><a href="{{url('/admin/plan_etude')}}">Plan Etudes</a></li>
                        <li><a href="{{url('/admin/role')}}">Roles</a></li>
                        <li><a href="{{url('/admin/type_salle')}}">Type Salles</a></li>
                        <li><a href="{{url('/admin/salle')}}">Salles</a></li>
                        <li><a href="{{url('/admin/salle_materiel')}}">Salle Materiels</a></li>
                        <li><a href="{{url('/admin/semester')}}">Semesters</a></li>
                        <li><a href="{{url('/admin/semester_au')}}">Semester Au</a></li>
                        <li><a href="{{url('/admin/semester_session')}}">Semester Sessions</a></li>
                        <li><a href="{{url('/admin/instance_module_cursus')}}">Instance Module Cursuses</a></li>
                        <li><a href="{{url('/admin/instance_module_cursus_enseignant')}}">Instance Module Cursus Enseignants</a></li>
                        <li><a href="{{url('/admin/preference_module_horaire_enseignant')}}">Preference Module Horaire Enseignants</a></li>
                        <li><a href="{{url('/admin/instance_groupe_horaire')}}">Instance Groupe Cursus Horaires</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/admin/student')}}">All students</a></li>
                        <li><a href="{{url('/admin/student/add')}}">Add new student</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-user"></i>
                        <span>Teachers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/admin/teacher')}}">All teachers</a></li>
                        <li><a href="{{url('/admin/teacher/add')}}">Add new teacher</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/admin/contact')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Email</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->id_role == 2)
                <li>
                    <a href="{{url('/student')}}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/student/contact')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Email</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->id_role == 3)
                <li>
                    <a href="{{url('/teacher')}}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/teacher/contact')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Email</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>