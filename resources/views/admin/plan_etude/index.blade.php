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
                                <h4 class="font-size-18">Plan Etude</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Plan Etude</li>
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
                                    <h4 class="card-title mb-4">Plan Etude</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Date debut</th>
                                                    <th>Date fin</th>
                                                    <th>Ecole</th>
                                                    <th>Filiere</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($plan_etudes) == 0)
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
                                                @foreach($plan_etudes as $plan_etude)
                                                <tr>
                                                    <td>{{$plan_etude->id}}</td>
                                                    <td>{{$plan_etude->libelle}}</td>
                                                    <td>{{$plan_etude->date_debut}}</td>
                                                    <td>{{$plan_etude->date_fin}}</td>
                                                    <td>{{$plan_etude->ecole->type}}</td>
                                                    <td>{{$plan_etude->filiere->type->libelle}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $plan_etude->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $plan_etude->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $plan_etude->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="mySmallModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Edit a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4"
                                                                action="{{url('admin/plan_etude_edit', $plan_etude->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle"
                                                                            value="{{$plan_etude->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="date_debut">Date debut</label>
                                                                        <input type="date" class="form-control"
                                                                            id="date_debut"
                                                                            placeholder="Enter date_debut"
                                                                            name="date_debut"
                                                                            value="{{$plan_etude->date_debut}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="date_fin">Date Fin</label>
                                                                        <input type="date" class="form-control"
                                                                            id="date_fin" placeholder="Enter date_fin"
                                                                            name="date_fin"
                                                                            value="{{$plan_etude->date_fin}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Ecole</label>
                                                                        <select class="form-control select2"
                                                                            name="id_ecole">
                                                                            <option>Select</option>
                                                                            @if (count($ecoles) > 0)
                                                                            @foreach ($ecoles as $ecole)
                                                                            <option value="{{ $ecole->id }}" {{
                                                                                $plan_etude->id_ecole == $ecole->id ?
                                                                                'selected' : ''}}>{{
                                                                                $ecole->type }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Filiere</label>
                                                                        <select class="form-control select2"
                                                                            name="id_filiere">
                                                                            <option>Select</option>
                                                                            @if (count($filieres) > 0)
                                                                            @foreach ($filieres as $filiere)
                                                                            <option value="{{ $filiere->id }}" {{
                                                                                $plan_etude->id_filiere == $filiere->id ?
                                                                                'selected' : ''}}>{{
                                                                                $filiere->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
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

                                                <div class="modal fade bs-delete{{ $plan_etude->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="mySmallModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Delete a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4"
                                                                action="{{url('admin/plan_etude_delete', $plan_etude->id)}}"
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
                    {{$plan_etudes->links()}}
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
                        <form class="mt-4" action="{{url('admin/plan_etude_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label for="date_debut">Date debut</label>
                                    <input type="date" class="form-control" id="date_debut"
                                        placeholder="Enter date_debut" name="date_debut"
                                        value="{{old('date_debut')}}">
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date Fin</label>
                                    <input type="date" class="form-control" id="date_fin" placeholder="Enter date_fin"
                                        name="date_fin" value="{{old('date_fin')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Ecole</label>
                                    <select class="form-control select2" name="id_ecole">
                                        <option>Select</option>
                                        @if (count($ecoles) > 0)
                                        @foreach ($ecoles as $ecole)
                                        <option value="{{ $ecole->id }}">{{ $ecole->type }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Filiere</label>
                                    <select class="form-control select2" name="id_filiere">
                                        <option>Select</option>
                                        @if (count($filieres) > 0)
                                        @foreach ($filieres as $filiere)
                                        <option value="{{ $filiere->id }}">{{ $filiere->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
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