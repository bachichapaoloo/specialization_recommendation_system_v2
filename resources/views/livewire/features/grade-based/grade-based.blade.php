<div class="container py-4">
    {{--
       Configuration: Grouped subjects for better UX.
    --}}
    @php
        $groups = [
            'Core Programming & Logic' => [['id' => 'ITEC102', 'name' => 'Fundamentals of Programming'], ['id' => 'ITEC103', 'name' => 'Intermediate Programming'], ['id' => 'ITEC205', 'name' => 'Information Management'], ['id' => 'ITEL201', 'name' => 'Object Oriented Programming (ITEL201)']],
            'Advanced Systems & Architecture' => [['id' => 'ITEC204', 'name' => 'Data Structures and Algorithm (ITEC204)'], ['id' => 'ITEP204', 'name' => 'Advance Database Systems (ITEP204)'], ['id' => 'ITEP205', 'name' => 'Multimedia Systems (ITEP205)'], ['id' => 'ITEL203', 'name' => 'Web Systems and Technologies (ITEL203)']],
            'General Education & Applied IT' => [['id' => 'GEC106', 'name' => 'Art Appreciation (GEC106)'], ['id' => 'GEC108', 'name' => 'Ethics (GEC108)'], ['id' => 'ITEP203', 'name' => 'Quantitative Methods (ITEP203)'], ['id' => 'ITEP207', 'name' => 'Networking 1']],
        ];

        // Grading Scale
        $gradeOptions = [1.0, 1.25, 1.5, 1.75, 2.0, 2.25, 2.5, 2.75, 3.0, 4.0, 5.0];
    @endphp

    {{-- Header Section --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary display-5">
            <i class="bi bi-mortarboard-fill"></i> Specialization Recommender
        </h1>
        <p class="text-muted lead">
            Enter your academic performance below to discover the IT specialization
            best suited to your strengths using our AI model.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">

            {{-- Error & Message Handling --}}
            @if ($errors->any())
                <div id="errorAlert"
                    class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3 mb-4"
                    role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                        <div>
                            <strong>Please check your inputs</strong>
                        </div>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @if (session()->has('error'))
                <div class="alert alert-danger shadow-sm border-0 rounded-3 mb-4">
                    <i class="bi bi-x-circle-fill me-2"></i> {{ session('error') }}
                </div>
            @endif

            {{-- Input Form --}}
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-5">
                <div class="card-header bg-white p-4 border-bottom">
                    <h4 class="mb-0 fw-bold text-dark">
                        <i class="bi bi-clipboard-data text-primary me-2"></i> Academic Records
                    </h4>
                </div>

                <div class="card-body p-4 bg-light">
                    <form wire:submit.prevent="submit">

                        {{-- Loop through Groups --}}
                        @foreach ($groups as $groupName => $subjects)
                            <div class="mb-4 bg-white p-3 rounded-3 shadow-sm border">
                                <h6
                                    class="text-uppercase text-primary fw-bold mb-3 small letter-spacing-1 border-bottom pb-2">
                                    {{ $groupName }}
                                </h6>
                                <div class="row g-3">
                                    @foreach ($subjects as $subject)
                                        <div class="col-md-6 col-lg-3">
                                            <label for="{{ $subject['id'] }}"
                                                class="form-label fw-semibold small text-dark"
                                                style="min-height: 40px; display: block;">
                                                {{ $subject['name'] }}
                                            </label>
                                            <select id="{{ $subject['id'] }}" wire:model="{{ $subject['id'] }}"
                                                class="form-select border-secondary-subtle focus-ring @error($subject['id']) is-invalid @enderror"
                                                style="cursor: pointer;">
                                                <option value="" class="text-muted">-- Grade --</option>
                                                @foreach ($gradeOptions as $grade)
                                                    <option value="{{ $grade }}">{{ number_format($grade, 2) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        {{-- Action Button --}}
                        <div class="d-grid gap-2 col-md-6 mx-auto mt-5">
                            <button type="submit"
                                class="btn btn-primary btn-lg rounded-pill shadow-sm py-3 fw-bold position-relative overflow-hidden"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>
                                    <i class="bi bi-stars"></i> Generate Recommendation
                                </span>
                                <div wire:loading class="d-flex align-items-center justify-content-center">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true"></span>
                                    Running AI Analysis...
                                </div>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- Results Section --}}
            @if (!empty($recommendationResult))
                <div class="row animate__animated animate__fadeInUp">
                    {{-- Left Column: The Winner --}}
                    <div class="col-md-5 mb-4">
                        <div
                            class="card h-100 shadow border-0 rounded-4 bg-gradient bg-primary text-white position-relative overflow-hidden">
                            {{-- Decorative Background Circle --}}
                            <div class="position-absolute top-0 start-50 translate-middle bg-white opacity-10 rounded-circle"
                                style="width: 300px; height: 300px;"></div>

                            <div
                                class="card-body text-center d-flex flex-column justify-content-center align-items-center p-5 position-relative">
                                <div class="mb-3">
                                    <i class="bi bi-trophy-fill display-1 text-warning filter-drop-shadow"></i>
                                </div>
                                <h6 class="text-uppercase letter-spacing-2 opacity-75 mb-2">Top Recommendation</h6>
                                <h2 class="display-6 fw-bolder mb-3 text-break">
                                    {{ $recommendationResult['recommended_track'] }}
                                </h2>
                                <span class="badge bg-white text-primary rounded-pill px-3 py-2 fs-6 shadow-sm">
                                    <i class="bi bi-check-circle-fill me-1"></i> Best Fit
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: The Breakdown --}}
                    <div class="col-md-7 mb-4">
                        <div class="card h-100 shadow border-0 rounded-4">
                            <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                                <h5 class="fw-bold mb-0 text-dark">
                                    <i class="bi bi-bar-chart-line-fill text-primary me-2"></i> Confidence Analysis
                                </h5>
                                <p class="text-muted small mt-1">How likely each track fits your profile.</p>
                            </div>
                            <div class="card-body px-4 pb-4">
                                <div class="d-flex flex-column gap-4 mt-2">
                                    @foreach ($recommendationResult['scores'] as $track => $score)
                                        @php
                                            $percent = $score * 100;
                                            $color = $loop->first ? 'success' : ($percent > 40 ? 'primary' : 'secondary');
                                            $width = max($percent, 5); // Ensure at least a tiny bar shows
                                        @endphp

                                        <div>
                                            <div class="d-flex justify-content-between align-items-end mb-1">
                                                <span
                                                    class="fw-bold text-dark {{ $loop->first ? 'text-primary' : '' }}">
                                                    {{ $track }}
                                                </span>
                                                <span
                                                    class="fw-bold {{ $loop->first ? 'text-success' : 'text-muted' }}">
                                                    {{ number_format($percent, 1) }}%
                                                </span>
                                            </div>
                                            <div class="progress bg-light" style="height: 10px; border-radius: 10px;">
                                                <div class="progress-bar bg-{{ $color }}" role="progressbar"
                                                    style="width: {{ $width }}%; border-radius: 10px;"
                                                    aria-valuenow="{{ $width }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
