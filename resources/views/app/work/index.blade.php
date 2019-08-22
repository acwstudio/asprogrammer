@extends('app.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Work list</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($works as $work)
                                <tr>
                                    <td>{{ $work->id }}</td>
                                    <td><img src="{{ $work->image }}" height="60"></td>
                                    <td>{{ $work->title }}</td>
                                    <td>{{ $work->text }}</td>
                                    <td>{{ $work->description }}</td>
                                    <td>
                                        <input type="checkbox" value="{{ $work->id }}"
                                                {{ $work->active ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('works.show', $work->id) }}" id="show-{{ $work->id }}"
                                           class="btn btn-outline-info btn-sm mb-1">
                                            <i class="fas fa-info fa-fw"></i>
                                        </a>
                                        <a href="{{ route('works.edit', $work->id) }}" id="edit-{{ $work->id }}"
                                           class="btn btn-outline-success btn-sm mb-1">
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </a>
                                        <a href="{{ route('works.destroy', $work->id) }}" id="delete-{{ $work->id }}"
                                           class="btn btn-outline-danger btn-sm mb-1"><i class="fas fa-trash fa-fw"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('app.work.scripts.index')
@endsection