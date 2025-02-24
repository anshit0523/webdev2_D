@extends('bases')
@section('title', 'Cars List')
@section('content')
<div class="container mt-4">

    <h2>Cars List</h2>
    <a href="{{ route('cars.create') }}" class="btn btn-success">Add New Car</a>

    @if($cars->isEmpty())
        <p class="alert alert-warning">No cars available.</p>
    @else
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Year</th>
                   <!-- <th>Actions</th>   -->
               
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->year }}</td>
                    <!--<td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>... -->
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection

