<div class="card bg-grey">
    <div class="card-body">
        <h6 class="acc-name"><small>{{ Auth::user()->name }}</small></h6>
        <h6 class="text-secondary"><small><b>{{ Auth::user()->email }}</b></small></h6>
        <div class="address m-t-30">
            <a href="{!! route('address.index') !!}" class="text-secondary" style="text-decoration: underline;"><small>View Addresses ({{ count(Auth::user()->addresses) }})</small></a>
        </div>
    </div>
</div>
