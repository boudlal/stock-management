@if(Session::has('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
