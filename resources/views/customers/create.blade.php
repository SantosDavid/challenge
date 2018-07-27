@extends('layouts.base')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Cadastro de clientes</h2>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{  $error }}
                        <br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('customers.store')  }}" method="POST" enctype="multipart/form-data">
                {{ @csrf_field() }}
                <div class="row">
                    <div class="col-4">
                        <label>Arquivo</label>
                        <input type="file" name="csv" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success float-right">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection