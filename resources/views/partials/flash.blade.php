<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
<div>
    @if (session()->has('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
</div>
