<div wire:loading wire:target="selectedRow, selectPage" >
    <span class="spinner-border spinner-border-sm align-middle ms-2 text-primary "></span>
    Selecting...
</div>

    @if(count($selectedRow) && count($newRows)==0)

        <div class="mb-2 d-flex  align-items-center" >
            <div class="fw-bolder me-8">
                <span class="me-2" data-kt-docs-table-select="selected_count">{{count($selectedRow)}} </span>
                Selected
            </div>


            <div class="dropdown p-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Change / Remove Item
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#" onClick="confirm('Are you sure do you want to delete?') || event.stopImmediatePropagation()" wire:click="massDelete">Remove Item</a></li>
                <li><a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#kt_modal_12" >Modal</a></li>

                </ul>
            </div>

            <button wire:click="resetBulk" wire:loading.attr="disabled" type="button" class="btn btn-danger btn-sm" data-kt-docs-table-select="delete_selected">Unselect All</button>

        </div>

    @endif

    @if ($selectPage  && count($newRows)==0)
        <div class="col-md-10 mb-2">
            @if($selectAll)
                <div>
                    You have selected All <strong>{{$tableList->total()}}</strong> items.
                </div>

            @else
                <div>
                    You have selected <strong>{{count($selectedRow)}}</strong> items, Do you want to select All? <strong>{{$tableList->total()}}</strong>?
                    <a href="#" class="ml-2" wire:click="selectAllRecord">Select All</a>
                </div>
            @endif
        </div>
    @endif
