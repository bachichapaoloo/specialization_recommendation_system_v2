<div class="modal fade @if($showModal === true) show @endif"
        style="display: @if($showModal === true)
            block
        @else
            none
        @endif;"
        tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>

                    <div class="modal-footer">
                        <button wire:click.prevent="closeDialog()" type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>

</div>

        <div class="modal-backdrop fade show"
            id="backdrop"
            style="display: @if($showModal === true)
                    block
            @else
                    none
            @endif;">
        </div>
