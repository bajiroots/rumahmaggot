<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::select('status', ['admin' => 'admin', 'supplier' => 'supplier', 'rumahmaggot' => 'rumahmaggot', 'restoran' => 'restoran', 'tps' => 'tps', 'umkm' => 'umkm'], null, ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('kecamatan_id', 'Kecamatan:') !!}
    <select name="kecamatan_id" class="form-control" id="kecamatan">
        @foreach ($kecamatan as $item)
            <option value="{{ $item->kecamatan_id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="kelurahan">Kelurahan:</label>
    <select name="kelurahan" id="kelurahan" class="form-control">
        <!-- Populate kelurahan options here -->
    </select>
</div>

@push('page_scripts')
    <script>
        var bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIyZmViZWU1MGI4ZDAyYjdiMmNhMDkzYjgzZDFlMDYwMDQ1ODU0NTIyZDkyMmQ4N2I2ODZiNDY5Nzc4MDM2YTQyYzk3NTVhNzM5MjFmOTVhIn0.eyJhdWQiOiIzIiwianRpIjoiYjJmZWJlZTUwYjhkMDJiN2IyY2EwOTNiODNkMWUwNjAwNDU4NTQ1MjJkOTIyZDg3YjY4NmI0Njk3NzgwMzZhNDJjOTc1NWE3MzkyMWY5NWEiLCJpYXQiOjE2OTcyMTM5NzksIm5iZiI6MTY5NzIxMzk3OSwiZXhwIjoxNzI4ODM2Mzc5LCJzdWIiOiI3NjciLCJzY29wZXMiOlsibW9ub2dyYWZpLWtlbHVyYWhhbiJdfQ.T7rAhEkPK_0o0PN5tMoy501l6B0o3Iu921b4I0Ruxy1Bsay8TLuoGUWGksd4CzXHMSgJYL42yAikZOMII8FS-jRqo_FJgr-A7Q0OAeN1psvibnUqTmKW0EKa86owkvPldHOtV6NPwKTyD9CBI3X5oWNqsXgp-bUK_ei_mU-cbQ6zYv1XHi00wZyHr8cZGrNsS_NovXYARTVn7CxbYXOW6ohqoSwDnmadgKJv13XojuzawAqvlEiKTzijeVjE6AUYqLuZb645CoW6dUK7OExUYWP53EYWQPGgNzVaicFBwEwA_e4YHJYT_T6VRj0wcY6yMgsYj6YEanllBl62QiIb5RDGuPNk2o9ZcPOOQtDJnvL6xFYtxYmxV5m_sG3jZlydtADLPBMmdG6sgSjv-x9WBN5l1M0V-uBcFVRmv6NYgMYcAgo4mroF4z0Z4LyhBSjmze-k3aiLfRlOch7W1UjhdQfjZh_XufImGilDJqhewzV-TPq3qYSpz8DX07KxyT65tNTTTypJaFXliNxjewCRUcP7SDA7k155BoDFgQvGWHH9KLpVrg-bVgUZ9tHYSAfV94XaKtdSrE_yfFO5nz2qfJ_4a5Fj-2RUMrHoA5BCrKBuKW5BY4HKGpO2Yy8_o-L3accJnZqlvRvYYu75WgDUpNozxwnEGTjmm0TZdhibK9o';
        $('#kecamatan').on('change', function() {
            var selectedKecamatan = $(this).val();
            var kelurahanSelect = $('#kelurahan');

            // Clear and reset the kelurahan select
            kelurahanSelect.empty();
            kelurahanSelect.append($('<option>', {
                value: '',
                text: 'Select Kelurahan',
            }));

            // Check if a kecamatan is selected
            if (selectedKecamatan) {
                // Make an AJAX request to fetch kelurahan data based on the selected kecamatan
                $.ajax({
                    url: 'http://api.samarindakota.go.id/api/v2/generate/data-monografi/monografi-kelurahan',
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'Authorization': 'Bearer ' + bearerToken,
                    },
                    data: {
                        kecamatan_id: selectedKecamatan,
                    },
                    success: function(data) {
                        $.each(data, function(index, kelurahan) {
                            kelurahanSelect.append($('<option>', {
                                value: kelurahan.id,
                                text: kelurahan.nama,
                            }));
                        });
                    },
                });
            }
        });
    </script>
@endpush