@extends('layouts.app')
@section('title', 'Клиенты')

@section('content')
    <div class="container">
        <div class="card-body">
            <table id="table" class="table table-primary">
                <th>Имя клиента</th>
                <th>Телефон клиента</th>
                <th>Адрес</th>

                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->address }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
