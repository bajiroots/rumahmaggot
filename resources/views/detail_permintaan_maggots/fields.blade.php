<!-- Tanggal Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pengiriman', 'Tanggal Pengiriman:') !!}
    {!! Form::text('tanggal_pengiriman', null, ['class' => 'form-control','id'=>'tanggal_pengiriman']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_pengiriman').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Jumlah Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_pengiriman', 'Jumlah Pengiriman:') !!}
    {!! Form::text('jumlah_pengiriman', null, ['class' => 'form-control','id'=>'jumlah_pengiriman']) !!}
</div>

<!-- Status Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_pengiriman', 'Status Pengiriman:') !!}
    {!! Form::select('status_pengiriman', ['dikirim' => 'dikirim', 'diterima' => 'diterima'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_pembayaran', 'Status Pembayaran:') !!}
    {!! Form::select('status_pembayaran', ['menunggu' => 'menunggu', 'diterima' => 'diterima'], null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', auth()->id(), ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<!-- Permintaan Maggots Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permintaan_maggots_id', 'Permintaan Maggots Id:') !!}
    {!! Form::number('permintaan_maggots_id', $permintaanMaggot->id , ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>