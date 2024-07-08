<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/store" class="" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" name="example-text-input"
                placeholder="Nama Lengkap">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" name="example-text-input"
                placeholder="Email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" name="example-text-input"
                placeholder="password">
        </div>
        <div class="mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">


    </form>
    <div class="container">
        <table border="">
            <tr>
                <td>Nama</td>
                <td>Email</td>
            </tr>
            @foreach($data as $d)
            <tr>
              <td>{{$d->name}}</td>
              <td>{{$d->email}}</td>

            </tr>
            @endforeach
        </table>

   
    
</body>
</html>