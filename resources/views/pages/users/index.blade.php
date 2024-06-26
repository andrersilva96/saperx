@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Agenda Telefônica</h1>
        <a class="btn btn-sm btn-primary" href="{{ route('users.save') }}" style="height: fit-content">Adicionar contato</a>
    </div>

    <table x-data="showComponent()" class="table table-striped">
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
                    <td>{{ \Carbon\Carbon::parse($user->birth_date)->format('Y/m/d') }}</td>
                    <td>
                        {{ $user->phones->first() }}
                        @if ($user->phones->count() > 1)
                            <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="{{ $user->phones->implode(', ') }}">
                                @include('icons.eye')
                            </button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.save', $user->id) }}" class="btn btn-sm btn-success">Ver</a>
                        <button class="btn btn-sm btn-danger ms-3" @click="await remove({{ $user->id }})">
                            Excluir
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        function showComponent() {
            return {
                async remove(id) {
                    const action = route('api.users.destroy', id)
                    const response = await fetch(action, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    });
                    if (response.status === 200) {
                        location.reload()
                    }
                }
            }
        }
    </script>
@endpush
