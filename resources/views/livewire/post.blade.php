<div class="d-flex flex-column align-items-center">
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if($updatePost)
            @include('livewire.edit')
        @else
            @include('livewire.create')
        @endif
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                {{-- @if(!$addPost)
                <button wire:click.prevent="addPost()" class="btn btn-primary btn-sm float-right">Novo Post</button>
                @endif --}}
                <div class="table-responsive mt-3">
                    <table class="table  table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Descrição</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($posts) > 0)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{$post->title}}
                                        </td>
                                        <td>
                                            {{$post->description}}
                                        </td>
                                        <td>
                                            <button wire:click.prevent="editPost({{$post->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button wire:click.prevent="deletePost({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                       <div class="alert alert-warning" role="alert">
                                            <strong>POST:</strong>0
                                       </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 
</div>