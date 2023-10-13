<div class="table-responsive">
    <table class="table" id="detailPermintaanMaggots-table">
        <thead>
        <tr>
            <th>Tanggal Pengiriman</th>
        <th>Jumlah Pengiriman</th>
        <th>Status Pengiriman</th>
        <th>Status Pembayaran</th>
        <th>User Id</th>
        <th>Permintaan Maggots Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detailPermintaanMaggots as $detailPermintaanMaggot)
            <tr>
                <td>{{ $detailPermintaanMaggot->tanggal_pengiriman }}</td>
            <td>{{ $detailPermintaanMaggot->jumlah_pengiriman }}</td>
            <td>{{ $detailPermintaanMaggot->status_pengiriman }}</td>
            <td>{{ $detailPermintaanMaggot->status_pembayaran }}</td>
            <td>{{ $detailPermintaanMaggot->user_id }}</td>
            <td>{{ $detailPermintaanMaggot->permintaan_maggots_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['detailPermintaanMaggots.destroy', $detailPermintaanMaggot->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detailPermintaanMaggots.show', [$detailPermintaanMaggot->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('detailPermintaanMaggots.edit', [$detailPermintaanMaggot->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
