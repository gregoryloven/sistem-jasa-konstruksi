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
                    <form method="GET" action="{{ route('contractor.index') }}" class="mb-3">
                        @csrf
                        <div class="form-group">
                            <label for="statusFilter"><strong>Filter Berdasarkan Status:</strong></label>
                            <select id="statusFilter" name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Failed</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Pending</option>
                                <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Approved</option>
                            </select>
                        </div>
                    </form>
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
                                    <td style="text-align: center; vertical-align: middle;">@php echo $i; @endphp</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->nama}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->perusahaan}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->alamat}}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->telepon}}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="#" class="show-image" data-image-url="{{ asset('foto/' . $d->tdp) }}">
                                            <img src="{{ asset('foto/' . $d->tdp) }}" height="50px" alt="Image"/>
                                        </a>
                                    </td>
                                    <td class="text-center" style="text-align: center; vertical-align: middle;">
                                        @if($d->status == 1)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($d->status == 2)
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($d->status == 0)
                                            <span class="badge badge-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        @if($d->status == 1)
                                            <div class="d-flex justify-content-center">
                                                <!-- Form untuk Approve -->
                                                <form action="/contractor/accept" method="post" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$d->id}}">
                                                    <button class="btn btn-success" type="submit">Approve</button>
                                                </form>

                                               <!-- Form untuk Decline -->
                                                <form id="decline-form-{{ $d->id }}" action="{{ url('contractor/decline/' . $d->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                </form>

                                                <button class="btn btn-danger decline-button" data-id="{{ $d->id }}">Decline</button>

                                            </div>
                                        @endif
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


@endsection

@section('javascript')
<script>

    



    $(document).on('click', '.decline-button', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, decline!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#decline-form-' + id).submit();
            }
        });
    });

    $(document).on('click', '.show-image', function(e) {
        e.preventDefault();
        
        var imageUrl = $(this).data('image-url');
        
        Swal.fire({
            title: '',
            imageUrl: imageUrl,
            imageWidth: 'auto',
            imageHeight: 'auto',
            imageAlt: 'Image',
            showCloseButton: false,
            showConfirmButton: false
        });
    });

</script>
@endsection