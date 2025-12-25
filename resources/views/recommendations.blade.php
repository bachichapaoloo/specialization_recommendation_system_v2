@extends('layouts.app')

@section('content')
    <!--3based Cards-->
    <section class="container my-5">
        <div class="container">
            <h3 class="card-title text-center display-4 p-3 fw-semibold hidden" id="recomm">Recommendations</h3>

            <div class="animate-delay row row-cols-1 row-cols-md-3 g-5 my-4">
                <div class="col animate-delay hidden">
                    <div class="card p-3 h-100 rounded-4" id="card-based">
                        <div class="card-body">
                            <h5 class="card-title fs-3 text-center fw-normal my-4">Grade-based</h5>
                            <h3 class="text-center percent mb-4">10%</h3>
                            <p class="card-text text-center ct">Of students follow this recommendation</p>

                            <ul class="info">
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                            </ul>

                            <div class="text-center">
                                <a href="{{route('grade-based')}}"
                                    class="getstarted rounded-4">Get started</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col animate-delay hidden">
                    <div class="card p-3 h-100 rounded-4" id="card-based">
                        <div class="card-body text">
                            <h5 class="card-title fs-3 text-center fw-normal my-4 based">Assessment-based</h5>
                            <h3 class="text-center percent mb-4">50%</h3>
                            <p class="card-text ct">Of students follow this recommendation</p>

                            <ul class="info">
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                            </ul>

                            <div class="text-center">
                                <a href="assessment.php" class="getstarted rounded-4">Get
                                    started</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col animate-delay hidden">
                    <div class="card p-3 h-100 rounded-4" id="card-based">
                        <div class="card-body">
                            <h5 class="card-title fs-3 text-center fw-normal my-4">Preference-based</h5>
                            <h3 class="text-center percent mb-4">40%</h3>
                            <p class="card-text ct">Of students follow this recommendation</p>

                            <ul class="info">
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                                <li>
                                    <i class="bi bi-check-lg"></i> other info
                                </li>
                            </ul>

                            <div class="text-center">
                                <a href="recommendations/preference.php"
                                    class="getstarted rounded-4">Get started</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </section>

    <!--Table-->
    <section>
        <div class="container my-5 hidden">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="th1">Compare<br>Recommendations</th>
                            <th scope="col" class="th2">Grade-based<br><span class="p1">10%</span></th>
                            <th scope="col" class="th3">Assessment-based<br><span class="p2">50%</span></th>
                            <th scope="col" class="th4">Preference-based<br><span class="p3">40%</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="row1">Team libraries </th>
                            <td>yes</td>
                            <td>no</td>
                            <td>yes</td>
                        </tr>
                        <tr>
                            <th scope="row" class="row2">Analytic platforms</th>
                            <td>yes</td>
                            <td>no</td>
                            <td>yes</td>
                        </tr>
                        <tr>
                            <th scope="row" class="row3">System analytics</th>
                            <td>yes</td>
                            <td>no</td>
                            <td>yes</td>
                        </tr>
                        <tr>
                            <th scope="row" class="row4">Advance support services</th>
                            <td>yes</td>
                            <td>no</td>
                            <td>yes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
