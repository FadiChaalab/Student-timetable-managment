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
                                <h4 class="font-size-18">Student</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Polytechnic</a></li>
                                    <li class="breadcrumb-item active">Student</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Student</h4>
                                    <form action="{{url('admin/student/edit_post', $student->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-4"
                                                style="text-align: center;display: flex;flex-direction: column;align-items: center;flex-wrap: wrap;gap: 1.25rem;justify-content: center;">
                                                <div class="image-wrapper text-center"
                                                    style="position: relative; width:120px; height:120px;">
                                                    <img src="{{ $student->user->avatar ? asset('storage/uploads/students/avatars/'.$student->user->avatar) : asset('images/users/user-4.jpg')}}" alt=""
                                                        class="rounded-circle mb-3" width="120" height="120">
                                                    <div class="profile-edit shadow"
                                                        style="position: absolute; bottom: 36px; right: -16px; padding: 8px; background-color: white; border-radius: 20px; width: 34px; height: 34px;">
                                                        <label for="avatar" class="d-inline-block"
                                                            style="cursor: pointer;">
                                                            <i class="mdi mdi-camera"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="file" name="avatar" id="avatar" class="d-none">
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="lastname">Nom</label>
                                                    <input type="text" class="form-control" id="lastname"
                                                        placeholder="Enter nom" name="lastname"
                                                        value="{{$student->user->lastname}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="firstname">Prenom</label>
                                                    <input type="text" class="form-control" id="firstname"
                                                        placeholder="Enter prenom" name="firstname"
                                                        value="{{$student->user->firstname}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter email" name="email" value="{{$student->user->email}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="matricule">Matricule</label>
                                                    <input type="text" class="form-control" id="matricule"
                                                        placeholder="Enter matricule" name="matricule"
                                                        value="{{$student->matricule}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="cin">CIN</label>
                                                    <input type="number" class="form-control" id="cin"
                                                        placeholder="Enter cin" name="cin" value="{{$student->cin}}">
                                                </div>

                                            </div>

                                            <div class="col-sm-4">

                                                <div class="form-group">
                                                    <label for="tel">Telephone</label>
                                                    <input type="number" class="form-control" id="tel"
                                                        placeholder="Enter telephone" name="tel" value="{{$student->tel}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="adresse">Adresse</label>
                                                    <input type="text" class="form-control" id="adresse"
                                                        placeholder="Enter adresse" name="adresse"
                                                        value="{{$student->adresse}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="parent_tel">Parent telephone</label>
                                                    <input type="number" class="form-control" id="parent_tel"
                                                        placeholder="Enter telephone" name="parent_tel"
                                                        value="{{$student->parent_tel}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="parent_email">Parent email</label>
                                                    <input type="email" class="form-control" id="parent_email"
                                                        placeholder="Enter email" name="parent_email"
                                                        value="{{$student->parent_email}}">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Etat civil</label>
                                                    <select class="form-control select2" name="id_etat_civil">
                                                        <option>Select</option>
                                                        @if (count($etat_civils) > 0)
                                                        @foreach ($etat_civils as $etat_civil)
                                                        <option value="{{ $etat_civil->id }}" {{ $student->id_etat_civil == $etat_civil->id ? 'selected' : '' }}>{{
                                                            $etat_civil->libelle }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="float-right d-block">
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Update student</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</x-layout>