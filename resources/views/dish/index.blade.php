@extends('layouts.app')
@section('title', 'Блюда')

@section('content')
    <div class="container">
        <div class="card-body">
            <div>
                <table class="table table-primary">
                    <th>Категория</th>
                    <th>Название</th>
                    <th>Состав</th>
                    <th>Стоимость</th>

                    @foreach($dishes as $dish)
                        <tr>
                            <td>{{ $dish->category->name }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->ingredientsStr }}</td>
                            <td>{{ $dish->price }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <a href="{{ route('dish.create') }}" class="btn btn-primary">Добавить новое блюдо</a>

                <a href="{{ route('ingredients') }}" class="btn btn-secondary">Список ингридиентов</a>
            </div>
        </div>
    </div>
@endsection
