@extends('layouts.admin.template_admin')s
@section('content')
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"> keranjang
            </div>
            <div class="card-body">
                <td>{{$keranjang->count()}}</td>
                
                <td><a href="/keranjang/detail" class="btn btn-primary">lihat</a></td>
            </div>
        </div>
    </div>
</div> --}}


<div class="card">
    <div class="card-header">
        keranjang
    </div>
    <div class="card-body">
            @foreach ($keranjang as $p)
        <div class="card">
            <div class="card-header">
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>nama :{{ $p->barang->nama_barang }}</p>
                            <p>spesifikasi :{{ $p->spesifikasi }}</p>
                            <p>jumlah :{{ $p->jumlah }}</p>
                            <p>harga satuan :{{ $p->harga_satuan }}</p>
                        </div>

                        <form action="/pengajuan/store" method="post">
                            @csrf
                            <input type="hidden" value="{{ $p->harga_satuan + $p->jumlah }}" name="total_biaya" />
                            <input type="hidden" value="{{ $p->id }}" name="barang_id" />
                            <input type="hidden" value="{{ $p->jumlah }}" name="jumlah_barang" />
                            <input type="hidden" value="{{ $p->harga_satuan }}" name="harga_satuan" />
                            <input type="hidden" value="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('d, M Y') }}" name="tanggal">

                            <input type="submit" class="btn btn-primary" value="ajukan" />
                        </form>
                    </div>
                </div>
        </div>
    @endforeach
    </div>
</div>







    
        <div class="card">
            <div class="card-header">
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                           <form action="/keranjang/store" method="post">
                                @csrf
                                <div>
                                    <select class="form-control" name="barang_id" id="barang_id">
                                        @foreach($barang as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" value="{{ $p->id }}" name="barang_id"/>
                                <input type="hidden" value="{{ $p->harga }}" name="harga_satuan"/>
                                <input type="number" class="form-control mt-5" name="jumlah" placeholder="jumlah"/>
                                <input type="submit" class="btn btn-primary mt-5" value="add">

                            </form>
                        </div>
                    </div>
                </div>
        </div>


        <div class="card">
            <div class="card-header">
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                           <form action="/simpan-pengajuan" method="post">
                                @csrf
                                <input type="submit" class="btn btn-primary mt-5" value="Simpan pengajuan">

                            </form>
                        </div>
                    </div>
                </div>
        </div>
  
{{-- 
    @foreach ($barang as $p)
        <div class="card">
            <div class="card-header">
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>{{ $p->nama_barang }}</p>
                            <p>{{ $p->spesifikasi }}</p>
                            <p>{{ $p->harga }}</p>
                            <form action="/keranjang/store" method="post">
                                @csrf
                                <input type="hidden" value="{{ $p->id }}" name="barang_id"/>
                                <input type="hidden" value="{{ $p->harga }}" name="harga_satuan"/>
                                <input type="number" class="form-control" name="jumlah" placeholder="jumlah"/>
                                <input type="submit" class="btn btn-primary mt-2" value="add">

                            </form>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach --}}
            <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
@endsection