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
                                    <a href="{{url('/admin/contact/add')}}" class="btn btn-danger rounded btn-custom btn-block waves-effect waves-light">Compose</a>
        
                                    <div class="mail-list mt-4">
                                        <a href="{{url('admin/contact')}}">Inbox</a>
                                        <a href="{{url('admin/contact/star')}}" class="active">Starred <span class="ml-1">
                                                @if(count($contacts) > 0)
                                                    ({{count($contacts)}})
                                                @endif
                                            </span></a>
                                        <a href="{{url('admin/contact/important')}}">Important</a>
                                        <a href="#">Draft</a>
                                        <a href="{{url('admin/contact/sent')}}">Sent Mail</a>
                                        <a href="{{url('admin/contact/trash')}}">Trash</a>
                                    </div>
        
                                    <h5 class="mt-4">Labels</h5>
        
                                    <div class="mail-list mt-4">
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-info float-right"></span>Theme Support</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right"></span>Freelance</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-primary float-right"></span>Social</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-danger float-right"></span>Friends</a>
                                        <a href="#"><span class="mdi mdi-arrow-right-drop-circle text-success float-right"></span>Family</a>
                                    </div>
                                </div>
                                <div class="email-rightbar mb-3">
                                    <div class="card">
                                        <div class="btn-toolbar p-3" role="toolbar">
                                            <div class="btn-group mo-mb-2">
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                            <div class="btn-group ml-1 mo-mb-2">
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                                        <ul class="message-list">
                                            @if(count($contacts) == 0)
                                                <table class="table table-hover table-centered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7" class="text-center">
                                                                <img src="{{asset('images/no_data.svg')}}" height="124" class="mt-3">
                                                                    <p class="text-muted py-3">No mails was found, try giving stars.</p>
                                                                    <a href="{{url('/admin/contact')}}" class="btn btn-primary waves-effect waves-light">Refresh</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @else
                                                @foreach($contacts as $contact)
                                                    <li class="{{ $contact->read == 0 ? 'unread' : ''}}">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk.{{$contact->id}}">
                                                                <label for="chk.{{$contact->id}}" class="toggle"></label>
                                                            </div>
                                                            <a href="{{url('admin/contact/read', $contact->id)}}" class="title">{{$contact->id_sender == Auth::user()->id ? 'me' : $contact->sender->firstname}}, {{$contact->id_reciever == Auth::user()->id ? 'me' : $contact->reciever->firstname}}</a><span class="star-toggle fas fa-star"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <a href="{{url('admin/contact/read', $contact->id)}}" class="subject">{{$first = explode(' ', $contact->message, 2)[0]}} – <span class="teaser">{{$teaser = explode(' ', $contact->message, 2)[1]}}</span></a>
                                                            <div class="date">{{date('M d', strtotime($contact->created_at))}}</div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-7">
                                            @if(count($contacts) > 0)
                                                Showing {{$contacts->firstItem()}} - {{$contacts->lastItem()}} of {{$contacts->total()}}
                                            @endif
                                        </div>
                                        <div class="col-5">
                                            {{$contacts->links()}}
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