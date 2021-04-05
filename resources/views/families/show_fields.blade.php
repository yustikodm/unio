<!-- Parent User Field -->
<div class="form-group">
    {!! Form::label('parent_user', 'Parent User:') !!}
    <p><a href="{{ route('users.show', $family->parent->id) }}">{{ $family->parent->username }}</a></p>
</div>

<!-- Child User Field -->
<div class="form-group">
    {!! Form::label('child_user', 'Child User:') !!}
    <p><a href="{{ route('users.show', $family->child->id) }}">{{ $family->child->username }}</a></p>
</div>

<!-- Family as Field -->
<div class="form-group">
    {!! Form::label('family_as', 'Family as:') !!}
    <p>{{ $family->family_as }}</p>
</div>

<!-- Family verified Field -->
<div class="form-group">
    {!! Form::label('family_verified_at', 'Verified at:') !!}
    <p>{{ $family->family_verified_at }}</p>
</div>
<br />

