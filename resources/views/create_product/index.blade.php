@extends('dashboard_layouts.dashboard')
@section('content')

<h2>All Cars</h2>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Make</th>
        <th>Model</th>
        <th>Price</th>
        <th>Engine Size</th>
        <th>Is Active</th>
        <th>Edit car</th>
      </tr>
    </thead>
    <tbody>
    @if($cars)
       @foreach($cars as $car)
       <tr>
        <td><img width="120px" heigth="120px" src="{{ asset( 'images/' . $car->image ) }}" ></td>
        <td>{{$car->make}}</td>
        <td>{{$car->model}}</td>
        <td>{{$car->price}}</td>
        <td>{{$car->engine_size}}</td>
        <td>{{ $car->is_active ? 'Active' : 'Not Active' }}</td>
        <td>
          <a href="{{ route('admin.edit' , $car->id) }}" class="btn btn-primary">Edit Car</a>
        </form>
        </td>
      </tr>
       @endforeach
    @endif
    </tbody>
  </table>
</div>


@endsection