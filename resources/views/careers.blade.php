@extends('layouts.app')

@push('styles')
    <style>
        /* Custom CSS to change the color of the active pagination link */
        .page-item.active .page-link {
            background-color: #FF8551;
            /* Replace with your desired background color */
            border-color: #ffff;
            /* Replace with your desired border color */
            color: white !important;
            /* Replace with your desired text color */
        }
    </style>
@endpush

@section('content')
    <section class="bg-custom-img">
        <div class="container py-3 hidden">
            <div class="row my-4">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <form action="{{ route('careers') }}" method="GET" class="d-flex">
                        <input type="text" class="form-control me-2" name="search" id="search-input"
                            placeholder="Search..." value="{{ $searchTerm }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <div class="row g-4" id="portfolio-items">
                @foreach ($jobs as $job)
                    <div class="col-md-4">
                        <div class="card mb-4 h-100">
                            <div class="card-header">{{ $job['Specialization'] }}</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $job['job_name'] }}</h5>
                                <div class="container">
                                    <p class="card-text">{{ $job['short_description'] }}</p>
                                </div>
                            </div>
                            <div class="card-salary text-center my-4">
                                Average Salary: <span class="fw-bold text-dark">{{ $job['salary'] }}</span> per year
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn bg-custom-color text-light icon-link-hover">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="my-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" id="pagination">
                        @if ($totalPages > 1)
                            <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ route('careers', ['search' => $searchTerm, 'page' => $currentPage - 1]) }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ route('careers', ['search' => $searchTerm, 'page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ route('careers', ['search' => $searchTerm, 'page' => $currentPage + 1]) }}">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
