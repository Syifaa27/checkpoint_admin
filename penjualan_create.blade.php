@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
           <h1> Tambah Data </h1>
           <hr>
           @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li><strong>{{ $error }}</strong>
            @endforeach
            </div>
            @endif

    <form action="{{ route('penjualan.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">id:</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
        <div class="form-group">
            <label for="kd_barang">kd_barang:</label>
            <select name="kd_barang" class="form-control">
            @foreach($data as $datas)
                <option value="{{ $datas->kd_barang }}">{{ $datas->kd_barang }} || {{ $datas->nama_barang }}</option>
            @endforeach
            </select>      
          </div>
        <div class="form-group">
            <label for="jumlah">jumlah:</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah">
        </div>
        <div class="form-group">
            <label for="total_harga">total_harga:</label>
            <input type="text" class="form-control" id="total_harga" name="total_harga">
        </div>
        
        <div class="form-group">
            <button type="submit"class="btn btn-md btn-primary">Submit</button>
            <button type="reset" class="btn btn-md btn-danger">Cancel</button>
        </div>
    </form>
</div>
</section>
@endsection
