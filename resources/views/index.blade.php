<x-layout>
    <style>
        i {
            font-size: 24px;
        }

        body {
            background: white;
            overflow-x: hidden;
        }

        .icon-wrapper {
            width: 56px;
            height: 56px;
            text-align: center;
            align-items: center;
            justify-content: center;
            display: flex;
            border-radius: 50%;
        }

        .sphere{
            scale: 1;
            animation: rotate-translate 7s infinite;
        }

        .curved {
            position: absolute;
            bottom: -90%;
            left: -20%;
            height: 224px;
            transform: rotate(-270deg);
        }

        #mouse-scroll {
            style: block;
        }

        #mouse-scroll {
            position: absolute;
            margin: auto;
            left: 50%;
            bottom: 40px;
            -webkit-transform: translateX(-50%);
            z-index: 9999;
        }

        #mouse-scroll span {
            display: block;
            width: 5px;
            height: 5px;
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            transform: rotate(45deg);
            border-right: 2px solid #000;
            border-bottom: 2px solid #000;
            margin: 0 0 3px 5px;
        }

        #mouse-scroll .mouse {
            height: 21px;
            width: 14px;
            border-radius: 10px;
            -webkit-transform: none;
            -ms-transform: none;
            transform: none;
            border: 2px solid #000;
            top: 170px;
        }

        #mouse-scroll .down-arrow-1 {
            margin-top: 6px;
        }

        #mouse-scroll .down-arrow-1,
        #mouse-scroll .down-arrow-2,
        #mouse-scroll .down-arrow-3 {
            -webkit-animation: mouse-scroll 1s infinite;
            -moz-animation: mouse-scroll 1s infinite:
        }

        #mouse-croll .down-arrow-1 {
            -webkit-animation-delay: .1s;
            -moz-animation-delay: .1s;
            -webkit-animation-direction: alternate;
        }

        #mouse-scroll .down-arrow-2 {
            -webkit-animation-delay: .2s;
            -moz-animation-delay: .2s;
            -webkit-animation-direction: alternate;
        }

        #mouse-scroll .down-arrow-3 {
            -webkit-animation-delay: .3s;
            -moz-animation-dekay: .3s;
            -webkit-animation-direction: alternate;
        }

        #mouse-scroll .mouse-in {
            height: 5px;
            width: 2px;
            display: block;
            margin: 5px auto;
            background: #000;
            position: relative;
        }

        #mouse-scroll .mouse-in {
            -webkit-animation: animated-mouse 1.2s ease infinite;
            moz-animation: mouse-animated 1.2s ease infinite;
        }
        

        @-webkit-keyframes rotate-translate {
            0%, 100% {
                -webkit-transform: rotate(0deg);
                -webkit-transform: translateY(-30px);
            }
            50% {
                -webkit-transform: rotate(360deg);
                -webkit-transform: translateY(30px);
            }
        }

        @-webkit-keyframes animated-mouse {
            0% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                -webkit-transform: translateY(6px);
                -ms-transform: translateY(6px);
                transform: translateY(6px);
            }
        }

        @-webkit-keyframes mouse-scroll {
            0% {
                opacity: 1;
            }

            50% {
                opacity: .5;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes mouse-scroll {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <div class="authentication-bg d-flex pb-0 vh-100 bg-white">
        <div class="w-100">
            <div class="container">
                <header>
                    <nav class="d-flex justify-content-between align-items-center py-2">
                        <div class="logo"><img src="{{asset('images/logo-dark.png')}}" alt="logo" height="80"></div>
                        <a href="#spaces" class="btn btn-warning text-dark py-2 px-4">Sign in</a>
                    </nav>
                </header>

                <section class="banner mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="banner-content">
                                <h1 class="banner-title mt-4"
                                    style="font-size: 48px; color: #212121; position: relative; z-index: 99;">Welcome to
                                    the <span class="text-primary">Polytechnic School of Sousse</span></h1>
                                <p class="banner-subtitle my-3" style="position: relative; z-index: 99;">
                                    Founded in 2009, the Polytechnic School of Sousse is a large private school of
                                    education and research with an international vocation, accredited EUR-ACE and whose
                                    sole vocation is to train engineers with a technical and scientific level in
                                    accordance with the best international standards. . It resolutely sets itself the
                                    mission of guaranteeing excellent professional integration for its young graduates
                                    by propelling them directly to employability.
                                </p>
                                <a href="#" class="btn btn-outline-primary waves-effect waves-light">Learn more</a>
                                <img class="stroke" src="{{asset('images/stroke.svg')}}" alt="stroke">
                                <img class="sphere" src="{{asset('images/sphere.png')}}" alt="sphere">
                                <img class="sphere-pink" src="{{asset('images/sphere-pink.png')}}" alt="sphere">
                                <img class="curved" src="{{asset('images/line.svg')}}" alt="curved">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="banner-image-content">
                                <img src="{{ asset('images/banner.png') }}" alt="banner" class="img-fluid">
                                <div class="card" style="width: 15rem; border-radius: 1.25rem;" id="banner-img-right">
                                    <div class="card-body" style="padding: 0.75rem 1.25rem;">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" height="42"
                                                src="{{asset('images/users/user-2.jpg')}}" alt="user">
                                            <div class="content">
                                                <p class="mb-0 font-size-16 text-dark">Anna May</p>
                                                <p class="mb-0 font-size-14">N°1 school of the year</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="width: 15rem; border-radius: 1.25rem;" id="banner-img-left">
                                    <div class="card-body" style="padding: 0.75rem 1.25rem;">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" height="42"
                                                src="{{asset('images/users/user-9.jpg')}}" alt="user">
                                            <div class="content">
                                                <p class="mb-0 font-size-16 text-dark">Jane Holand</p>
                                                <p class="mb-0 font-size-14">Experts in their fields</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#spaces">
                        <div id="mouse-scroll">
                            <div class="mouse">
                                <div class="mouse-in"></div>
                            </div>
                            <div>
                                <span class="down-arrow-1"></span>
                                <span class="down-arrow-2"></span>
                                <span class="down-arrow-3"></span>
                            </div>
                        </div>
                    </a>
                </section>

                <section class="spaces bg-white" id="spaces">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="card-body">
                                    <div class="icon-wrapper" style="background-color: #EFE4FC;">
                                        <i class="mdi mdi-face mdi-24px" style="color: #7A5F9A;"></i>
                                    </div>
                                    <h3 class="font-size-18 mt-5 mb-3">Student Space</h3>
                                    <p class="subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque
                                        veniam distinctio totam, esse commodi optio id amet. Ratione voluptatum deleniti
                                        velit iusto odit, numquam possimus.</p>
                                    <a href="{{route('student_login')}}" class="btn btn-outline-primary py-2 px-3 waves-effect waves-light">Get
                                        access</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="card-body">
                                    <div class="icon-wrapper" style="background-color: #DDDAFF;">
                                        <i class="mdi mdi-book mdi-24px" style="color: #4A3AFF;"></i>
                                    </div>
                                    <h3 class="font-size-18 mt-5 mb-3">Teacher Space</h3>
                                    <p class="subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque
                                        veniam distinctio totam, esse commodi optio id amet. Ratione voluptatum deleniti
                                        velit iusto odit, numquam possimus.</p>
                                    <a href="{{route('teacher_login')}}" class="btn btn-outline-primary py-2 px-3 waves-effect waves-light">Get
                                        access</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="card-body">
                                    <div class="icon-wrapper" style="background-color: #FFDFD8;">
                                        <i class="mdi mdi-security mdi-24px" style="color: #FF7051;"></i>
                                    </div>
                                    <h3 class="font-size-18 mt-5 mb-3">Admin Space</h3>
                                    <p class="subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque
                                        veniam distinctio totam, esse commodi optio id amet. Ratione voluptatum deleniti
                                        velit iusto odit, numquam possimus.</p>
                                    <a href="{{route('admin_login')}}" class="btn btn-outline-primary py-2 px-3 waves-effect waves-light">Get
                                        access</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-layout>