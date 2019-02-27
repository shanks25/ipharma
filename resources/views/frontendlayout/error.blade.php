  @if (count($errors) > 0)
<div style="background: #FBD8DB; padding: 20px">
<p style="color: red; font-size: 14px; padding: 0">ERROR!!!</p>
<ul>
@foreach ($errors->all() as $error)
<li style="color: #90111A; padding: 5px 0;">{{ $error }}<sup style="color: red">*</sup></li>
@endforeach
</ul>
</div>
@endif