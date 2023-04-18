@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('admin.team.index'))
@section('content')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.team.create') }}" class="btn btn-success float-right"><i
                        class="fa fa-plus"></i> Создать</a>
            </div>
            <div class="card-body">
                <table class="table table-hovered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Сортировка</th>
                        <th>Полное имя</th>
                        <th>Должность</th>
                        <th>Фото</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($team as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->sort }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->post }}</td>
                            <td>
                                @isset($member->picture)
                                    <img src="{{$member->picture}}" width="70" height="70" alt="">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-primary"><i
                                        class="fa fa-pencil"></i> Редактировать</a>
                                <form action="{{ route('admin.team.delete', $member) }}" method="POST"
                                      class="d-inline delete-position-form">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="delete-member-btn btn btn-danger"><i class="fa fa-trash"></i>
                                        Удалить</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Сотрудники не найдены</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $team->links('admin.includes.pagination') }}
            </div>
        </div>
    </section>
@endsection
