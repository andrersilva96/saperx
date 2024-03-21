@extends('layouts.guest')

@section('content')
    <h1>Agenda Telefônica</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefones</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->doc }}</td>
                    <td>{{ $user->birth_date }}</td>
                    <td>
                        {{ $user->phones->first() }}
                        @if ($user->phones->count() != 1)
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="{{ $user->phones->implode(', ') }}">
                                @include('icons.eye')
                            </button>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success">Ver</a>
                        <a href="#" class="btn btn-sm btn-danger ms-3">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        // alert(123)
    </script>
@endpush
