
<tr class="@if($this->isSelected($item->id)) table-primary @endif ">
    @if ($massSelection)
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-secondary">
            <input wire:model.live="selectedRow" wire:loading.attr="disabled" class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{ $item->id }}"/>
        </div>
    </td>
    @endif

    @foreach ($rowField as $key => $column )
        <td class="text-dark fw-bold">

            @if ($linkProfile!='' and $key==0)
                <a href="{{url($linkProfile.$item->id)}}" target="_blank" class="">{{$item->$column}}</a>
            @else

                @if ($column=='filename')
                    <a href="#" wire:click.prevent="export('{{$item->filename}}')" >Download</a>
                @else
                 {{$item->$column}}
                @endif

            @endif

        </td>
    @endforeach
    @if($actionButton)
        <td colspan="{{count($columnHeader)+1}}">

                <div wire:key='delete_{{$item->id}}' wire:loading wire:target="delete({{$item->id}})" class="blockui-message ">
                    <span class="spinner-border spinner-border-sm align-middle ms-2 text-primary "></span>
                    deleting...
                </div>

                <div wire:key='edit{{$item->id}}' wire:loading wire:target="edit({{$item->id}})" class="blockui-message ">
                    <span class="spinner-border spinner-border-sm align-middle ms-2 text-primary "></span>

                </div>

                <div >

                    <a
                    data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Edit"
                    class="btn btn-info btn-sm btn-icon" wire:click.prevent="edit({{$item->id}})">
                    <i class="fa fa-pen"></i>
                    </a>
                    <button
                    data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Delete"
                    title="Delete" class="btn btn-danger btn-sm btn-icon" onClick="confirm('Are you sure do you want to delete?')
                    || event.stopImmediatePropagation()" wire:click.prevent="delete({{$item->id}})" ><i class="bi bi-archive-fill"></i>
                    </button>
                </div>

                @if ($enableDeactivate)
                    @if(!$showDeactivate)

                        <div class="menu-item px-3">
                            <a  onClick="confirm('Are you sure do you want to Deactivate?')
                            || event.stopImmediatePropagation()" wire:click.prevent="deactivate({{$item->id}})" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">
                            Deactivate
                        </a>
                        </div>

                    @else
                        <div class="menu-item px-3">
                            <a  onClick="confirm('Are you sure do you want to Reactivate?')
                            || event.stopImmediatePropagation()" wire:click.prevent="activate({{$item->id}})" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Activate</a>
                        </div>
                    @endif


                @else
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a  onClick="confirm('Are you sure do you want to delete?')
                        || event.stopImmediatePropagation()" wire:click.prevent="delete({{$item->id}})" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Delete</a>
                    </div>
                    <!--end::Menu item-->

                @endif



{{--
                <div class="dropdown">
                    <button onclick="showOption({{$item->id}})" class="dropbtn btn btn-sm btn-icon btn-light btn-active-light-primary me-2 border border-gray-500 " >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                            <span class="svg-icon svg-icon-5 m-0 "  >
                                <svg  class="dropbtn" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                </svg>
                            </span>

                        <!--end::Svg Icon-->
                    </button>
                        <div id="myDropdown{{$item->id}}" class="dropdown-content">
                        <!--begin::Menu-->
                            <div id="dropdown" class="menu  menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" >
                                <!--begin::Menu item-->



                                    @if ($linkProfile!='')
                                        <div class="menu-item px-3">
                                            <a  href="{{url($linkProfile.$item->id)}}" target="_blank" class="menu-link px-3">View</a>
                                        </div>
                                    @endif
                                    <div class="menu-item px-3">
                                        <a wire:click.prevent="edit({{$item->id}})" class="menu-link px-3">Edit</a>
                                    </div>


                                @if ($enableDeactivate)
                                    @if(!$showDeactivate)

                                        <div class="menu-item px-3">
                                            <a  onClick="confirm('Are you sure do you want to Deactivate?')
                                            || event.stopImmediatePropagation()" wire:click.prevent="deactivate({{$item->id}})" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Deactivate</a>
                                        </div>

                                    @else
                                        <div class="menu-item px-3">
                                            <a  onClick="confirm('Are you sure do you want to Reactivate?')
                                            || event.stopImmediatePropagation()" wire:click.prevent="activate({{$item->id}})" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Activate</a>
                                        </div>
                                    @endif


                                @else
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a  onClick="confirm('Are you sure do you want to delete?')
                                        || event.stopImmediatePropagation()" wire:click.prevent="delete({{$item->id}})" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->

                                @endif


                            </div>
                        <!--end::Menu-->
                        </div>
                </div> --}}


        </td>
    @endif
</tr>

@push('stack_scripts')
<script class="">
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
function showOption(id) {
    document.getElementById("myDropdown"+id).classList.toggle("show");
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
        var openDropdown = dropdowns[d];
        var element_id = openDropdown.id;

        //hide all dropdowns are not selected
        if(element_id!='myDropdown'+id)
        {
            openDropdown.classList.remove('show');
        }

    }

}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



</script>
@endpush
