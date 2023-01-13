<x-layout>
    <div class="account-pages">
        <div class="accountbg"
            style="background: url({{asset('images/bg.jpg')}});background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="{{url('/')}}"><img src="{{asset('images/logo-dark.png')}}"
                                            height="84" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Register Now</h4>
                                <p class="text-muted text-center">Get your account to access admin panel now.</p>

                                <form class="mt-4" action="{{url('admin/register_post')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail"
                                            placeholder="Enter email" name="email" value="{{old('email')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname"
                                            placeholder="Enter firstname" name="firstname" value="{{old('firstname')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname"
                                            placeholder="Enter lastname" name="lastname" value="{{old('lastname')}}">
                                    </div>


                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword"
                                            placeholder="Enter password" name="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="userrepassword">Repeat Password</label>
                                        <input type="password" class="form-control" id="userrepassword"
                                            placeholder="Enter password" name="password_confirmation">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Register</button>
                                        </div>
                                    </div>

                                    <div class="form-group mt-2 mb-0 row">
                                        <div class="col-12 mt-3 text-center">
                                            <p class="mb-0">By registering you agree to the Polytechnique <a href="#"
                                                    class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </div>

                                </form>

                                <div class="mt-5 pt-4 text-center">
                                    <p>Already have an account ? <a href="{{url('admin/login')}}"
                                            class="font-weight-medium text-primary"> Login </a> </p>
                                    <p>© <script>
                                            document.write(new Date().getFullYear())
                                        </script> all rigths reserved.</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-layout>