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
                                <h4 class="font-size-18">Au</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Au</li>
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
                                    <h4 class="card-title mb-4">Au</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libelle</th>
                                                    <th>Annee</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($aus) == 0)
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
                                                @foreach($aus as $au)
                                                <tr>
                                                    <td>{{$au->id}}</td>
                                                    <td>{{$au->libelle}}</td>
                                                    <td>{{$au->annee}}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal" data-target=".bs-edit{{ $au->id }}">Edit</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal" data-target=".bs-delete{{ $au->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-edit{{ $au->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Edit a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">??</button>
                                                            </div>
                                                            <form class="mt-4" action="{{url('admin/au_edit', $au->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="libelle">Libelle</label>
                                                                        <input type="text" class="form-control"
                                                                            id="libelle" placeholder="Enter libelle"
                                                                            name="libelle" value="{{$au->libelle}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="annee">Annee</label>
                                                                        <input type="text" class="form-control"
                                                                            id="annee" placeholder="Enter annee"
                                                                            name="annee" value="{{$au->annee}}">
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

                                                <div class="modal fade bs-delete{{ $au->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Delete a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">??</button>
                                                            </div>
                                                            <form class="mt-4" action="{{url('admin/au_delete', $au->id)}}"
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
                    {{$aus->links()}}
                </div>
            </div>
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Add new record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                        </div>
                        <form class="mt-4" action="{{url('admin/au_post')}}" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="libelle">Libelle</label>
                                    <input type="text" class="form-control" id="libelle" placeholder="Enter libelle"
                                        name="libelle" value="{{old('libelle')}}">
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