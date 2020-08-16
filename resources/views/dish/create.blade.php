@extends('layouts.app')
@section('title', 'Добавить блюдо')

@section('head')
    <script src="{{ asset('js/newElement.js') }}"></script>
@endsection

@section('content')


    <div class="container">
        <div class="card-body">
            <form autocomplete="off"  action="{{ route('dish.store') }}" method="post" id="form">
                @csrf

                <div class="form-row">
                    <label for="category">Выберите категорию блюда: </label>
                    <select name="category" id="category">
                        <option disabled selected>категория</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row mt-2">
                    <label for="name">Выберите название блюда: </label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="form-row mt-2">
                    <label for="price">Введите стоимость блюда: </label>
                    <input type="text" id="price" name="price">
                </div>

                <div class="form-row" id="selectDiv">
                    <label id="label" for="selectEl">Выберите ингридиент 1: </label>
                    <select name="ingredient1" id="selectEl" required>
                        <option disabled selected>Выберите ингридиент</option>

                        @foreach($ingredients as $ingredient)
                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                        @endforeach

                        <input type="number" name="amount1" id="amount" placeholder="Введите кол-во ингридиента (г)" required>
                    </select>
                </div>

                <div class="form-row" id="addBtn">
                    <span  onclick="addNewIngredient('ingredient')" class="btn btn-secondary">Добавить новый ингридиент</span>
                </div>

                @if($errors->any())
                    {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                @endif

                <button class="btn btn-primary mt-2">Сохранить блюдо</button>
            </form>
        </div>
    </div>
@endsection
