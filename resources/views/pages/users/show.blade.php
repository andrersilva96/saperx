<div>
    <h1>ID: {{ $user->id }}</h1>

    <form class="row">
        <div class="col-6 form-group mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Digite seu nome." wire:model="user.name">
        </div>
        <div class="col-6 form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu email."
                wire:model="user.email">
        </div>
        <div class="col-6 form-group mb-3">
            <label for="doc">CPF</label>
            <input type="text" class="form-control" id="doc" placeholder="Digite seu CPF."
                wire:model="user.doc">
        </div>
        <div class="col-6 form-group mb-3">
            <label for="birth_date">Data de Nascimento</label>
            <input type="date" class="form-control" id="birth_date" wire:model="user.birth_date">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

    <h2>
        Telefones:
    </h2>

    <div>
        <div class="d-flex mb-3">
            <input type="text" class="form-control me-3" wire:model="phone">
            <button class="btn btn-sm btn-primary" wire:click="add">+</button>
        </div>
        @foreach ($user->phones as $id => $phone)
            <div class="d-flex mb-3">
                <input type="text" class="form-control me-3" value="{{ $phone }}">
                <button class="btn btn-sm btn-danger" wire:click="delete({{ $id }})">X</button>
            </div>
        @endforeach
    </div>
</div>
