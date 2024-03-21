@extends('layouts.guest')

@section('content')
    <h1>ID: {{ $user->id }}</h1>

    <form class="row">
        <div class="col-6 form-group mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Digite seu nome." value="{{ $user->name }}">
        </div>
        <div class="col-6 form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email."
                value="{{ $user->email }}">
        </div>
        <div class="col-6 form-group mb-3">
            <label for="doc">CPF</label>
            <input type="text" class="form-control" id="doc" placeholder="Digite seu CPF."
                value="{{ $user->doc }}">
        </div>
        <div class="col-6 form-group mb-3">
            <label for="birth_date">Data de Nascimento</label>
            <input type="date" class="form-control" id="birth_date" value="{{ $user->birth_date }}">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

    <h2>Telefones:</h2>

    <div>
        
    </div>
    <input type="text">
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
