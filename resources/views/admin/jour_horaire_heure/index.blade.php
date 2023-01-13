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
                                <h4 class="font-size-18">Jour Horaire Heure</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Jour Horaire Heure</li>
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
                                    <h4 class="card-title mb-4">Jour Horaire Heure</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Jour</th>
                                                    <th>Heure</th>
                                                    <th>Horaire</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($jour_horaire_heures) == 0)
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
                                                @foreach($jour_horaire_heures as $jour_horaire_heure)
                                                <tr>
                                                    <td>{{$jour_horaire_heure->id}}</td>
                                                    <td>{{$jour_horaire_heure->libelle}}</td>
                                                    <td>{{$jour_horaire_heure->jour->libelle}}</td>
                                                    <td>{{$jour_horaire_heure->heure->fin}}</td>
                                                    <td>{{$jour_horaire_heure->horaire->libelle}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $jour_horaire_heure->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $jour_horaire_heure->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $jour_horaire_heure->id }}"
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
                                                                action="{{url('admin/jour_horaire_heure_edit', $jour_horaire_heure->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle"
                                                                            value="{{$jour_horaire_heure->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Jour</label>
                                                                        <select class="form-control select2"
                                                                            name="id_horaire_jour">
                                                                            <option>Select</option>
                                                                            @if (count($jours) > 0)
                                                                            @foreach ($jours as $horaire_jour)
                                                                            <option value="{{ $horaire_jour->id }}" {{
                                                                                $jour_horaire_heure->
                                                                                id_horaire_jour == $horaire_jour->id
                                                                                ?
                                                                                'selected' : ''}}>{{
                                                                                $horaire_jour->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Heure</label>
                                                                        <select class="form-control select2"
                                                                            name="id_horaire_heure">
                                                                            <option>Select</option>
                                                                            @if (count($heures) > 0)
                                                                            @foreach ($heures as $horaire_heure)
                                                                            <option value="{{ $horaire_heure->id }}" {{
                                                                                $jour_horaire_heure->id_horaire_heure
                                                                                ==
                                                                                $horaire_heure->id ?
                                                                                'selected' : ''}}>{{
                                                                                $horaire_heure->fin }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Horaire</label>
                                                                        <select class="form-control select2"
                                                                            name="id_horaire">
                                                                            <option>Select</option>
                                                                            @if (count($horaires) > 0)
                                                                            @foreach ($horaires as $horaire)
                                                                            <option value="{{ $horaire->id }}" {{
                                                                                $jour_horaire_heure->id_horaire ==
                                                                                $horaire->id ?
                                                                                'selected' : ''}}>{{
                                                                                $horaire->libelle }}</option>
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

                                                <div class="modal fade bs-delete{{ $jour_horaire_heure->id }}"
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
                                                                action="{{url('admin/jour_horaire_heure_delete', $jour_horaire_heure->id)}}"
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
                    {{$jour_horaire_heures->links()}}
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
                        <form class="mt-4" action="{{url('admin/jour_horaire_heure_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Jour</label>
                                    <select class="form-control select2" name="id_horaire_jour">
                                        <option>Select</option>
                                        @if (count($jours) > 0)
                                        @foreach ($jours as $horaire_jour)
                                        <option value="{{ $horaire_jour->id }}">{{ $horaire_jour->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Heure</label>
                                    <select class="form-control select2" name="id_horaire_heure">
                                        <option>Select</option>
                                        @if (count($heures) > 0)
                                        @foreach ($heures as $horaire_heure)
                                        <option value="{{ $horaire_heure->id }}">{{
                                            $horaire_heure->fin }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Horaire</label>
                                    <select class="form-control select2" name="id_horaire">
                                        <option>Select</option>
                                        @if (count($horaires) > 0)
                                        @foreach ($horaires as $horaire)
                                        <option value="{{ $horaire->id }}">{{
                                            $horaire->libelle }}</option>
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