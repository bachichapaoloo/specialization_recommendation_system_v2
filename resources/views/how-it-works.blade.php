@extends('layouts.app')

@section('content')
    <!--Video-->
    <div class="embed-responsive embed-responsive-16by9 mx-auto">
        <iframe class="embed-responsive-item custom-video" src="../img/video.mp4" allowfullscreen></iframe>
    </div>

    <!--Feature Benefits-->
    <section class="bg-white text-dark p-0 text-center text-md-start" id="about">
        <div class="container">
            <div class="d-md-flex align-item-center justify-content-between row">

                <img class="img-fluid my-5 col-md-6 hidden" src="../img/feature-benefit.png" alt="" id="aboutimg">

                <div class="container col-md-6 about py-5 hidden2">
                    <h2 class="h2 text-secondary">Specialization Recommendation System</h2>
                    <h4 class="display-5 text-dark py-2 hoverable-about" id="about">Feature Benefits</h4>
                    <p class="lead paragraph text-secondary">
                        A Specialization Recommendation System provides numerous advantages by customizing recommendations
                        to suit each individual's unique needs, interests, and aspirations,
                        thereby enhancing the overall learning experience. This system efficiently maps out career paths,
                        helping students and professionals make informed decisions about their
                        future pursuits and maximizing their skill development. It ensures that the recommended
                        specializations remain in alignment with current industry trends and demands,
                        ultimately leading to cost savings, higher employability, and enhanced professional satisfaction.
                    </p>
                    <h4><span class="text-warning me-2">+76</span> <span class="lead text-dark"> Number of Good Feedbacks
                        </span></h4>
                    <h4><span class="text-warning me-2">+69</span> <span class="lead text-dark"> Number of Success </span>
                    </h4>
                </div>
            </div>
        </div>
    </section>


    <!-- Accordion -->
    <section class="container-fluid p-5 bg-custom-img">

        <div class="container ftr-bnft shadow-lg bg-white rounded-4 p-5 my-5 d-none d-sm-block hidden">
            <h4 class="display-5 text-dark py-2 hoverable-about" id="about">Feature Benefits</h4>
            <div class="content">
                <input type="radio" name="slider" checked id="home">
                <input type="radio" name="slider" id="blog">
                <input type="radio" name="slider" id="help">
                <input type="radio" name="slider" id="code">
                <input type="radio" name="slider" id="about">
                <div class="list">
                    <label for="home" class="home">
                        <span class="title text-dark">1st Benefit</span>
                    </label>
                    <label for="blog" class="blog">
                        <span class="title text-dark">2nd Benefit</span>
                    </label>
                    <label for="help" class="help">
                        <span class="title text-dark">3rd Benefit</span>
                    </label>
                    <label for="code" class="code">
                        <span class="title text-dark">4th Benefit</span>
                    </label>
                    <div class="slider"></div>
                </div>
                <div class="text-content">
                    <div class="home text">
                        <div class="title pb-3">Enhanced Resource Allocation</div>
                        <hr class="mt-0 mb-4">
                        <p class="lead fs-5 pe-5">
                            The implementation of a specialization recommendation system within an IT department brings
                            forth the advantage
                            of streamlined resource allocation. By intelligently matching the right team members to
                            particular tasks or projects based on their
                            specialized skills and expertise, this system ensures optimal resource utilization. The result
                            is a significant reduction in instances
                            of skill mismatch or underutilization, ultimately leading to improved project success rates and
                            more efficient project timelines.
                        </p>
                    </div>
                    <div class="blog text">
                        <div class="title pb-3">Facilitated Collaboration and Synergy</div>
                        <hr class="mt-0 mb-4">
                        <p class="lead fs-5 pe-5">
                            The specialization recommendation system acts as a catalyst for improved collaboration among IT
                            professionals. By identifying and
                            pairing team members based on their unique areas of specialization, the system promotes the
                            formation of cross-functional teams
                            with complementary skills. This strategic alignment of talents not only enhances teamwork but
                            also fosters an environment of synergy,
                            where diverse expertise converges to deliver high-quality, comprehensive solutions to complex IT
                            challenges.
                        </p>
                    </div>
                    <div class="help text">
                        <div class="title pb-3">Swift and Effective Problem Resolution</div>
                        <hr class="mt-0 mb-4">
                        <p class="lead fs-5 pe-5">
                            Rapid problem resolution is a hallmark of the specialization recommendation system's impact.
                            When technical challenges arise,
                            the system's ability to promptly identify and connect the most relevant IT experts capable of
                            addressing the specific issue
                            accelerates the troubleshooting process. This translates to reduced system downtime, increased
                            system reliability, and a more
                            efficient IT support framework overall.
                        </p>
                    </div>
                    <div class="code text">
                        <div class="title pb-3">Cultivation of Continuous Skill Development</div>
                        <hr class="mt-0 mb-4">
                        <p class="lead fs-5 pe-5">
                            One of the enduring benefits of the specialization recommendation system is its contribution to
                            the ongoing skill development
                            of IT professionals. By suggesting tailored training opportunities, projects, or assignments
                            aligned with each individual's
                            specialization, the system nurtures a culture of continuous learning. This proactive approach
                            ensures that team members remain
                            well-versed in the latest technologies and industry trends, bolstering their capacity to adapt
                            to evolving IT landscapes effectively.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container accordion accordion-flush my-5 d-md-none d-sm-block hidden" id="accordionExample">
            <h4 class="text-white text-center fc-heading pb-3">Feature Benefits</h4>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Benefit #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="acrdn-text">
                            One of the enduring benefits of the specialization recommendation system is its contribution to
                            the ongoing skill development
                            of IT professionals. By suggesting tailored training opportunities, projects, or assignments
                            aligned with each individual's
                            specialization, the system nurtures a culture of continuous learning. This proactive approach
                            ensures that team members remain
                            well-versed in the latest technologies and industry trends, bolstering their capacity to adapt
                            to evolving IT landscapes effectively.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Benefit #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="acrdn-text">
                            The specialization recommendation system acts as a catalyst for improved collaboration among IT
                            professionals. By identifying and
                            pairing team members based on their unique areas of specialization, the system promotes the
                            formation of cross-functional teams
                            with complementary skills. This strategic alignment of talents not only enhances teamwork but
                            also fosters an environment of synergy,
                            where diverse expertise converges to deliver high-quality, comprehensive solutions to complex IT
                            challenges.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Benefit #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="acrdn-text">
                            Rapid problem resolution is a hallmark of the specialization recommendation system's impact.
                            When technical challenges arise,
                            the system's ability to promptly identify and connect the most relevant IT experts capable of
                            addressing the specific issue
                            accelerates the troubleshooting process. This translates to reduced system downtime, increased
                            system reliability, and a more
                            efficient IT support framework overall.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Benefit #4
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="acrdn-text">
                            One of the enduring benefits of the specialization recommendation system is its contribution to
                            the ongoing skill development
                            of IT professionals. By suggesting tailored training opportunities, projects, or assignments
                            aligned with each individual's
                            specialization, the system nurtures a culture of continuous learning. This proactive approach
                            ensures that team members remain
                            well-versed in the latest technologies and industry trends, bolstering their capacity to adapt
                            to evolving IT landscapes effectively.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
