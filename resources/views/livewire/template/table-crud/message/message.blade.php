<div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-display">
            {{session('message')}}
        </div>
    @endif

</div>
