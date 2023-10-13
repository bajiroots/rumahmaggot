@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permintaan Maggot</h1>
                </div>
                <div class="col-sm-6">
                    @if (auth()->user()->role === 'admin' or auth()->user()->role === 'umkm')   
                        <a class="btn btn-primary float-right"
                        href="{{ route('permintaan_maggot.create') }}">
                            Buat Permintaan Maggot
                        </a>    
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('permintaan_maggot.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection