@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

@extends('admin')

@section('konten')

    <main>
        <div class="container mt-5">
            <h2 class="text-center pt-3">Daftar Menu</h2>
            <a href="menu/add"><button class="btn btn-primary" type="submit" name="submit" id="submit">Tambah Data</button></a>
            <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">KATEGORI</th>
                    <th scope="col">VARIAN RASA</th>
                    <th scope="col">HARGA</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                @foreach ($menus as $key => $item)
                <tbody>
                  <tr>
                    <th scope="row">{{ $key+1}}</th>
                    <td>{{ $item -> kategori}}</td>
                    <td>{{ $item -> varian_rasa}}</td>
                    <td>{{ $item -> harga }}</td>
                    <td><center>
                      <img src="\storage\{{ $item->foto }}" alt="" width="100" height="100"></center>
                    </td>
                    <td>
                      <a href="menu/edit/{{$item -> id}}"><button class="btn btn-success" name="submit" type="submit">EDIT</button></a>
                      <a href="menu/delete/{{$item -> id}}"><button class="btn btn-danger" name="submit" type="submit">HAPUS</button></a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </main>

@endsection
