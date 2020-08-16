@extends('layouts.app')
@section('title', 'Заказы')

@section('head')
    <script src="{{ asset('js/sortTable.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card-body">
            <table id="table" class="table table-primary">
                <th>Организация</th>
                <th>Имя клиента</th>
                <th>Телефон клиента</th>
                <th>Адрес</th>
                <th>Блюда</th>
                <th>Стоимость</th>
                <th>Комментарий к заказу</th>
                <th>Время заказа</th>

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->organization->name }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->dishesStr }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->comment }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="text-right">
                Сортировать по:
                <a href="#" onclick="sortTable(0)">Организации</a>
                <a href="#" onclick="sortTable(5)">Стоимости</a>
                <a href="{{ route('orders', ['sortBy' => 'date']) }}">Времени</a>
            </div>
        </div>
    </div>
@endsection
