@extends('dashboard_layouts.dashboard')
@section('content')

<h2>Create Cars</h2>


<div class="container">
  <h2>Horizontal form</h2>
  <form class="form-horizontal" method="post" action="/admin/cars/" enctype="multipart/form-data">
  {{ csrf_field() }}

    <input type="hidden" id="custId" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="car_id" value="{{$car->id}}">
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
      <label class="control-label col-sm-2" for="make">Make:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="make" value="{{$car->make}}" placeholder="Enter car make" name="make" required >
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="model">Model:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="model" value="{{$car->model}}" placeholder="Enter car model" name="model" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="price" value="{{$car->price}}" placeholder="Enter car price" name="price" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="size">Engine Size:</label>
      <div class="col-sm-10">          
        <input type="number" step="any" class="form-control" id="size" value="{{$car->engine_size}}" placeholder="Enter car engine size" name="engine_size" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="image">Image:</label>
      <div class="col-sm-10">          
        <input type="file" class="form-control" id="image" name="image" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="active">Is active:</label>
      <div class="col-sm-10">          
      <select name="is_active">
          <option  value="1">Active</option>
          <option  value="0">Not Active</option>
      </select>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>


@endsection