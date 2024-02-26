<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS */
    body {
      font-family: Arial, sans-serif;
    }

    .action-btn a,
    .action-btn button {
      margin-right: 5px;
    }

    .delete-btn {
      background-color: #dc3545;
      color: #fff;
      border: none;
    }

    .delete-btn:hover {
      background-color: #c82333;
    }
    .btn-primary{
      margin-left: 59.5rem;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="mt-4 mb-4">Inventory Lists</h1>
    <a href="{{route('inventory.create')}}" class="btn btn-primary mb-4">Add new inventory</a>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Inventory Name</th>
          <th scope="col">Inventory Price</th>
          <th scope="col">Inventory Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($inventories as $inventory)
        <tr>
          <td>{{$inventory->id}}</td>
          <td>{{$inventory->name}}</td>
          <td>{{$inventory->price}}</td>
          <td>{{$inventory->description}}</td>
          <td>
            <div class="action-btn">
              <a href="{{route('inventory.edit',['id'=>$inventory->id])}}" class="btn btn-sm btn-success">Edit</a>
              <form action="{{route('inventory.delete',['id'=>$inventory->id])}}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm delete-btn">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
