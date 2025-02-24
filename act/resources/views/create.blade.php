@extends('bases')
@section('title', 'Create')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Car</h2>

    <div class="card shadow-sm p-4 w-80">
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Car Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter car name" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Car Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter car brand" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Manufacturing Year</label>
                <input type="number" class="form-control" id="year" name="year" placeholder="Enter year" required>
            </div>

            <button type="submit" class="btn btn-success ">Save Car</button>
        </form>
    </div>
</div>
@endsection
