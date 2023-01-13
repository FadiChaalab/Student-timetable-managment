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
                                <h4 class="font-size-18">Cursuses</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Cursuses</li>
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
                                    <h4 class="card-title mb-4">Cursuses</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Au</th>
                                                    <th>Type</th>
                                                    <th>Plan etude</th>
                                                    <th>Filiere niveau</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($cursuses) == 0)
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
                                                @foreach($cursuses as $cursus)
                                                <tr>
                                                    <td>{{$cursus->id}}</td>
                                                    <td>{{$cursus->libelle}}</td>
                                                    <td>{{$cursus->au->libelle}}</td>
                                                    <td>{{$cursus->type->libelle}}</td>
                                                    <td>{{$cursus->planEtude->libelle}}</td>
                                                    <td>{{$cursus->filiereNiveau->niveau->libelle.'
                                                        '.$cursus->filiereNiveau->filiere->libelle}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $cursus->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $cursus->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $cursus->id }}" tabindex="-1"
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
                                                                action="{{url('admin/cursus_edit', $cursus->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle" value="{{$cursus->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Type</label>
                                                                        <select class="form-control select2"
                                                                            name="id_type_cursus">
                                                                            <option>Select</option>
                                                                            @if (count($types) > 0)
                                                                            @foreach ($types as $type)
                                                                            <option value="{{ $type->id }}" {{ $cursus->
                                                                                id_type_cursus == $type->id ? 'selected'
                                                                                : ''}}>{{
                                                                                $type->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Au</label>
                                                                        <select class="form-control select2"
                                                                            name="id_au">
                                                                            <option>Select</option>
                                                                            @if (count($aus) > 0)
                                                                            @foreach ($aus as $au)
                                                                            <option value="{{ $au->id }}" {{ $cursus->
                                                                                id_au == $au->id ? 'selected' : ''}}>{{
                                                                                $au->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Plan etude</label>
                                                                        <select class="form-control select2"
                                                                            name="id_plan_etude">
                                                                            <option>Select</option>
                                                                            @if (count($plan_etudes) > 0)
                                                                            @foreach ($plan_etudes as $plan_etude)
                                                                            <option value="{{ $plan_etude->id }}" {{
                                                                                $cursus->id_plan_etude ==
                                                                                $plan_etude->id ? 'selected' : ''}}>{{
                                                                                $plan_etude->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Filiere
                                                                            niveau</label>
                                                                        <select class="form-control select2"
                                                                            name="id_filiere_niveau">
                                                                            <option>Select</option>
                                                                            @if (count($filiere_niveaux) > 0)
                                                                            @foreach ($filiere_niveaux as $filiere_niveau)
                                                                            <option value="{{ $filiere_niveau->id }}" {{
                                                                                $cursus->id_filiere_niveau ==
                                                                                $filiere_niveau->id ? 'selected' :
                                                                                ''}}>{{$filiere_niveau->niveau->libelle.'
                                                                                '.$filiere_niveau->filiere->libelle }}
                                                                            </option>
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

                                                <div class="modal fade bs-delete{{ $cursus->id }}" tabindex="-1"
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
                                                                action="{{url('admin/cursus_delete', $cursus->id)}}"
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
                    {{$cursuses->links()}}
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
                        <form class="mt-4" action="{{url('admin/cursus_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Type</label>
                                    <select class="form-control select2" name="id_type_cursus">
                                        <option>Select</option>
                                        @if (count($types) > 0)
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Au</label>
                                    <select class="form-control select2" name="id_au">
                                        <option>Select</option>
                                        @if (count($aus) > 0)
                                        @foreach ($aus as $au)
                                        <option value="{{ $au->id }}">{{ $au->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Plan etude</label>
                                    <select class="form-control select2" name="id_plan_etude">
                                        <option>Select</option>
                                        @if (count($plan_etudes) > 0)
                                        @foreach ($plan_etudes as $plan_etude)
                                        <option value="{{ $plan_etude->id }}">{{
                                            $plan_etude->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Filiere niveau</label>
                                    <select class="form-control select2" name="id_filiere_niveau">
                                        <option>Select</option>
                                        @if (count($filiere_niveaux) > 0)
                                        @foreach ($filiere_niveaux as $filiere_niveau)
                                        <option value="{{ $filiere_niveau->id }}">{{$filiere_niveau->niveau->libelle.'
                                            '.$filiere_niveau->filiere->libelle }}</option>
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