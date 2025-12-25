@php
    if($table_type=='table-dashed')
    {
        $table_class = 'table table-row-dashed table-row-gray-500 align-middle gs-0 gy-4';
        $table_thead = '';
        $table_thead_row = 'text-start text-gray-500 fw-bolder fs-7 text-uppercase gs-0';
    }

    if($table_type=='table-rounded')
    {
        $table_class ='table table-rounded table-striped border border-gray-500 gy-5 gs-7 ';
        $table_thead = '';
        $table_thead_row = 'text-start text-gray-500 fw-bolder fs-7 text-uppercase gs-0';
    }

    if($table_type=='table-blue')
    {
        $table_class ='table table-rounded table-striped border border-gray-500 gy-5 gs-7 ';
        $table_thead = 'bg-primary';
        $table_thead_row = 'text-start text-gray-100 fw-bolder fs-7 text-uppercase gs-0';
    }

    if($table_type =='table-gray')
    {

        $table_class ='table table-rounded table-striped border border-gray-300 gy-5 gs-7 ';
        $table_thead = 'fw-bolder fs-6 text-gray-800 border border-gray-200 border-bottom';
        $table_thead_row = 'text-start text-gray-800 fw-bolder fs-7 text-uppercase gs-0';
    }
@endphp


<table class="{{$table_class}}">
    <thead class="{{$table_thead}}">
        <tr class="{{$table_thead_row}}">
            @if ($massSelection)
            <th class="w-50px">
                @if(!$newRows)
                    <div class="form-check form-check-sm form-check-custom form-check-primary">
                        <input wire:model.live="selectPage" wire:loading.attr="disabled"  class="form-check-input" type="checkbox"  id="flexCheckDefault"/>
                    </div>
                @endif
            </th>
            @endif

            @foreach ($columnHeader as $key => $columnTitle)
                @if ($columnHeaderShow[$columnTitle])
                    <th class="{{$columnWidth[$columnTitle]['width'] ?? ''}}"><span class="min-w-100px ">{{$columnTitle}}</span></th>
                @endif

            @endforeach
            @if ($actionButton)
                <th class="w-100px"><span class="fs-7 fw-bold">Action</span></th>
            @endif

        </tr>
    </thead>
    <tbody class="fw-bold fs-6 text-gray-800 border border-gray-200">
        @if($newRows && $addRowType=='inline')

            <button wire:click.prevent="cancelNewRows"  class="btn btn-secondary fs-8 mb-5">< Back</button>
            @include('livewire.template.table-crud.table.add-row')

        @else
            @forelse ($tableList as $key => $item )
                @if ($editedRowIndex===$item->id)
                    @include('livewire.template.table-crud.table.edit-row')
                @else
                    @include('livewire.template.table-crud.table.row')
                @endif

            @empty
                <tr ><td colspan="{{count($columnHeader)+1}}"><center class="">No Records</center></td></tr>
            @endforelse

        @endif


    </tbody>
</table>


<div wire:loading wire:target="addRow" class="blockui-message  ">
    <span class="spinner-border spinner-border-sm align-middle ms-2 text-primary "></span>
    Loading...
</div>
@if ($addButtonLabel)
<a wire:click.prevent="addRow" class="mt-5 " href="#" >
    <i class="la la-plus"></i>Add New Row
</a>
@endif


@if(count($newRows))

    <div class="mt-5 mb-5 align-content-right">
        <button wire:click.prevent="store()" class="btn btn-sm btn-primary " data-repeater-create="" type="button">
            <i class="la la-plus"></i>Save
            <span class="indicator-progress" wire:loading wire:target='store'>
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>

        <button class="btn text-white btn-danger btn-sm" wire:click.prevent="cancelNewRows">
            Cancel
            <div wire:loading wire:target="cancelNewRows" class="blockui-message ">
                <span class="spinner-border spinner-border-sm align-middle ms-2 text-primary "></span>
                ...
            </div>
        </button>
    </div>
@else
<div  class="row mt-5">
    <div class="col-7 d-flex align-items-left" >
        {{-- {!! $itemList->onEachSide(3)->links('vendor.livewire.bootstrap')  !!} --}}
        {!! $tableList->links()  !!}

    </div>
    <div class="col-5 custom-number-paginate d-flex justify-content-end ">
        <select wire:model.live="perPage" class="form-select form-select-sm form-select-solid" style="width: 65px;">
            <option value="5" >5</option>
            <option value="10" >10</option>
            <option value="20" >20</option>
            <option value="30" >30</option>
            <option value="50" >50</option>
            <option value="100" >100</option>
        </select>
        <span class="p-3 text-muted">
            Displaying {{ $tableList->firstItem()}} - {{ $tableList->lastItem() }} of {{ $tableList->total() }} records
        </span>
    </div>
</div>

@endif


