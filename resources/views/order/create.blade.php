@extends('layouts.app')
@section('title', 'Новый заказ')

@section('head')
    <script src="{{ asset('js/newElement.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card-body">
            <form autocomplete="off"  action="{{ route('order.store') }}" method="post" id="form">
                @csrf

                <div class="form-row">
                    <select name="organization" id="organization">
                        <option disabled selected>Организация</option>

                        @foreach($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row mt-2">
                    <label for="client_name">Введите имя клиента</label>
                    <input type="text" id="client_name" name="client_name">
                </div>

                <div class="form-row mt-2">
                    <label for="client_phone">Введите телефон клиента</label>
                    <input type="text" id="client_phone" name="client_phone">
                </div>

                <div class="form-row mt-2">
                    <label for="client_address">Введите адрес клиента</label>
                    <input type="text" id="client_address" name="client_address">
                </div>

                <div class="form-row" id="selectDiv">
                    <label id="label" for="selectEl">Выберите блюдо 1: </label>
                    <select name="dish1" id="selectEl" required>
                        <option disabled selected>Выберите блюдо</option>

                        @foreach($dishes as $dish)
                            <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                        @endforeach

                        <input type="number" name="amount1" id="amount" placeholder="Введите кол-во порций" required>
                    </select>
                </div>

                <div class="form-row" id="addBtn">
                    <span  onclick="addNewIngredient('dish')" class="btn btn-secondary">Добавить новое блюдо</span>
                </div>

                <div class="form-row mt-2">
                    <label for="comment">Введите комментарий к заказу: </label>
                    <input type="text" name="comment" id="comment">
                </div>

                @if($errors->any())
                    {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                @endif

                <button class="btn btn-primary mt-2">Сохранить заказ</button>
            </form>
        </div>
    </div>
@endsection
