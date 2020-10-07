@extends('layouts.app')
@section('title', 'Отчет за текущий месяц')

@section('content')
<div class="container">
    <div class="card-header">
        <a href="{{ route('report') }}">Общий</a>
        <a href="{{ route('report', ['org' => 1]) }}">Организация 1</a>
        <a href="{{ route('report', ['org' => 2]) }}">Организация 2</a>
        <a href="{{ route('report', ['org' => 3]) }}">Организация 3</a>
    </div>
    <div class="card-body">
        <h1>{{ $orgStr }}</h1>
        <div class="col">
            <div>
                <h1>Выручка за текущий месяц: </h1>
                {{ $income }} руб.
            </div>

            <div>
                <h1>Ингридиенты: </h1>
                @if(!$ingredients)
                    Не потрачено
                @endif
                @foreach($ingredients as $name => $amount)
                    <div>
                        {{ $name }} - {{ $amount }}
                    </div>
                @endforeach
                <h4>Остаток: </h4>
                @foreach($allIngredients as $ingredient)
                    <div>
                        {{$ingredient->name}} - {{$ingredient->amount}} г
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
