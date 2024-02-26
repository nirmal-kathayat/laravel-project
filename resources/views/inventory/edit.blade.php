<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Inventory Item</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-group {
      width: 40%;
    }

    .error {
      color: red;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <h2>Edit Inventory Item</h2>
    <form action="{{route('inventory.update',['id'=>$editInventory->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Inventory Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$editInventory->name}}" placeholder="Enter inventory..">

        @error('name')
        <span class="error">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="price">Inventory Price:</label>
        <input type="number" class="form-control" id="price" value="{{$editInventory->price}}" name="price" step="0.01">
        @error('price')
        <span class="error">
          {{$message}}
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="description">Inventory Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter here description.."></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create Inventory</button>
    </form>
  </div>

</body>

</html>