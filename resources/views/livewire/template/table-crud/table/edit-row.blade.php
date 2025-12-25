<form wire:submit.prevent='update'>
    @csrf
    <input wire:model="model.id" type="hidden">
    <tr class="@if($this->isSelected($item->id)) table-primary @endif ">
        @if ($massSelection)
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                {{-- <input wire:model.live="selectedRow" wire:loading.attr="disabled" class="form-check-input" type="checkbox" value="{{$item->id}}" id="flexCheckDefault"/> --}}
            </div>

        </td>
        @endif

        @foreach ($rowFieldAddEdit as $k => $column )
            <td>

                @if ($editAddInputType[$column]=='textbox' || $editAddInputType[$column]=='')
                    <input wire:model="model.{{$column}}"
                    type="text"
                    class="mb-2 form-control form-control-sm mb-md-0 "
                    placeholder="Enter {{$columnHeader[$k]}}"  />

                    @error('model.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('model.'.$column)}}
                        </span>
                    @enderror

                @elseif($editAddInputType[$column]=='date')
                    <div x-data="app()" x-init="initFlatpickr">
                        <input wire:model="model.{{$column}}"
                        type="text"
                        class="mb-2 form-control form-control-sm mb-md-0"
                        placeholder="Enter {{$columnHeader[$k]}}" x-ref="pickery" />
                    </div>
                    @error('model.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('model.'.$column)}}
                        </span>
                    @enderror

                @elseif($editAddInputType[$column]=='select')
                    @php
                        $field = $selectOption[$column]['displayField']
                    @endphp
                    <div x-data="appSelectJquery()"
                            x-init="initSelect2Jquery('model.{{$column}}','model-{{ $column }}')">

                        <select wire:model="model.{{$column}}" class="select2-alpine_model-{{$column}}  form-control form-control-sm select{{$column}} select2-alpine{{ $column }}">
                            <option value="" class="">Please select</option>
                            @forelse ($selectOption[$column]['option'] as $i => $value )
                                <option value="{{$value['id']}}" class="" @selected($value['id']== $model[$column])>{{$value[$field]}}</option>
                            @empty
                                <option value="" class="">No options</option>
                            @endforelse
                        </select>

                    </div>
                        @error('model.'.$column)
                            <span class="fv-plugins-message-container invalid-feedback">
                                {{$errors->first('model.'.$column)}}
                            </span>
                        @enderror
                @elseif ($editAddInputType[$column]=='disable')
                    <input disabled wire:model.defer="model.{{$column}}"
                    type="text"
                    class="mb-2 form-control form-control-sm mb-md-0  " />

                    @error('model.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('model.'.$column)}}
                        </span>
                    @enderror
                @elseif ($editAddInputType[$column]=='attachment')
                    <input wire:model="model.{{$column}}"
                    type="file"
                    class="mb-2 form-control form-control-sm mb-md-0  " />

                    @error('model.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('model.'.$column)}}
                        </span>
                    @enderror
                @else
                    {{$model[$column]}}
                    @error('model.'.$column)
                            <span class="fv-plugins-message-container invalid-feedback">
                                {{$errors->first('model.'.$column)}}
                            </span>
                    @enderror
                @endif

            </td>

        @endforeach

        <td>
            <a wire:click.prevent="update({{$item->id}})"  class="btn btn-sm btn-success btn-icon ">
                <i class="la la-check"></i>
            </a>
            <a wire:click.prevent="cancel({{$item->id}})"  class="btn btn-sm btn-light-danger btn-icon ">
                <i class="far fa-window-close"></i>
            </a>
        </td>
    </tr>

</form>
