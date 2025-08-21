{{-- Success and Error Messages when form fill --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show text-white" style="background-color: #237837;" role="alert">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show text-white" style="background-color: #ff0000;" role="alert">
    <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
</div>
@endif
{{-- Success and Error Messages when form fill --}}


{{-- script ka kaam dash script ki file mai ho raha hai jo component mai hai --}}



{{-- import ka same email wala error --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif