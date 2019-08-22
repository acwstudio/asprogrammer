@extends('app.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Intro list</div>
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
                            @foreach($intros as $intro)
                                <tr>
                                    <td>{{ $intro->id }}</td>
                                    <td><img src="{{ $intro->image }}" height="60"></td>
                                    <td>{{ $intro->title }}</td>
                                    <td>{{ $intro->text }}</td>
                                    <td>{{ $intro->description }}</td>
                                    <td>
                                        <input type="checkbox" value="{{ $intro->id }}"
                                                {{ $intro->active ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('intros.show', $intro->id) }}" id="show-{{ $intro->id }}"
                                           class="btn btn-outline-info btn-sm mb-1">
                                            <i class="fas fa-info fa-fw"></i>
                                        </a>
                                        <a href="{{ route('intros.edit', $intro->id) }}" id="edit-{{ $intro->id }}"
                                           class="btn btn-outline-success btn-sm mb-1">
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </a>
                                        <a href="{{ route('intros.destroy', $intro->id) }}" id="delete-{{ $intro->id }}"
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
    @include('app.intro.scripts.index')
@endsection