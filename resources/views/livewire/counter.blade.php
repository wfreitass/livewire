{{-- @extends('layouts.app')
@section('content') --}}

    <div >
        <h1>{{ $count }}</h1>
    
        <button wire:click="increment" class="btn btn-primary ">+</button>
    
        <button wire:click="decrement" class="btn btn-danger">-</button>
    </div>
{{-- @endsection --}}

