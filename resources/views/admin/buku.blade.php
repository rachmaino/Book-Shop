@extends('layouts.global')
@section("title") Home @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                    Tambah Buku
                    </button>
                </div>

                <div class="card-body">
                   List Buku

                   <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buku as $kat)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $kat->name }}</td>
                            <td>{{ $kat->description }}</td>
                            <td>
                                <a class="btn btn-primary" onclick="edit('{{$kat}}')">Edit</a>
                                <a class="btn btn-danger" href="{{ route('deletebuku',$kat->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>




<!-- Create Category -->

<!-- Modal -->
<form method="post" action="{{ route('tambahbuku') }}"> 

@csrf

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
            <div class="form-group">
                <label>Nama Buku</label>
                <input name="title" type="text" class="form-control" placeholder="Nama Buku" required>
            </div>
            <div class="form-group">
                <label>Nama Penulis</label>
                <input name="author" type="text" class="form-control" placeholder="Nama Penulis" required>
            </div>
            <div class="form-group">
                <label>Nama Penerbit</label>
                <input name="publisher" type="text" class="form-control" placeholder="Nama Penerbit" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input name="stock" type="text" class="form-control" placeholder="Stock" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <input name="status" type="text" class="form-control" placeholder="Status" required>
            </div>
            <div class="form-group">
                <label>deskripsi</label>
                <input name="description" type="text" class="form-control" placeholder="Deskripsi Buku" required>
            </div>
            <div class="form-group">
                <select name="id" class="form-control">
                    <option value=""> Tidak Ada </option>
                </select>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

</form>




<!-- Create Category -->

<!-- Modal -->
<form id="formedit" method="post"> 

@csrf

<div class="modal fade" id="editbuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
            <div class="form-group">
                <label>Nama Buku</label>
                <input id="editnama" name="nama" type="text" class="form-control" placeholder="Nama Buku" required>
            </div>
            <div class="form-group">
                <label>deskripsi</label>
                <input id="editdeskripsi" name="deskripsi" type="text" class="form-control" placeholder="Deskripsi Buku" required>
            </div>
            <div class="form-group">
                <select name="parentid" class="form-control">
                    <option value=""> Tidak Ada </option>
                </select>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

</form>
    @section("javascript")

        <script>
            function edit(data){
                var d = JSON.parse(data);
                $('#formedit').attr("action",  "{{ url('editbuku') }}/"+d.id);
                $("#editbuku").modal('show');
                $("#editnama").val(d.name);
                $("#editdeskripsi").val(d.description);
            }
        </script>
        
    @endsection
@endsection
