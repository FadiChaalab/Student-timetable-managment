<x-layout>
    <div id="layout-wrapper">
        @include('layouts.header')
        @include('layouts.left-sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4 class="font-size-18">Module Plan Etude</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Module Plan Etude</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-block">
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                    data-toggle="modal" data-target=".bs-example-modal-center">Add new</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Module Plan Etude</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Plan Etude</th>
                                                    <th>Filiere Niveau</th>
                                                    <th>Semester</th>
                                                    <th>Coefficient</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($module_plan_etudes) == 0)
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <img src="{{asset('images/no_data.svg')}}" height="124"
                                                            class="mt-3">
                                                        <p class="text-muted py-3">No records was found, try adding
                                                            some.</p>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-center">Add a record</button>
                                                    </td>
                                                </tr>
                                                @else
                                                @foreach($module_plan_etudes as $module_plan_etude)
                                                <tr>
                                                    <td>{{$module_plan_etude->id}}</td>
                                                    <td>{{$module_plan_etude->libelle}}</td>
                                                    <td>{{$module_plan_etude->planEtude->libelle}}</td>
                                                    <td>{{$module_plan_etude->filiereNiveau->niveau->libelle.' '.$module_plan_etude->filiereNiveau->filiere->libelle}}</td>
                                                    <td>{{$module_plan_etude->semester->libelle}}</td>
                                                    <td>{{$module_plan_etude->coefficient}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $module_plan_etude->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $module_plan_etude->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $module_plan_etude->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Edit a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4"
                                                                action="{{url('admin/module_plan_etude_edit', $module_plan_etude->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle"
                                                                            value="{{$module_plan_etude->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Plan etude</label>
                                                                        <select class="form-control select2"
                                                                            name="id_plan_etude">
                                                                            <option>Select</option>
                                                                            @if (count($plan_etudes) > 0)
                                                                            @foreach ($plan_etudes as $plan_etude)
                                                                            <option value="{{ $plan_etude->id }}" {{
                                                                                $module_plan_etude->id_plan_etude ==
                                                                                $plan_etude->id ? 'selected' : ''}}>{{
                                                                                $plan_etude->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Filiere
                                                                            Niveau</label>
                                                                        <select class="form-control select2"
                                                                            name="id_filiere_niveau">
                                                                            <option>Select</option>
                                                                            @if (count($filiere_niveaux) > 0)
                                                                            @foreach ($filiere_niveaux as $filiere_niveau)
                                                                            <option value="{{ $filiere_niveau->id }}" {{
                                                                                $module_plan_etude->id_filiere_niveau ==
                                                                                $filiere_niveau->id ? 'selected' :
                                                                                ''}}>{{$filiere_niveau->niveau->libelle.'
                                                                                '.$filiere_niveau->filiere->libelle }}
                                                                            </option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Semester</label>
                                                                        <select class="form-control select2"
                                                                            name="id_semester">
                                                                            <option>Select</option>
                                                                            @if (count($semesters) > 0)
                                                                            @foreach ($semesters as $semester)
                                                                            <option value="{{ $semester->id }}" {{
                                                                                $module_plan_etude->id_semester ==
                                                                                $semester->id ? 'selected' : ''}}>{{
                                                                                $semester->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="coefficient">Coefficient</label>
                                                                        <input type="number" class="form-control"
                                                                            id="coefficient"
                                                                            placeholder="Enter coefficient"
                                                                            name="coefficient"
                                                                            value="{{$module_plan_etude->coefficient}}">
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>

                                                            </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                                <div class="modal fade bs-delete{{ $module_plan_etude->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Delete a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4"
                                                                action="{{url('admin/module_plan_etude_delete', $module_plan_etude->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-body">

                                                                    <p>Are you sure, you want to delete this record?</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>

                                                            </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                @endforeach
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{$module_plan_etudes->links()}}
                </div>
            </div>
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Add new record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="mt-4" action="{{url('admin/module_plan_etude_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Plan Etude</label>
                                    <select class="form-control select2" name="id_plan_etude">
                                        <option>Select</option>
                                        @if (count($plan_etudes) > 0)
                                        @foreach ($plan_etudes as $plan_etude)
                                        <option value="{{ $plan_etude->id }}">{{ $plan_etude->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Filiere Niveau</label>
                                    <select class="form-control select2" name="id_filiere_niveau">
                                        <option>Select</option>
                                        @if (count($filiere_niveaux) > 0)
                                        @foreach ($filiere_niveaux as $filiere_niveau)
                                        <option value="{{ $filiere_niveau->id }}">{{ $filiere_niveau->niveau->libelle.'
                                            '.$filiere_niveau->filiere->libelle }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Semester</label>
                                    <select class="form-control select2" name="id_semester">
                                        <option>Select</option>
                                        @if (count($semesters) > 0)
                                        @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{
                                            $semester->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="coefficient">Coefficient</label>
                                    <input type="number" class="form-control" id="coefficient"
                                        placeholder="Enter coefficient" name="coefficient"
                                        value="{{old('coefficient')}}">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save
                                    changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            @include('layouts.footer')
        </div>
    </div>
</x-layout>