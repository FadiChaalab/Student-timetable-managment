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
                                <h4 class="font-size-18">Salles</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Salles</li>
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
                                    <h4 class="card-title mb-4">Salles</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Description</th>
                                                    <th>Capacity</th>
                                                    <th>Planification</th>
                                                    <th>Bloc</th>
                                                    <th>Etage</th>
                                                    <th>Type</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($salles) == 0)
                                                <tr>
                                                    <td colspan="9" class="text-center">
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
                                                @foreach($salles as $salle)
                                                <tr>
                                                    <td>{{$salle->id}}</td>
                                                    <td>{{$salle->libelle}}</td>
                                                    <td>{{$salle->description}}</td>
                                                    <td>{{$salle->capacity}}</td>
                                                    <td>{{$salle->planification}}</td>
                                                    <td>{{$salle->bloc->libelle}}</td>
                                                    <td>{{$salle->etage->libelle}}</td>
                                                    <td>{{$salle->typeSalle->libelle}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $salle->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $salle->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $salle->id }}" tabindex="-1"
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
                                                                action="{{url('admin/salle_edit', $salle->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle" value="{{$salle->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            id="description"
                                                                            placeholder="Enter description"
                                                                            name="description"
                                                                            value="{{$salle->description}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="capacity">Capacity</label>
                                                                        <input type="number" class="form-control"
                                                                            id="capacity" placeholder="Enter capacity"
                                                                            name="capacity"
                                                                            value="{{$salle->capacity}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="control-label">Planification</label>
                                                                        <select class="form-control select2"
                                                                            name="planification">
                                                                            <option>Select</option>
                                                                            <option value="Oui" {{ $salle->planification
                                                                                == "Oui" ?
                                                                                'selected' : ''}}>Oui</option>
                                                                            <option value="Non" {{ $salle->planification
                                                                                == "Non" ?
                                                                                'selected' : ''}}>Non</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Bloc</label>
                                                                        <select class="form-control select2"
                                                                            name="id_bloc">
                                                                            <option>Select</option>
                                                                            @if (count($blocs) > 0)
                                                                            @foreach ($blocs as $bloc)
                                                                            <option value="{{ $bloc->id }}" {{ $salle->
                                                                                id_bloc == $bloc->id ?
                                                                                'selected' : ''}}>{{
                                                                                $bloc->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Etage</label>
                                                                        <select class="form-control select2"
                                                                            name="id_etage">
                                                                            <option>Select</option>
                                                                            @if (count($etages) > 0)
                                                                            @foreach ($etages as $etage)
                                                                            <option value="{{ $etage->id }}" {{ $salle->
                                                                                id_etage == $etage->id ?
                                                                                'selected' : ''}}>{{
                                                                                $etage->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Type</label>
                                                                        <select class="form-control select2"
                                                                            name="id_type_salle">
                                                                            <option>Select</option>
                                                                            @if (count($types) > 0)
                                                                            @foreach ($types as $type)
                                                                            <option value="{{ $type->id }}" {{ $salle->
                                                                                id_type_salle == $type->id ?
                                                                                'selected' : ''}}>{{
                                                                                $type->libelle }}</option>
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

                                                <div class="modal fade bs-delete{{ $salle->id }}" tabindex="-1"
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
                                                                action="{{url('admin/salle_delete', $salle->id)}}"
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
                    {{$salles->links()}}
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
                        <form class="mt-4" action="{{url('admin/salle_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description"
                                        placeholder="Enter description" name="description"
                                        value="{{old('description')}}">
                                </div>

                                <div class="form-group">
                                    <label for="capacity">Capacity</label>
                                    <input type="number" class="form-control" id="capacity" placeholder="Enter capacity"
                                        name="capacity" value="{{old('capacity')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Planification</label>
                                    <select class="form-control select2" name="planification">
                                        <option>Select</option>
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Bloc</label>
                                    <select class="form-control select2" name="id_bloc">
                                        <option>Select</option>
                                        @if (count($blocs) > 0)
                                        @foreach ($blocs as $bloc)
                                        <option value="{{ $bloc->id }}">{{ $bloc->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Etage</label>
                                    <select class="form-control select2" name="id_etage">
                                        <option>Select</option>
                                        @if (count($etages) > 0)
                                        @foreach ($etages as $etage)
                                        <option value="{{ $etage->id }}">{{
                                            $etage->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <select class="form-control select2" name="id_type_salle">
                                        <option>Select</option>
                                        @if (count($types) > 0)
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{
                                            $type->libelle }}</option>
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