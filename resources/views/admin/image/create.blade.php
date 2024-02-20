@extends('layouts')
@section('title', 'Tambah Foto')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Posisi</label>
                    <select name="post" id="">
                        @foreach ($galleries as $item)
                            <option value="{{$item->id}}" name="post">{{$item->position}}</option>
                        @endforeach
                     </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Judul</label>
                    <input class="form-control" type="text" id="formFile" name="judul">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Tambahkan Foto</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
@endsection
