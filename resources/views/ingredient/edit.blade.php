@extends('layouts.app')
@section('title', 'Изменить ингридиент')

@section('content')
    <div class="container">
        <div class="card-body">
            <form action="{{ route('ingredient.update', $ingredient) }}" method="post">
                @csrf
                @method('put')

                <div class="form-row">
                    <label for="name">Введите название: </label>
                    <input type="text" id="name" name="name" value="{{ $ingredient->name }}">
                </div>

                <label>Введите остаток: </label>
                @foreach($organizations as $organization)
                    <div class="form-row">
                    <label for="amount{{ $organization->id }}">{{ $organization->name }}</label>
                    <input type="number" id="amount{{ $organization->id }}" name="amount{{ $organization->id }}"
                           value="{{ $amounts[$organization->id] }}">
                    </div>
                @endforeach

                <button class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
