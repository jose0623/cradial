@extends('layouts.app')

@section('template_title')
    Crear Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Nuevo Usuario</span>
                        <div class="float-right">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btnbr btn-sm float-right" data-placement="left">
                                {{ __('Volver atras') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('users.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 