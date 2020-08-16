@extends('layouts.app')
@section('title', 'Отчет за текущий месяц')

@section('content')
<div class="container">
    <div class="card-body">
        <div class="col">
            <div>
                <h1>Выручка за текущий месяц: </h1>
                {{ $income }} руб.
            </div>

            <div>
                <h1>Ингридиенты: </h1>
                @foreach($ingredients as $name => $amount)
                    <div>
                        {{ $name }} - {{ $amount }} г
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
