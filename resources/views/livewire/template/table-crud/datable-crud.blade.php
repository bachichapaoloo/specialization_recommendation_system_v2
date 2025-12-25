@section('styles')
    <style class="">
        /* Dropdown Button */
        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: rgb(49, 48, 48);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }


        button span {
            pointer-events: none;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: rgb(255, 255, 255)}

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {display:block;}
    </style>

@endsection
<div >


    <div wire:ignore class="" wire:model="testmodel" wire:key="{{ now() }}" x-data="appSelectJquery()" x-init="initSelect2Jquery('testmodel','22')" >
        <select class="form-control select2-alpine_22" >
            @forelse ($selectOption['item_id']['option'] as $i => $value )
                <option value="{{$value['id']}}" class="">{{$value['item_name']}}</option>
            @empty
                <option value="" class="">No options</option>
            @endforelse
        </select>

    </div>


    @if($newRows && $addRowType=='new-page')
        <button class="btn btn-secondary btn-sm mb-10" wire:click.prevent="cancelNewRows">Back</button>
        @include('livewire.template.table-crud.table.add-new-page')
    @else
        <div class="row">
            @include('livewire.template.table-crud.search.search')
        </div>

        @include('livewire.template.table-crud.selected.selected-action')

        @include('livewire.template.table-crud.message.message')

        <div wire:loading wire:target="massDelete,massChangeRows, deleteRow" class="blockui-message  ">
            <span class="spinner-border spinner-border-sm align-middle ms-2 text-primary "></span>
            processing...
        </div>

        @include('livewire.template.table-crud.table.table')

        @include('livewire.template.table-crud.modal.modal')

    @endif

</div>


@push('stack_scripts')

    <script class="">

        function appSelectJquery() {
            return {
                initSelect2Jquery(model_name,style_name) {
                    console.log('model name: ' +model_name);
                    console.log('style: select2-alpine_' + style_name);

                    $('.select2-alpine_'+style_name).select2();

                    $('.select2-alpine_'+style_name).on('change', function (e) {
                        @this.set(model_name, e.target.value);
                    });
                }
            }
        }


        function app() {
           return {
               initFlatpickr() {
                   const fp = flatpickr(this.$refs.pickery, {
                    //    locale: "at",
                    //    minDate: "1930-01",
                    //    maxDate: "today",
                       enableTime: false,
                    //    time_24hr: true,
                    //    minTime: "07:00",
                    //    maxTime: "20:00",
                       dateFormat: "Y-m-d",
                       disableMobile: "true",
                       static: false,
                       mode: "single", // multiple
                       disable: [
                            {
                                from: "2000-01-05",
                                to: "2023-04-21"
                            },
                       ],
                       weekNumbers: false,
                       noCalendar:false,

                   });
               }
           }
       }


        $('document').ready(function() {

            Livewire.on('alert_remove', ()=> {
                setTimeout(function(){
                    $('.alert-display').fadeOut('fast');
                }, 5000);
            });
        });

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


