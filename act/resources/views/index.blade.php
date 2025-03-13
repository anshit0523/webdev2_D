@extends('bases')

@section('title', 'Cars List')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Cars List</h2>

    <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Add New Car
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cars->isEmpty())
        <p class="alert alert-warning">No cars available.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ ucfirst($car->name) }}</td>
                        <td>{{ ucfirst($car->brand) }}</td>
                        <td>{{ $car->year }}</td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $car->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <!-- Delete Button -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $car->id }}">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $car->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $car->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Car Info</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cars.update', $car->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Car Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Brand</label>
                                            <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Year</label>
                                            <input type="number" name="year" class="form-control" value="{{ $car->year }}" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $car->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $car->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete <strong>{{ ucfirst($car->name) }}</strong>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Logout Button at the Bottom -->
    <div class="text-center mt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>
@endsection
