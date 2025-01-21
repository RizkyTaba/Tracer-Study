@extends('layouts.admin-home')

@section('content')
<div class="container">
    <h1>Edit Status Alumni</h1>
    <form action="{{ route('status_alumni.update', $statusAlumni->id_status_alumni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $statusAlumni->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
