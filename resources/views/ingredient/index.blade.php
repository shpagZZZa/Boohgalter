@extends('layouts.app')
@section('title', 'Ингридиенты')

@section('content')
    <div class="container">
        <div class="card-body">
            <table class="table table-primary">
                <th>Название</th>
                <th>Остаток</th>
                <th>Действия</th>
                @foreach($ingredients as $ingredient)
                    <tr>
                            <td>
                                {{ $ingredient->name }}
                            </td>
                            <td>
                                {{$ingredient->amount}} г
                            </td>
                            <td>
                                <a href="{{ route('ingredient.edit', $ingredient) }}">Редактировать</a>
                            </td>
                    </tr>
                @endforeach
            </table>

            <div>
                <form autocomplete="off" class="form mt-5" action="{{ route('ingredient.store') }}" method="post">
                    @csrf

                    <div class="form-row">
                        <label for="name">Введите название нового ингридиента:</label>
                        <input type="text" id="name" name="name">
                    </div>

                    <div class="form-row">
                        <label for="amount">Кол-во:</label>
                        <input type="number" id="amount" name="amount">
                    </div>

                    <button class="btn btn-primary">Добавить ингридиент</button>
                </form>
            </div>
        </div>
    </div>
@endsection
