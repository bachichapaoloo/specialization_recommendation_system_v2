<!--begin::Search-->
<div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column me-3">
        @if ($searchLabel)
            <div class=" px-2 my-1 d-flex align-items-center position-relative">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input wire:model.debounce.300ms="search" type="text" data-kt-user-table-filter="search" class="form-control form-control-white form-control-sm w-230px ps-14" placeholder="{{$searchLabel}}">

            </div>
        @endif

    </div>
    <!--end::Page title-->
    <!--begin::Actions-->

        <div class="d-flex align-items-center py-2 py-md-1">
            <!--begin::Button-->
            @if($addButtonLabel)
                <a wire:click.prevent="addRow" class="btn btn-primary btn-sm fw-bolder"  >
                    <i class="la la-plus"></i>{{$addButtonLabel}}
                </a>
            @endif

            {{-- <a  target="_blank" class="btn btn-sm btn-icon btn-light btn-active-light-primary ms-5" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Print">
                <i class="fas fa-print"></i>
            </a> --}}

            <!--end::Button-->
        </div>

    <!--end::Actions-->
</div>


@if ($enableDeactivate && $totalDeactivated>0)
    @if (!$showDeactivate)
        <div class="d-flex flex-row pb-5">

            <div class="ms-2">

                <a wire:click="displayDeactivate()" class="btn btn-sm btn-icon-gray btn-light btn-active-light-primary"
                        >
                        <i class="bi bi-slash-circle fs-3"></i>
                        Deactivated: {{$totalDeactivated}}
                </a>

            </div>

        </div>
    @else
        <div class="d-flex flex-row pb-5">

            <div class="ms-2">

                <a wire:click="displayActivate()" class="btn btn-sm btn-icon-gray btn-light btn-active-light-primary"
                        >
                                <i class="bi bi-slash-circle fs-3"></i>
                               <- Back Deactivated: {{$totalDeactivated}}
                </a>

            </div>

        </div>
    @endif

@endif

