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
          <h1>Daftar Kontraktor</h1>
        </div>

        <div class="section-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Daftar Kontraktor 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Telepon</th>
                                    <th>Tanda Daftar Perusahaan</th>
                                    <th>Status</th>
                                    <th width="20%"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach($data as $d)
                                @php $i += 1; @endphp
                                <tr>
                                    <td>@php echo $i; @endphp</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->perusahaan}}</td>
                                    <td>{{$d->alamat}}</td>
                                    <td>{{$d->telepon}}</td>
                                    <td><img src="{{asset('foto/'.$d->tdp)}}" height='80px'/></td>
                                    <td class="text-center">
                                        @if($d->status == 1)
                                            <div class="alert alert-warning text-center" role="alert">
                                                Pending
                                            </div>
                                        @elseif($d->status == 2)
                                            <div class="alert alert-success text-center" role="alert">
                                                Approved
                                            </div>
                                        @elseif($d->status == 0)
                                            <div class="alert alert-danger text-center" role="alert">
                                                Failed
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        
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

@section('javascript')
<script>


</script>
@endsection