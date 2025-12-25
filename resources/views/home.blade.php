@extends('layouts.app')

@section('content')
    <div class="bg-white">

        <!--Showcase-->
        <section class="showcase bg-custom-img text-light p-5 text-center">
            <div class="container" id="showcase">
                <h3 class="lead pt-4 h3 text-light hidden">College of Computer Studies</h3>
                <h1 class="h1 text-center hidden">Specialization</h1>
                <h1 class="h1 text-center hidden">Recommendation</h1>

                <div class="container mt-5">
                    <a href="#" class="button-get-started hidden">Get Started</a>

                    <div class="image-container">
                        <img src="{{ asset('img/icons/wmad.png') }}" class="img-fluid d-none d-lg-block position1">
                        <img src="{{ asset('img/icons/amg.png') }}" class="img-fluid d-none d-lg-block position2">
                        <img src="{{ asset('img/icons/smp.png') }}" class="img-fluid bg-white d-none d-lg-block position3">
                        <img src="{{ asset('img/icons/wmad3.png') }}" class="img-fluid d-none d-lg-block position4">
                        <img src="{{ asset('img/icons/amg2.png') }}" class="img-fluid d-none d-lg-block position5">
                        <img src="{{ asset('img/icons/smp2.png') }}" class="img-fluid d-none d-lg-block position6">
                        <img src="{{ asset('img/icons/amg3.png') }}" class="img-fluid d-none d-lg-block position7">
                    </div>

                </div>
            </div>
        </section>

        <!-- About -->
        <section class="bg-white text-dark p-5 text-center text-md-start" id="about">
            <div class="container">
                <div class="d-md-flex align-item-center justify-content-between">

                    <div class="container about" style="margin-top: 7%">
                        <h4 class="text-secondary hidden">Specialization Recommendation System</h4>
                        <h4 class="display-5 text-dark py-2 hoverable-about hidden" id="about">About us</h4>
                        <p class="lead paragraph text-secondary hidden">
                            Welcome to our Specialization Recommendation System!
                            Utilizing cutting-edge AI and machine learning, we transform your aspirations into tailored
                            learning paths.
                            Seamlessly navigating through skills and interests, we guide you towards success in an
                            ever-changing landscape.
                            Your journey to expertise begins here.
                        </p>
                        <a href="{{route('about-us')}}" class="btn-button2 rounded-5 px-5 hidden">Learn More</a>
                    </div>

                    <div>

                    </div>

                    <img class="img-fluid my-5 hidden2" src="img/computer-img2.png" alt="" id="aboutimg">
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section class="bg-white text-dark p-5">
            <div class="container hidden">
                <div class="text-center">
                    <p class="display-7">We present to you the</p>
                    <p class="display-4 fw-bold mb-5" id="feature">Features</p>
                </div>

                <div class="row my-2">
                    {{-- Row 1 --}}
                    <div class="col-md-4 h-100 mb-3">
                        <div class="card rounded-4 rounded-4 shadow overflow-hidden hidden p-4 py-5"
                            style="background-color: #91c8e4">
                            <h1 class="fw-bold">Assessment</h1>
                            <p>
                                <span class="fw-semibold text-dark">Assessment Insights:</span> Recommendations based on
                                quiz results, providing insights into an
                                individual's knowledge and skills.
                            </p>

                            <div>
                                <a href="user-login.php" class="float-start fs-6 custom-a1">Get Started</a>
                                <img src="img/f1.png" alt=""
                                    class="img-fluid float-end d-none d-lg-block custom-f1">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8 h-100 mb-3">
                        <div class="card rounded-4 shadow overflow-hidden hidden2 p-4 py-5" style="background-color: #ffd9c0">
                            <h1 class="fw-bold z-3">Grade-based Recommendation</h1>
                            <p class="col-lg-7">
                                <span class="fw-semibold text-dark">Grades as a Yardstick:</span> Recommendations guided by
                                academic performance, using grades as a measure of proficiency, can help steer students
                                towards suitable courses, majors, or career paths.
                            </p>
                            <a href="user-login.php" class="float-start fs-6 custom-a2">Get Started</a>
                            <div class="d-inline">
                                <img src="img/f2.png" alt=""
                                    class="img-fluid float-end d-none d-lg-block custom-f2">
                            </div>
                        </div>

                    </div>
                    {{-- Row 2 --}}
                    <div class="col-md-8 h-100 mb-3">
                        <div class="card rounded-4 shadow overflow-hidden hidden p-4 py-5" style="background-color: #fba1b7">
                            <h1 class="fw-bold z-3">Preference-based Recommendation</h1>
                            <p class="col-lg-7">
                                <span class="fw-semibold text-dark">Personalized Preferences:</span> Recommendations
                                tailored to individual interests and preferences
                                generated by an integrated OpenAI engine.
                            </p>
                            <a href="user-login.php" class="float-start fs-6 custom-a3">Get Started</a>
                            <div class="d-inline">
                                <img src="img/f3.png" alt=""
                                    class="img-fluid float-end d-none d-lg-block custom-f2">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 h-100 mb-3">
                        <div class="card rounded-4 shadow overflow-hidden hidden2 p-4 py-5" style="background-color: #e8ffce">
                            <h1 class="fw-bold">Results</h1>
                            <p>
                                <span class="fw-semibold text-dark">View Recommendations:</span> View the results of your
                                recommendations. These options can help you
                                make better choices in picking the specializations.
                            </p>
                            <a href="user-login.php" class="float-start fs-6 custom-a4">Get Started</a>
                            <div class="d-inline">
                                <img src="img/f4.png" alt=""
                                    class="img-fluid float-end d-none d-lg-block custom-f3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Logos -->
        <section class="bg-white">
            <!--Organization logos-->
            <div class="container hidden">
                <div class="row ps-5 pb-5">
                    <div class="col-2">
                        <img src="img/logo-ccs.png" alt="Image 1" class="img-fluid w-50">
                    </div>
                    <div class="col-2">
                        <img src="img/o2.jpg" alt="Image 2" class="img-fluid w-50">
                    </div>
                    <div class="col-2">
                        <img src="img/o1.jpg" alt="Image 1" class="img-fluid w-50 rounded-circle">
                    </div>
                    <div class="col-2">
                        <img src="img/logo-semi.jpg" alt="Image 2" class="img-fluid w-50 rounded-circle">
                    </div>
                    <div class="col-2">
                        <img src="img/logo-echo.png" alt="Image 1" class="img-fluid w-50 rounded-circle bg-dark">
                    </div>
                    <div class="col-2">
                        <img src="img/o2.jpg" alt="Image 2" class="img-fluid w-50">
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
