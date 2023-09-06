<div class="card">
    <div class="card-body">
        <p class="lead">
            Formulário de criação
        </p>
        <form>
            <div class="form-group mb-3">
                <label for="title">Título:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" wire:model="title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Descrição:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" placeholder="Enter Description"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="storePost()" class="btn btn-success btn-block">Salvar</button>
                <button wire:click.prevent="cancelPost()" class="btn btn-secondary btn-block">Cancelar</button>
            </div>
        </form>
    </div>
</div>