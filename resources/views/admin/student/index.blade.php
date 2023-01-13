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
                                <h4 class="font-size-18">Students</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Students</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-block">
                                <a href="{{ url('admin/student/add') }}" class="btn btn-primary waves-effect waves-light"
                                    >Add new</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Students</h4>
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
                                                    <th>Parent telephone</th>
                                                    <th>Parent email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($students) == 0)
                                                <tr>
                                                    <td colspan="12" class="text-center">
                                                        <img src="{{asset('images/no_data.svg')}}" height="124"
                                                            class="mt-3">
                                                        <p class="text-muted py-3">No students was found, try adding
                                                            some.</p>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".bs-example-modal-center">Add a student</button>
                                                    </td>
                                                </tr>
                                                @else
                                                @foreach($students as $student)
                                                <tr>
                                                    <td>{{$student->id}}</td>
                                                    <td><img src="{{ $student->user->avatar ? asset('storage/uploads/students/avatars/'.$student->user->avatar) : asset('images/users/user-4.jpg')}}"
                                                            alt="" class="rounded-circle mb-3" width="42" height="42"></td>
                                                    <td>{{$student->user->lastname}}</td>
                                                    <td>{{$student->user->firstname}}</td>
                                                    <td>{{$student->user->email}}</td>
                                                    <td>{{$student->matricule}}</td>
                                                    <td>{{$student->cin}}</td>
                                                    <td>{{$student->tel}}</td>
                                                    <td>{{$student->adresse}}</td>
                                                    <td>{{$student->parent_tel}}</td>
                                                    <td>{{$student->parent_email}}</td>
                                                    <td style="display: flex; align-items: center; justify-content: center; gap: 0.25rem;">
                                                        <a href="{{ url('admin/student/edit', $student->id) }}" class="btn btn-primary waves-effect waves-light">Edit</a>

                                                        <button type="button"
                                                            class="btn btn-info waves-effect waves-light"
                                                            data-toggle="modal" data-target=".bs-deactivate{{ $student->id }}">{{ $student->user->active == 1 ? 'Deactivate' : 'Activate' }}</button>

                                                        <button type="button"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal" data-target=".bs-delete{{ $student->id }}">Delete</button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade bs-deactivate{{ $student->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">{{ $student->user->active == 1 ? 'Deactivate' : 'Activate' }} a student</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4" action="{{url('admin/student/deactivate', $student->id)}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">

                                                                    <p>Are you sure, you want to {{ $student->user->active == 1 ? 'deactivate' : 'activate' }} this student?</p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{ $student->user->active == 1 ? 'Deactivate' : 'Activate' }}</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>

                                                            </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                                <div class="modal fade bs-delete{{ $student->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Delete a record</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>
                                                            </div>
                                                            <form class="mt-4" action="{{url('admin/student/delete', $student->id)}}"
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
                    {{$students->links()}}
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</x-layout>