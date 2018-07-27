@extends('layouts.base')

@section('content')

    <div class="card">
        <div class="card-header">
            <di class="row">
                <div class="col-8">
                    <h2>Listagem de clientes</h2>
                </div>
                <div class="col-4">
                    <a href="{{ route('customers.create') }}">
                        <button class="btn btn-default float-right">
                            Novo
                        </button>
                    </a>
                </div>
            </di>
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

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Aniversário</th>
                            <th class="text-center">Endereço</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->birthday->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#address{{$customer->id}}">
                                       <strong>i</strong>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="address{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Endereço</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Logradouro</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->address }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Número</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->number }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>CEP</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->zipcode }}">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Bairro</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->neighborhood }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Complemento</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->complement }}">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Latitude</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->latitude }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Longitude</label>
                                                    <input type="text" disabled class="form-control" value="{{ $customer->address[0]->longitude }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
    
        </div>
    </div>

@endsection