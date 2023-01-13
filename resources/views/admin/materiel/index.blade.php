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
                                <h4 class="font-size-18">Materiels</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Materiels</li>
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
                                    <h4 class="card-title mb-4">Materiels</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Matricule</th>
                                                    <th>Numero de serie</th>
                                                    <th>Description</th>
                                                    <th>Etat</th>
                                                    <th>Disponibilite</th>
                                                    <th>Version</th>
                                                    <th>Annee</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($materiels) == 0)
                                                <tr>
                                                    <td colspan="10" class="text-center">
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
                                                @foreach($materiels as $materiel)
                                                <tr>
                                                    <td>{{$materiel->id}}</td>
                                                    <td>{{$materiel->libelle}}</td>
                                                    <td>{{$materiel->matricule}}</td>
                                                    <td>{{$materiel->num_serie}}</td>
                                                    <td>{{$materiel->description}}</td>
                                                    <td>{{$materiel->etat}}</td>
                                                    <td>{{$materiel->disponibilite == 1 ? 'Disponible' : 'Non disponible'}}</td>
                                                    <td>{{$materiel->version}}</td>
                                                    <td>{{$materiel->annee}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $materiel->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $materiel->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $materiel->id }}" tabindex="-1"
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
                                                                action="{{url('admin/materiel_edit', $materiel->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle"
                                                                            value="{{$materiel->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="matricule">Matricule</label>
                                                                        <input type="text" class="form-control"
                                                                            id="matricule" placeholder="Enter matricule"
                                                                            name="matricule"
                                                                            value="{{$materiel->matricule}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="num_serie">Numero de serie</label>
                                                                        <input type="number" class="form-control"
                                                                            id="num_serie" placeholder="Enter numero de serie"
                                                                            name="num_serie"
                                                                            value="{{$materiel->num_serie}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            id="description"
                                                                            placeholder="Enter description"
                                                                            name="description"
                                                                            value="{{$materiel->description}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="etat">Etat</label>
                                                                        <input type="text" class="form-control"
                                                                            id="etat" placeholder="Enter etat"
                                                                            name="etat" value="{{$materiel->etat}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">Disponibilite</label>
                                                                        <select class="form-control select2"
                                                                            name="disponibilite">
                                                                            <option>Select</option>
                                                                            <option value="1" {{$materiel->disponibilite == 1 ? 'selected' : ''}}>Disponible</option>
                                                                            <option value="2" {{$materiel->disponibilite == 2 ? 'selected' : ''}}>Non Disponible</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="version">Version</label>
                                                                        <input type="text" class="form-control"
                                                                            id="version" placeholder="Enter version"
                                                                            name="version"
                                                                            value="{{$materiel->version}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="annee">Annee</label>
                                                                        <input type="text" class="form-control"
                                                                            id="annee" placeholder="Enter annee"
                                                                            name="annee" value="{{$materiel->annee}}">
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

                                                <div class="modal fade bs-delete{{ $materiel->id }}" tabindex="-1"
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
                                                                action="{{url('admin/materiel_delete', $materiel->id)}}"
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
                    {{$materiels->links()}}
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
                        <form class="mt-4" action="{{url('admin/materiel_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label for="matricule">Matricule</label>
                                    <input type="text" class="form-control" id="matricule" placeholder="Enter matricule"
                                        name="matricule" value="{{old('matricule')}}">
                                </div>

                                <div class="form-group">
                                    <label for="num_serie">Numero de serie</label>
                                    <input type="number" class="form-control" id="num_serie"
                                        placeholder="Enter numero de serie" name="num_serie" value="{{old('num_serie')}}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Enter description" name="description"
                                        value="{{old('description')}}">
                                </div>

                                <div class="form-group">
                                    <label for="etat">Etat</label>
                                    <input type="text" class="form-control" id="etat" placeholder="Enter etat"
                                        name="etat" value="{{old('etat')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Disponibilite</label>
                                    <select class="form-control select2" name="disponibilite">
                                        <option>Select</option>
                                        <option value="1">Disponible</option>
                                        <option value="2">Non Disponible</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="version">Version</label>
                                    <input type="text" class="form-control" id="version" placeholder="Enter version"
                                        name="version" value="{{old('version')}}">
                                </div>

                                <div class="form-group">
                                    <label for="annee">Annee</label>
                                    <input type="text" class="form-control" id="annee" placeholder="Enter annee"
                                        name="annee" value="{{old('annee')}}">
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