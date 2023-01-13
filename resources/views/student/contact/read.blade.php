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
                                <h4 class="font-size-18">Email Read</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                    <li class="breadcrumb-item active">Email Read</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="email-leftbar card">
                                <a href="{{url('/student/contact/add')}}"
                                    class="btn btn-danger rounded btn-custom btn-block waves-effect waves-light">Compose</a>

                                <div class="mail-list mt-4">
                                    <a href="{{url('student/contact')}}"
                                        class="{{ $contact->trash == 0 ? 'active' : ''}}">Inbox <span
                                            class="ml-1">({{count($contacts)}})</span></a>
                                    <a href="{{url('student/contact/star')}}">Starred</a>
                                    <a href="{{url('student/contact/impotant')}}">Important</a>
                                    <a href="#">Draft</a>
                                    <a href="{{url('student/contact/sent')}}">Sent Mail</a>
                                    <a href="{{url('student/contact/trash')}}"
                                        class="{{ $contact->trash == 1 ? 'active' : ''}}">Trash</a>
                                </div>

                                <h5 class="mt-4">Labels</h5>

                                <div class="mail-list mt-4">
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-info float-right"></span>Theme
                                        Support</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-warning float-right"></span>Freelance</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-primary float-right"></span>Social</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-danger float-right"></span>Friends</a>
                                    <a href="#"><span
                                            class="mdi mdi-arrow-right-drop-circle text-success float-right"></span>Family</a>
                                </div>
                            </div>
                            <div class="email-rightbar mb-3">
                                <div class="card">
                                    <div class="btn-toolbar p-3" role="toolbar">
                                        @if ($contact->trash == 0)
                                        <div class="btn-group mo-mb-2">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-inbox"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" data-toggle="modal"
                                                            data-target=".bs-trash{{ $contact->id }}" class="btn btn-primary waves-light waves-effect"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i>
                                                <i class="mdi mdi-chevron-down ml-1"></i>
                                            </button>
                                            <div class="dropdown-menu mo-mb-2">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>
                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tag"></i>
                                                <i class="mdi mdi-chevron-down ml-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>

                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                More <i class="mdi mdi-chevron-down ml-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{url('student/contact/unread_post', $contact->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="dropdown-item" type="submit">Mark as Unread</button>
                                                </form>
                                                <form action="{{url('student/contact/important_post', $contact->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="dropdown-item" type="submit">Mark as Important</button>
                                                </form>
                                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                                <form action="{{url('student/contact/star_post', $contact->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="dropdown-item" type="submit">Add Star</button>
                                                </form>
                                                <a class="dropdown-item" href="#">Mute</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="card-body">

                                        <div class="media mb-4">
                                            @if ($contact->sender->id_role == 1)
                                            <img class="d-flex mr-3 rounded-circle avatar-sm"
                                                src="{{ $contact->sender->avatar ? asset('storage/uploads/admins/avatars/'.$contact->sender->avatar) : asset('images/users/user-4.jpg')}}"
                                                alt="Generic placeholder image">
                                            @endif
                                            @if ($contact->sender->id_role == 2)
                                            <img class="d-flex mr-3 rounded-circle avatar-sm"
                                                src="{{ $contact->sender->avatar ? asset('storage/uploads/students/avatars/'.$contact->sender->avatar) : asset('images/users/user-4.jpg')}}"
                                                alt="Generic placeholder image">
                                            @endif
                                            @if ($contact->sender->id_role == 3)
                                            <img class="d-flex mr-3 rounded-circle avatar-sm"
                                                src="{{ $contact->sender->avatar ? asset('storage/uploads/teachers/avatars/'.$contact->sender->avatar) : asset('images/users/user-4.jpg')}}"
                                                alt="Generic placeholder image">
                                            @endif
                                            <div class="media-body">
                                                <h4 class="font-size-15 m-0">{{$contact->sender->firstname.'
                                                    '.$contact->sender->lastname}}</h4>
                                                <small class="text-muted">{{$contact->from}}</small>
                                            </div>
                                        </div>

                                        <p>{{$contact->message}}</p>
                                        <hr />
                                        @if ($contact->trash == 0)
                                        <a href="#" class="btn btn-secondary waves-effect mt-4"><i
                                                class="mdi mdi-reply"></i> Reply</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-trash{{ $contact->id }}" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Delete a record</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="mt-4" action="{{url('student/contact/trash_post', $contact->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">

                                <p>Are you sure, you want to move to trash?</p>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        @include('layouts.footer')
    </div>
</x-layout>