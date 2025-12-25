@forelse ($newRows as $key => $value )
    <tr class="">
        @if ($massSelection)
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">

            </div>

        </td>
        @endif

        @foreach ($rowFieldAddEdit as $k => $column )
            <td>


               @if ($editAddInputType[$column]=='textbox' || $editAddInputType[$column]=='' )
                                <input wire:model="newRows.{{$key}}.{{$column}}"
                                type="text"
                                class="mb-2 form-control form-control-sm mb-md-0"
                                placeholder="Enter {{$columnHeader[$k]}}"  />
                                @error('newRows.'.$key.'.'.$column)
                                    <span class="fv-plugins-message-container invalid-feedback">
                                        {{$errors->first('newRows.'.$key.'.'.$column)}}
                                    </span>
                                @enderror

                @elseif($editAddInputType[$column]=='date')
                    <div x-data="app()" x-init="initFlatpickr">
                        <input wire:model="newRows.{{$key}}.{{$column}}"
                        type="text"
                        class="mb-2 form-control form-control-sm mb-md-0"
                        placeholder="Enter {{$columnHeader[$k]}}" x-ref="pickery" />
                    </div>

                    @error('newRows.'.$key.'.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('newRows.'.$key.'.'.$column)}}
                        </span>
                    @enderror


                @elseif($editAddInputType[$column]=='select')
                    <div class="" x-data="appSelectJquery()" x-init="initSelect2Jquery('newRows.{{$key}}.{{$column}}', 'newRows-{{$key}}-{{$column}}')"></div>
                    @php
                        $field = $selectOption[$column]['displayField']
                        @endphp
                    <div wire:ignore >
                        <select wire:model.defer="newRows.{{$key}}.{{$column}}"
                            class="select2-alpine_newRows-{{$key}}-{{$column}} form-control form-control-sm select{{$key}}{{$column}}">
                            <option value="" class="">Please select</option>
                            @forelse ($selectOption[$column]['option'] as $i => $value )
                                <option value="{{$value['id']}}" class="">{{$value[$field]}}</option>
                            @empty
                                <option value="" class="">No options</option>
                            @endforelse

                        </select>

                    </div>
                    @error('newRows.'.$key.'.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('newRows.'.$key.'.'.$column)}}
                        </span>
                    @enderror
                @elseif ($editAddInputType[$column]=='disable')
                    <input disabled wire:model.defer="newRows.{{$key}}.{{$column}}"
                    type="text"
                    class="mb-2 form-control form-control-sm mb-md-0"/>

                    @error('newRows.'.$key.'.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('newRows.'.$key.'.'.$column)}}
                        </span>
                    @enderror
                @elseif($editAddInputType[$column]=='attachment')
                    <input wire:model="newRows.{{$key}}.{{$column}}"
                    type="file"
                    class="mb-2 form-control form-control-sm mb-md-0"/>

                    @error('newRows.'.$key.'.'.$column)
                        <span class="fv-plugins-message-container invalid-feedback">
                            {{$errors->first('newRows.'.$key.'.'.$column)}}
                        </span>
                    @enderror
                    <div wire:loading.delay >
                        Preparing...
                    </div>

                @else
                    {{$newRows[$key][$column]}}
                    @error('newRows.'.$key.'.'.$column)
                            <span class="fv-plugins-message-container invalid-feedback">
                                {{$errors->first('newRows.'.$key.'.'.$column)}}
                            </span>
                    @enderror
                @endif

            </td>

        @endforeach

        <td>
            <div class="col-md-2">
                <button class="btn text-white btn-danger btn-sm btn-icon" wire:click.prevent="remove({{$key}})"><i class="fa fa-trash"></i></button>
            </div>


        </td>
    </tr>

    <script>
        $(".date{{$key}}").flatpickr({
            dateFormat: 'Y-m-d'
        });
    </script>
@empty

@endforelse




