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
                                <h4 class="font-size-18">Profile</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Shoppy</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-xl-3 col-md-4">
                                            <div class="text-center"
                                                style="text-align: center;display: flex;flex-direction: column;align-items: center;flex-wrap: wrap;gap: 1.25rem;justify-content: center;">
                                                <div class="image-wrapper text-center"
                                                    style="position: relative; width:120px; height:120px;">
                                                    <img src="{{ Auth::user()->avatar ? asset('storage/uploads/students/avatars/'.Auth::user()->avatar) : asset('images/users/user-4.jpg')}}"
                                                        alt="" class="rounded-circle mb-3" width="120" height="120">
                                                    <div class="profile-edit shadow"
                                                        style="position: absolute; bottom: 36px; right: -16px; padding: 8px; background-color: white; border-radius: 20px; width: 34px; height: 34px;">
                                                        <label for="avatar" class="d-inline-block"
                                                            style="cursor: pointer;">
                                                            <i class="mdi mdi-camera"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-md-8">
                                            <h4 class="mt-0 header-title">Personal Information</h4>
                                            <p class="text-muted mb-4">Your personal details are safe with us.
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table table-centered table
                                                        table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Fistname</td>
                                                            <td class="font-weight-bold">
                                                                {{Auth::user()->firstname}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lastname</td>
                                                            <td class="font-weight-bold">
                                                                {{Auth::user()->lastname}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td class="font-weight-bold">{{Auth::user()->email}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Matricule</td>
                                                            <td class="font-weight-bold">{{Auth::user()->etudiant->matricule}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Telephone</td>
                                                            <td class="font-weight-bold">{{Auth::user()->etudiant->tel}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>CIN</td>
                                                            <td class="font-weight-bold">{{Auth::user()->etudiant->cin}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Adresse</td>
                                                            <td class="font-weight-bold">{{Auth::user()->etudiant->adresse}}
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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