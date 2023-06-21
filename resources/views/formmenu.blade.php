@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset ('admin') }}\css\bootstrap.min.css">
</head>
<body>
     <div class="container mt-3 py-5">
          <div class="card ">
          <div class="card-header text-center">
               <h2>Daftar</h2>
          </div>
               <div class="card-body">
             <form action="{{$action}}" method="post" enctype="multipart/form-data">
             @csrf
                <div class="mb-3">
                     <label for="" class="form-label">Kategori</label>
                     <input type="text" name="kategori" class="form-control" id="kategori" value="{{ $menu -> kategori}}" >
                </div>
                <div class="mb-3">
                     <label for="" class="form-label">Varian Rasa</label>
                     <input type="text" name="varian_rasa" class="form-control" id="varian_rasa" value="{{ $menu -> varian_rasa}}" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Harga</label>
                    <input class="form-control" name="harga" id="harga" cols="30" rows="10"{{ $menu -> harga}}>
               </div>
                <div class="mb-3">
                     <label for="" class="form-label">Foto</label>
                         @if(file_exists("storage/".$menu->foto))
                         <img src="/storage/{{ $menu->foto }}" alt="" width="100" height="100"><br>
                         @endif
                     <input type="file" name="foto" id="foto">
                </div>
               <div>
                    <input type="submit" value="SIMPAN" name="simpan">
               </div>
          </form>
     </div>
     </div>
     </div>
    </body>
</html>
