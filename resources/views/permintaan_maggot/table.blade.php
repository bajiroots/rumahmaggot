<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
        <tr class="table-primary">
            <th>Jumlah Permintaan</th>
            <th>Harga/Gram</th>
            <th>Tanggal Permintaan</th>
            <th>Tanggal Akhir Permintaan</th>
            <th>Status Permintaan</th>
            <th>Nama Peminta</th>
            <th>Alamat Pengiriman</th>
            <th>Jenis Maggot</th>
            <th></th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permintaan_maggots as $permintaan_maggot)
            <tr>
            <td>{{ number_format($permintaan_maggot->jumlah_permintaan) }} gram</td>
            <td>Rp. {{ number_format($permintaan_maggot->harga) }}</td>
            <td>{{ $permintaan_maggot->tanggal_permintaan }}</td>
            <td>{{ $permintaan_maggot->tanggal_akhir_permintaan }}</td>
            <td>{{ $permintaan_maggot->status }}</td>
            <td>{{ $permintaan_maggot->User->name }}</td>
            <td>{{ $permintaan_maggot->lokasi_pengantaran }}</td>
            <td>{{ $permintaan_maggot->Produk->nama }}</td>
            <td></td>
                <td width="120">
                    {!! Form::open(['route' => ['permintaan_maggot.destroy', $permintaan_maggot->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if (auth()->user()->role === 'admin' or auth()->user()->role === 'rumahmaaggot')  
                            <a href="{{ route('detailPermintaanMaggots.create', ['id' => $permintaan_maggot->id]) }}" class='btn btn-default btn-xs'>
                                Kirim Maggot
                            </a>
                        @endif
                        @if (auth()->user()->role === 'admin' or auth()->user()->role === 'umkm')  
                        <a href="{{ route('permintaan_maggot.edit', [$permintaan_maggot->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        @endif
                        @if (auth()->user()->role === 'admin' or auth()->user()->role === 'umkm')  
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @foreach ($permintaan_maggot->detailPermintaanMaggots as $detail)
                <tr class="table-secondary">
                    <td>Pengiriman {{ $loop->iteration }}</td>
                    <td>Jumlah Pengiriman:</td>
                    <td>{{ $detail->jumlah_pengiriman }}</td>
                    <td>Status Pengiriman:</td>
                    <td>{{ $detail->status_pengiriman }}</td>
                    <td>Status Pembayaran:</td>
                    <td>{{ $detail->status_pembayaran }}</td>
                    <td>Nama Pengirim:</td>
                    <td>{{ $detail->user->name }}</td> 
                    <td></td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
