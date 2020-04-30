@extends('layout.app', ["current" => "login" ])

@section('content')


<div class="class-border">
    <form method="post" action="/login"class="form-row">
{{csrf_field()}}
<div class="form-group col-md-3">
<label>Email</label>
<input name="email" type="text"class="form-control">
</div>
<label>Email</label>
<input name="senha" type="password"class="form-control">
<div class="form-group col-md-3">
<br>
<button class="btn btn-primary"type="submit">Buscar</button>
</div>
</form>
</div>

@endsection