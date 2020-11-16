@extends('layouts.app')
@section('title', 'Ингридиенты')

@section('content')
    <div class="container">
        <div class="card-body">
            <table class="table table-primary">
{{--                <th>Организация</th>--}}
                <tr>
                    <th rowspan="2">Название</th>
                    <th colspan="3">Остаток</th>
                    <th rowspan="2">Действия</th>
                </tr>

                <tr>
                    @foreach($organizations as $organization)
                        <th>{{ $organization->name }}</th>
                    @endforeach
                </tr>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>
                            {{ $ingredient->name }}
                        </td>

                        @foreach($organizations as $organization)
                            <td>
                                {{ $amounts[$ingredient->id][$organization->id] }} г
                            </td>
                        @endforeach
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

{{--                    <div class="form-row">--}}
{{--                        <label for="org">Выберите организацию</label>--}}
{{--                        <select id="org" name="organization_id">--}}
{{--                            <option disabled selected></option>--}}
{{--                            @foreach($organizations as $organization)--}}
{{--                                <option value="{{ $organization->id }}">{{ $organization->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <button class="btn btn-primary">Добавить ингридиент</button>
                </form>
            </div>
        </div>
    </div>
@endsection
