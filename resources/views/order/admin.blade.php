@extends('layouts_admin.admin')

@push('css')
<style>
    #myTable td {text-align: center; vertical-align: middle;}
</style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Daftar Pesanan</h1>
        </div>

        <div class="section-body">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Daftar Pesanan 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Nama Pemesan</th>
                                    <th>Telepon</th>
                                    <th>Pekerjaan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach($order as $d)
                                @php $i += 1; @endphp
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">@php echo $i; @endphp</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->nama}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->telepon}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->pekerjaan}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <strong>Tipe Rumah:</strong> {{$d->house_type->nama}}<br>
                                        <strong>Kontraktor:</strong> {{$d->contractor->nama}}<br>
                                        <strong>Perusahaan:</strong> {{$d->contractor->perusahaan}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </section>
</div>

@endsection
