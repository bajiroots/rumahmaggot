<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_permintaan', 'Jumlah Permintaan (gram):') !!}
    {!! Form::text('jumlah_permintaan', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga per gram:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'id'=>'harga','readonly'=>'readonly']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_permintaan', 'Tanggal Permintaan:') !!}
    {!! Form::text('tanggal_permintaan', null, ['class' => 'form-control','id'=>'tanggal_permintaan']) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_akhir_permintaan', 'Tanggal Akhir Permintaan:') !!}
    {!! Form::text('tanggal_akhir_permintaan', null, ['class' => 'form-control','id'=>'tanggal_akhir_permintaan']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_akhir_permintaan').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })

        $('#tanggal_permintaan').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['aktif' => 'aktif', 'tutup' => 'tutup'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('produk_id', 'Jenis Produk Maggot:') !!}
    {!! Form::select('produk_id', $produk_maggots->pluck('nama', 'id'), null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var jenisMaggotDropdown = $('#produk_id');
        var hargaInput = $('#harga');

        jenisMaggotDropdown.on('change', function() {
            var selectedJenisMaggot = jenisMaggotDropdown.val();

            $.ajax({
                type: 'POST',
                url: '{{ route('get-harga') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    jenis_maggot: selectedJenisMaggot
                },
                success: function(data) {
                    hargaInput.val(data.harga);
                },
                error: function() {
                    console.log(0);
                }
            });
        });
    });
</script>

@endpush

<div class="form-group col-sm-6">
    {!! Form::label('lokasi_pengantaran', 'Alamat Pengantaran:') !!}
    {!! Form::text('lokasi_pengantaran', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
    
{!! Form::hidden('user_id', auth()->id(), ['class' => 'form-control']) !!}