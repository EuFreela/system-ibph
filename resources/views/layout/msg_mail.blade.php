@if (session('success_mail'))
<div class="alert alert-success">
<i class="fa fa-thumbs-up"></i> {{ session('success_mail') }}
</div>
@elseif (session('error_mail'))
<div class="alert alert-danger">
<i class="fa fa-exclamation-circle"></i> {{ session('error_mail') }}
</div>
@endif