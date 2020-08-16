@extends('layouts.app')
@section('title', 'Список администраторов')

@section('content')
    <div class="container">
        <div class="card-body">
            <div class="col">
                <div class="mb-4">
                    <table class="table table-primary table-bordered">
                        <th>Имя</th>
                        <th>Дата регистрации</th>

                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="mt-5">
                    <h1>Создание кода для регистрации нового администратора</h1>

                    <form action="{{ route('admin.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="code">Введите код для регистрации</label>
                            <input type="text" id="code" name="code" class="form-control">
                        </div>

                        <button class="btn btn-primary">Создать код</button>
                    </form>
                </div>

                <div class="mt-5">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-info">Выйти из аккаунта</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
