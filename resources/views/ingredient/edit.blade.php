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

                <div class="form-row">
                    <label for="amount">Введите остаток: </label>
                    <input type="number" id="amount" name="amount" value="{{ $ingredient->amount }}">
                </div>

                <button class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
