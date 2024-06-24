@extends('layouts.master')

@section('contenido-principal')
<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection