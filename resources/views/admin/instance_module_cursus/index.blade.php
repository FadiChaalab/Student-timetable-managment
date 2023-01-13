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
                                <h4 class="font-size-18">Instance Module Cursuses</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Instance Module Cursuses</li>
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
                                    <h4 class="card-title mb-4">Instance Module Cursuses</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Module cursus</th>
                                                    <th>Semester au</th>
                                                    <th>Ecole</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($instance_module_cursuses) == 0)
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
                                                @foreach($instance_module_cursuses as $instance_module_cursus)
                                                <tr>
                                                    <td>{{$instance_module_cursus->id}}</td>
                                                    <td>{{$instance_module_cursus->libelle}}</td>
                                                    <td>{{$instance_module_cursus->moduleCursus->libelle}}</td>
                                                    <td>{{$instance_module_cursus->semesterAu->libelle}}</td>
                                                    <td>{{$instance_module_cursus->ecole->type}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-edit{{ $instance_module_cursus->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-delete{{ $instance_module_cursus->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $instance_module_cursus->id }}"
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
                                                                action="{{url('admin/instance_module_cursus_edit', $instance_module_cursus->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle"
                                                                            value="{{$instance_module_cursus->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Module
                                                                            cursus</label>
                                                                        <select class="form-control select2"
                                                                            name="id_module_cursus">
                                                                            <option>Select</option>
                                                                            @if (count($module_cursuses) > 0)
                                                                            @foreach ($module_cursuses as $module_cursus)
                                                                            <option value="{{ $module_cursus->id }}" {{
                                                                                $instance_module_cursus->
                                                                                id_module_cursus == $module_cursus->id
                                                                                ?
                                                                                'selected' : ''}}>{{
                                                                                $module_cursus->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Semester au</label>
                                                                        <select class="form-control select2"
                                                                            name="id_semester_au">
                                                                            <option>Select</option>
                                                                            @if (count($semester_aus) > 0)
                                                                            @foreach ($semester_aus as $semester_au)
                                                                            <option value="{{ $semester_au->id }}" {{
                                                                                $instance_module_cursus->id_semester_au
                                                                                ==
                                                                                $semester_au->id ?
                                                                                'selected' : ''}}>{{
                                                                                $semester_au->libelle }}</option>
                                                                            @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Ecole</label>
                                                                        <select class="form-control select2"
                                                                            name="id_ecole">
                                                                            <option>Select</option>
                                                                            @if (count($ecoles) > 0)
                                                                            @foreach ($ecoles as $ecole)
                                                                            <option value="{{ $ecole->id }}" {{
                                                                                $instance_module_cursus->id_ecole ==
                                                                                $ecole->id ?
                                                                                'selected' : ''}}>{{
                                                                                $ecole->type }}</option>
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

                                                <div class="modal fade bs-delete{{ $instance_module_cursus->id }}"
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
                                                                action="{{url('admin/instance_module_cursus_delete', $instance_module_cursus->id)}}"
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
                    {{$instance_module_cursuses->links()}}
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
                        <form class="mt-4" action="{{url('admin/instance_module_cursus_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Module cursus</label>
                                    <select class="form-control select2" name="id_module_cursus">
                                        <option>Select</option>
                                        @if (count($module_cursuses) > 0)
                                        @foreach ($module_cursuses as $module_cursus)
                                        <option value="{{ $module_cursus->id }}">{{ $module_cursus->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Semester au</label>
                                    <select class="form-control select2" name="id_semester_au">
                                        <option>Select</option>
                                        @if (count($semester_aus) > 0)
                                        @foreach ($semester_aus as $semester_au)
                                        <option value="{{ $semester_au->id }}">{{
                                            $semester_au->libelle }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Ecole</label>
                                    <select class="form-control select2" name="id_ecole">
                                        <option>Select</option>
                                        @if (count($ecoles) > 0)
                                        @foreach ($ecoles as $ecole)
                                        <option value="{{ $ecole->id }}">{{
                                            $ecole->type }}</option>
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