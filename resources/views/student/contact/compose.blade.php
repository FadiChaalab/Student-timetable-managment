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
                                <h4 class="font-size-18">Inbox</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                    <li class="breadcrumb-item active">Inbox</li>
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
                                    <a href="{{url('student/contact')}}" class="active">Inbox <span class="ml-1">
                                            @if(count($contacts) > 0)
                                            ({{count($contacts)}})
                                            @endif
                                        </span></a>
                                    <a href="{{url('student/contact/star')}}">Starred</a>
                                    <a href="{{url('student/contact/important')}}">Important</a>
                                    <a href="#">Draft</a>
                                    <a href="{{url('student/contact/sent')}}">Sent Mail</a>
                                    <a href="{{url('student/contact/trash')}}">Trash</a>
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
                                        <div class="btn-group mo-mb-2">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-inbox"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="btn-group ml-1 mo-mb-2">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i>
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
                                                <a class="dropdown-item" href="#">Mark as Unread</a>
                                                <a class="dropdown-item" href="#">Mark as Important</a>
                                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                                <a class="dropdown-item" href="#">Add Star</a>
                                                <a class="dropdown-item" href="#">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">

                                            <form action="{{url('student/contact/add_post')}}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="form-group">
                                                    <input type="email" name="to" class="form-control" placeholder="To">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="summernote" name="message">
                                                        
                                                    </textarea>
                                                </div>

                                                <div class="btn-toolbar form-group mb-0">
                                                    <div class="">
                                                        <button type="button"
                                                            class="btn btn-success waves-effect waves-light mr-1"><i
                                                                class="far fa-save"></i></button>
                                                        <button type="button"
                                                            class="btn btn-success waves-effect waves-light mr-1"><i
                                                                class="far fa-trash-alt"></i></button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            <span>Send</span> <i class="fab fa-telegram-plane ml-1"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
</x-layout>