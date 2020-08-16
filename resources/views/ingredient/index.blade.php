@extends('layouts.app')
@section('title', 'Ингридиенты')

@section('content')
    <div class="container">
        <div class="card-body">
            <div>
                @foreach($ingredients as $ingredient)
                    <div class="justify-content-between mb-2">
                        <div>
                            {{ $ingredient->name }}
                        </div>

                        <div>
                            <a href="{{ route('ingredient.edit', $ingredient) }}">Изменить название</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <form autocomplete="off" class="form mt-5" action="{{ route('ingredient.store') }}" method="post">
                    @csrf

                    <div class="form-row">
                        <label for="name">Введите название нового ингридиента:</label>
                        <input type="text" id="name" name="name">
                    </div>

                    <button class="btn btn-primary">Добавить ингридиент</button>
                </form>
            </div>
        </div>
    </div>
@endsection
