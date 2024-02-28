<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Passport Image Upload</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .error{
      color: red;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Passport Image Upload</h1>
    <form action="{{route('imageExtract')}}" method="POST" enctype="multipart/form-data" class="border p-4">
      @csrf
      <div class="form-group">
        <label for="passport-image">Choose Passport Image</label>
        <input type="file" class="form-control-file" id="passport-image" name="passport-image" accept="image/*" >

        @error('passport-image')
        <span class="error">
          {{$message}}
        </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>

</body>

</html>