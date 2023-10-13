<div class="table-responsive">
    <table class="table" id="produkMaggots-table">
        <thead>
        <tr>
            <th>Nama</th>
        <th>Harga</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($produkMaggots as $produkMaggot)
            <tr>
                <td>{{ $produkMaggot->nama }}</td>
            <td>{{ $produkMaggot->harga }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['produkMaggots.destroy', $produkMaggot->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('produkMaggots.show', [$produkMaggot->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('produkMaggots.edit', [$produkMaggot->id]) }}"
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
