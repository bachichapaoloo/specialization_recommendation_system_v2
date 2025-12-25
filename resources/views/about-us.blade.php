@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endpush


@section('content')
    <div class="bg-white">
        <!-- About -->
        <br>
        <section class="text-dark py-5 text-center text-md-start" id="about">
            <div class="container">
                <div class="d-md-flex align-item-center justify-content-between">

                    <div class="container py-5 about hidden">
                        <h5 class="text-secondary">Specialization Recommendation System</h5>
                        <h4 class="display-5 text-dark py-2 hoverable-about" id="about">About us</h4>
                        <p class="lead paragraph text-secondary">
                            Welcome to our Specialization Recommendation System!
                            Utilizing cutting-edge AI and machine learning, we transform your aspirations into suitable
                            learning paths. Seamlessly navigating through skills and interests, we guide you towards success
                            in an ever-changinglandscape. Your journey to expertise begins here.
                        </p>
                        <a href="recommendations.php" class="button-get-started">Get Started</a>
                    </div>

                    <img class="img-fluid my-1 hidden2" src="../img/computer-img2.png" alt="" id="aboutimg">
                </div>
            </div>
        </section>

        <!--Card for advertising-->
        <section>
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border border-0 shadow overflow-hidden hidden" id="abcard">

                            <div class="row">
                                <div class="col-md-6 p-5">
                                    <h2 class="text-center fw-bold">Our founder's story in <br>producing good students</h2>
                                    <p class="card-text">
                                        Guided by unwavering dedication and vision, our founder set out on a transformative
                                        journey to nurture exceptional students.
                                        Our educational approach emphasizes both academic excellence and character
                                        development,
                                        producing graduates who excel in their
                                        fields while embodying strong ethical values.
                                    </p>

                                    <div class="card mt-5 shadow d-none d-lg-block" id="smallcard">
                                        <div class="card-body p-3">
                                            <p class="card-text1 text-secondary lh-1">Data Label <span><i
                                                        style="margin-left: 140px;"
                                                        class="bi bi-emoji-laughing text-white border p-2 bg-custom-color rounded-3"></i></span>
                                            </p>
                                            <p class="card-text2 lh-1">23, 000</p>
                                            <p class="card-text3 text-secondary lh-1"><i
                                                    class="bi bi-caret-up-fill text-success"></i><span class="fw-bold">
                                                    5.96%</span> period of change</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 p-5">
                                    <div class="container">
                                        <p class="card-text">
                                            Our institution's dedication to academic rigor and nurturing empathy, social
                                            responsibility, and compassion has shaped graduates
                                            who excel professionally while being responsible, empathetic, and socially
                                            conscious
                                            citizens. This enduring legacy, established
                                            by our founder, remains at the core of our institution, molding students into
                                            exceptional individuals who positively impact the world.
                                        </p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body p-3 shadow d-none d-lg-block" id="card2">
                                                <p class="card-text4"><i class="fa-solid fa-person person ps-3"></i>+ 10,567
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-body p-3 shadow d-none d-lg-block" id="card3">
                                                <p class="card-text4"><i class="fa-solid fa-person person ps-3"></i>+ 2,456
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <img src="../img/dean-img.png" alt="deanpicture" class="img d-none d-lg-block dean">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--History-->
        <section class="container">
            <h3 class="display-4 text-center fw-bold" id="feature">Our History</h3>
            <div class="timeline">
                <ul>
                    <li class="container1">
                        <h3>Creation of the CCSE</h3>
                        <div class="content">
                            <p>Creation of the College of Computer Studies and Education (CCSE). Separation of the Bachelor
                                of Science in Information Technology program from the College of Engineering and Industrial
                                Technology (CEIT), headed by late Prof. Elpidio Alda. Hon. Dr. Mario R. Briones became the
                                first College dean.</p>
                        </div>
                        <div class="time">
                            <h4>2008</h4>
                        </div>
                    </li>

                    <li class="container1">
                        <h3>Renaming and New Programs</h3>
                        <div class="content">
                            <p>Renaming of the College to the College of Computer Studies and Information Technology.
                                Introduction of new programs: Associate in Computer Technology, Associate in Computer
                                Secretarial, and Bachelor of Science in Secretarial Administration. Extension programs and
                                projects initiated to support nearby communities like Calauan, Laguna.</p>
                        </div>
                        <div class="time">
                            <h4>2009</h4>
                        </div>
                    </li>

                    <li class="container1">
                        <h3>New Dean and Expansion</h3>
                        <div class="content">
                            <p>Ms. Catherine A. Castillo became the new College dean. Renaming of the College to the College
                                of Computer Studies. Maintained the spirit of camaraderie among faculty members initiated by
                                Dr. Briones. Introduction of new academic programs: Bachelor of Science in Computer Science
                                and Master of Science in Information Technology. Faculty members engaged in research writing
                                and presentations at various conferences. Expanded extension programs to a broader
                                clientele.</p>
                        </div>
                        <div class="time">
                            <h4>2012</h4>
                        </div>
                    </li>

                    <li class="container1">
                        <h3>Maintaining Top Performance</h3>
                        <div class="content">
                            <p> Mr. Ronnel A. dela Cruz assumed the position of College Dean. Maintained the College’s top
                                performance, consistently ranking among the Top 3 Performing Colleges in the university
                                since 2014. Prioritized research presentations, collaborations, and publications. Focused on
                                enhancing program offerings, especially the Master of Science in Infrastructure Management
                                and Technology.</p>
                        </div>
                        <div class="time">
                            <h4>2018</h4>
                        </div>
                    </li>
                    <li class="container1">
                        <h3>Ongoing Developments</h3>
                        <div class="content">
                            <p> Continued efforts to intensify research productivity, promote technology transfer, and boost
                                the implementation of extension programs. Strong support for students' holistic development
                                to enhance employability and produce globally competitive graduates.</p>
                        </div>
                        <div class="time">
                            <h4>2021 - Present</h4>
                        </div>
                    </li>
                    <div style="clear:both;"></div>
                </ul>
            </div>
        </section>


        <!--Video-->
        <div class="embed-responsive embed-responsive-16by9 mx-auto">
            <iframe class="embed-responsive-item custom-video" src="../img/video.mp4" allowfullscreen></iframe>
        </div>

        <br><br><br>

        <!--Carousel-->
        <section class="container-fluid hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="display-3 text-light fw-bold">Our Team</h1>
                        </div>

                        <div class="owl-carousel owl-theme">

                            <div class="owl-carousel-info-wrap item">
                                <img src="../img/a2.jpg" class="owl-carousel-image img-fluid" alt="">
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">James</h4>
                                    <span class="badge">Front-End</span>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/SantiagoAngeless"
                                                class="social-icon-link"><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/james_otiago/"
                                                class="social-icon-link bi-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="../img/a1.jpg" class="owl-carousel-image img-fluid" alt="">
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Paolo</h4>
                                    <span class="badge">Back-End</span>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/starpatricknot" class="social-icon-link"><i
                                                    class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/patricc.not.star/"
                                                class="social-icon-link bi-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="../img/a3.jpg" class="owl-carousel-image img-fluid" alt="">
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Josef</h4>
                                    <span class="badge">Project Manager</span>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/kasparov21" class="social-icon-link"><i
                                                    class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/jsfgbrl/"
                                                class="social-icon-link bi-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="../img/a2.jpg" class="owl-carousel-image img-fluid" alt="">
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">James</h4>
                                    <span class="badge">Front-End</span>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/SantiagoAngeless"
                                                class="social-icon-link"><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/james_otiago/"
                                                class="social-icon-link bi-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="../img/a1.jpg" class="owl-carousel-image img-fluid" alt="">
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Paolo</h4>
                                    <span class="badge">Back-End</span>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/starpatricknot" class="social-icon-link"><i
                                                    class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/patricc.not.star/"
                                                class="social-icon-link bi-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-carousel-info-wrap item">
                                <img src="../img/a3.jpg" class="owl-carousel-image img-fluid" alt="">
                                <div class="owl-carousel-info">
                                    <h4 class="mb-2">Josef</h4>
                                    <span class="badge">Project Manager</span>
                                </div>
                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/kasparov21" class="social-icon-link"><i
                                                    class="bi bi-facebook"></i></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/jsfgbrl/"
                                                class="social-icon-link bi-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endpush
