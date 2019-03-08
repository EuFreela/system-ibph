@if (session('success'))
<div class="alert alert-success">
<i class="fa fa-thumbs-up"></i> {{ session('success') }}
</div>
@elseif (session('error'))
<div class="alert alert-danger">
<i class="fa fa-exclamation-circle"></i> {{ session('error') }}
</div>
@elseif (count($errors)>0)
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p><i class="fa fa-exclamation-circle"></i> {{ $error }}</p>
@endforeach
</div>
@endif