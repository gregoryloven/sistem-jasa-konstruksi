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
          <h1>Tipe-Tipe Rumah</h1>
        </div>

        @if($user_status != 2)
        <div class="alert alert-warning" role="alert">
            Akun anda belum terverifikasi, mohon verifikasi terlebih dahulu. 
            <a href="{{ route('contractor.show', auth()->user()->contractor->id) }}" class="alert-link">Klik di sini untuk verifikasi</a>.
        </div>

        @else

        <div class="section-body">
            <a href="#modalCreate" data-toggle='modal' class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</a><br><br>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Tipe Rumah 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Tipe Rumah</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th width="20%"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach($data as $d)
                                @php $i += 1; @endphp
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">@php echo $i; @endphp</td>
                                    <td style="text-align: center; vertical-align: middle;">{{$d->house_type->nama}}</td>
                                    <td style="text-align: center; vertical-align: middle;"><img src="{{asset('foto/'.$d->house_type->foto)}}" height='80px' onclick="showImageInModal2('{{ asset('foto/'.$d->house_type->foto) }}')"></td>
                                    <td style="text-align: center; vertical-align: middle;">{{ number_format($d->harga, 0, ',', '.') }}</td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <form id="delete-form-{{ $d->id }}" action="{{ route('house_type_detail.destroy', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#modalEdit" data-toggle="modal" class="btn btn-icon btn-warning" onclick="EditForm({{ $d->id }})"><i class="far fa-edit"></i></a>

                                            <input type="hidden" class="form-control" id='id' name='id' placeholder="Type your name" value="{{$d->id}}">
                                            <button type="button" class="btn btn-icon btn-danger" data-id="{{ $d->id }}"><i class="fa fa-trash"></i></button>                                   
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        
        @endif
    </section>
</div>

<!-- CREATE WITH MODAL -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <form role="form" method="POST" action="{{ url('house_type_detail') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tambah Tipe</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Tipe Rumah</label>
                        <select class="form-control" id='house_type_id' name='house_type_id'>
                            <option value="" disabled selected>Pilih</option>
                                @foreach($house_type as $h)
                                <option value="{{ $h->id }}" data-foto="{{ asset('foto/' . $h->foto) }}">{{ $h->nama }}</option>
                                @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>Harga (Rp.)</label>
                        <input type="text" class="form-control input-harga" id='harga' name='harga' min=0 required>
                    </div>
                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label style="display: block; margin-bottom: 0.5rem;">Foto</label>
                        <img id="output" width="200" height="200" style="display: none; max-width: 100%; height: auto; margin-top: 0.5rem;" onclick="showImageInModal()">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Image Display -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<!-- Modal for Image Display 2-->
<div class="modal fade" id="imageModal2" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel2"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage2" src="" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<!-- EDIT WITH MODAL-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
            <div style="text-align: center;">
                <!-- <img src="{{ asset('res/loading.gif') }}"> -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('house_type_id');
        var imgElement = document.getElementById('output');

        selectElement.addEventListener('change', function() {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var fotoUrl = selectedOption.getAttribute('data-foto');
            
            if (fotoUrl) {
                imgElement.src = fotoUrl;
                imgElement.style.display = 'block';
            } else {
                imgElement.src = '';
                imgElement.style.display = 'none';
            }
        });
    });
        
    function showImageInModal() {
        var imgElement = document.getElementById('output');
        var modalImage = document.getElementById('modalImage');
        
        if (imgElement.src) {
            modalImage.src = imgElement.src;
            $('#imageModal').modal('show');
        }
    }

    function showImageInModal2(imageUrl) {
        var modalImage2 = document.getElementById('modalImage2');
        modalImage2.src = imageUrl;
        $('#imageModal2').modal('show');
    }

    $(document).ready(function() {
        $(".input-harga").on("input", function() {
            let inputValue = $(this).val();

            inputValue = inputValue.replace(/[^0-9]/g, '');

            let formattedValue = formatNumber(inputValue);

            $(this).val(formattedValue);
        });

        function formatNumber(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }

        $('#house_type_id').change(function(){
        var selectedOption = $(this).find('option:selected');
        var fotoUrl = selectedOption.data('foto');
        
            if(fotoUrl) {
                $('#output').attr('src', fotoUrl).show();
            } else {
                $('#output').attr('src', '').hide(); // Hide image if no foto available
            }
        });

    });

    function EditForm(id)
    {
        $.ajax({
            type:'POST',
            url:'{{route("house_type_detail.EditForm")}}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id
                },
            success: function(data){
            $('#modalContent').html(data.msg)
            }
        });
    }

    $(document).on('click', '.btn-danger', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form-' + id).submit();
            }
        });
    });

</script>
@endsection