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
                                <h4 class="font-size-18">Teachers</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Teachers</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-block">
                                <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary waves-effect waves-light"
                                    >Add new</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Teachers</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Avatar</th>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Email</th>
                                                    <th>Matricule</th>
                                                    <th>CIN</th>
                                                    <th>Telephone</th>
                                                    <th>Adresse</th>
                                                    <th>Type</th>
                                                    <th>Niveau</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($teachers) == 0)
                                                <tr>
                                                    <td colspan="12" class="text-center">
                                                        <img src="{{asset('images/no_data.svg')}}" height="124"
                                                            class="mt-3">
                                                        <p class="text-muted py-3">No teachers was found, try adding
                                                            some.</p>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-center">Add a teacher</button>
                                                    </td>
                                                </tr>
                                                @else
                                                @foreach($teachers as $teacher)
                                                <tr>
                                                    <td>{{$teacher->id}}</td>
                                                    <td><img src="{{ $teacher->user->avatar ? asset('storage/uploads/teachers/avatars/'.$teacher->user->avatar) : asset('images/users/user-4.jpg')}}"
                                                            alt="" class="rounded-circle mb-3" width="42" height="42"></td>
                                                    <td>{{$teacher->user->lastname}}</td>
                                                    <td>{{$teacher->user->firstname}}</td>
                                                    <td>{{$teacher->user->email}}</td>
                                                    <td>{{$teacher->matricule}}</td>
                                                    <td>{{$teacher->cin}}</td>
                                                    <td>{{$teacher->tel}}</td>
                                                    <td>{{$teacher->adresse}}</td>
                                                    <td>{{$teacher->type}}</td>
                                                    <td>{{$teacher->niveau}}</td>
                                                    <td style="display: flex; align-items: center; justify-content: center; gap: 0.25rem;">
                                                        <a href="{{ url('admin/teacher/edit', $teacher->id) }}" class="btn btn-primary waves-effect waves-light">Edit</a>

                                                        <button type="button"
                                                            class="btn btn-info waves-effect waves-light"
                                                            data-toggle="modal" data-target=".bs-deactivate{{ $teacher->id }}">{{ $teacher->user->active == 1 ? 'Deactivate' : 'Activate' }}</button>

                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal" data-target=".bs-delete{{ $teacher->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-deactivate{{ $teacher->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">{{ $teacher->user->active == 1 ? 'Deactivate' : 'Activate' }} a teacher</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4" action="{{url('admin/teacher/deactivate', $teacher->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <p>Are you sure, you want to {{ $teacher->user->active == 1 ? 'deactivate' : 'activate' }} this teacher?</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{ $teacher->user->active == 1 ? 'Deactivate' : 'Activate' }}</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>

                                                            </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                                <div class="modal fade bs-delete{{ $teacher->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Delete a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4" action="{{url('admin/teacher/delete', $teacher->id)}}"
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
                    {{$teachers->links()}}
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</x-layout>