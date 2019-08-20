@extends('app.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Header list</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($headers as $header)
                                <tr>
                                    <td>{{ $header->id }}</td>
                                    <td><i class="far {{ $header->icon }} fa-3x"></i></td>
                                    <td>{{ $header->title }}</td>
                                    <td>{{ $header->text }}</td>
                                    <td>{{ $header->description }}</td>
                                    <td>
                                        <input type="checkbox" value="{{ $header->id }}"
                                                {{ $header->active ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('headers.show', $header->id) }}" id="show-{{ $header->id }}"
                                        class="btn btn-outline-info btn-sm mb-1">
                                            <i class="fas fa-info fa-fw"></i>
                                        </a>
                                        <a href="{{ route('headers.edit', $header->id) }}" id="edit-{{ $header->id }}"
                                           class="btn btn-outline-success btn-sm mb-1">
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </a>
                                        <a href="{{ route('headers.destroy', $header->id) }}" id="delete-{{ $header->id }}"
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