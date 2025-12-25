
    @forelse ($newRows as $key => $value )
        <div class="card rounded border mb-5">
            <div class="card-header">
                <div class="card-title">Add Form {{$key+1}}</div>
            </div>
            <div class="card-body">
                <div class=" form-group row mb-10 ">
                    @foreach ($rowFieldAddEdit as $k => $column )
                        <div class="col-md-3 mb-5">
                            <label  class="text-body">{{$columnHeader[$k]}}</label>
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
                                @php
                                    $field = $selectOption[$column]['displayField']
                                @endphp
                                    <div wire:ignore>
                                        <select wire:model="newRows.{{$key}}.{{$column}}" name="" id="" class="form-control form-control-sm select{{$key}}{{$column}}">
                                            <option value="" class="">Please select</option>
                                            @forelse ($selectOption[$column]['option'] as $i => $value )
                                                <option value="{{$value['id']}}" class="">{{$value[$field]}}</option>
                                            @empty
                                                <option value="" class="">No options</option>
                                            @endforelse


                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('.select{{$key}}{{$column}}').select2();

                                                $('.select{{$key}}{{$column}}').on('change',function(e){
                                                    @this.set('newRows.{{$key}}.{{$column}}',e.target.value);
                                                });

                                            });
                                        </script>
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
                            @elseif ($editAddInputType[$column]=='attachment')
                                <input wire:model="newRows.{{$key}}.{{$column}}"
                                type="file"
                                class="mb-2 form-control form-control-sm mb-md-0"/>

                                @error('newRows.'.$key.'.'.$column)
                                    <span class="fv-plugins-message-container invalid-feedback">
                                        {{$errors->first('newRows.'.$key.'.'.$column)}}
                                    </span>
                                @enderror
                            @else
                                {{$newRows[$key][$column]}}
                                @error('newRows.'.$key.'.'.$column)
                                        <span class="fv-plugins-message-container invalid-feedback">
                                            {{$errors->first('newRows.'.$key.'.'.$column)}}
                                        </span>
                                @enderror
                            @endif

                        </div>

                    @endforeach

                        <div>
                            <div class="mb-10 d-flex justify-content-end ">
                                <button class="btn text-white btn-danger btn-sm btn-icon" wire:click.prevent="remove({{$key}})"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>

                </div>


            </div>
        </div>

        <script>
            $(".date{{$key}}").flatpickr({
                dateFormat: 'Y-m-d'
            });
        </script>
        @empty

    @endforelse
    <a wire:click.prevent="addRow" href="#" >
    <i class="la la-plus"></i>Add New Row
    </a>



    @if(count($newRows))

        <div class="mt-5 mb-5 align-content-right">
            <button wire:click.prevent="store()" class="btn btn-sm btn-primary " data-repeater-create="" type="button">
                <i class="la la-plus"></i>Save
            </button>

            <button class="btn text-white btn-danger btn-sm" wire:click.prevent="cancelNewRows">Cancel</button>
        </div>
    @endif
    <div wire:loading.delay >
        Preparing...
    </div>


