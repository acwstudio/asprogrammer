@extends('app.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">About list</div>
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
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td><img src="{{ $about->image }}" height="60"></td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->text }}</td>
                                    <td>{{ $about->description }}</td>
                                    <td>
                                        <input type="checkbox" value="{{ $about->id }}"
                                                {{ $about->active ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('abouts.show', $about->id) }}" id="show-{{ $about->id }}"
                                           class="btn btn-outline-info btn-sm mb-1">
                                            <i class="fas fa-info fa-fw"></i>
                                        </a>
                                        <a href="{{ route('abouts.edit', $about->id) }}" id="edit-{{ $about->id }}"
                                           class="btn btn-outline-success btn-sm mb-1">
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </a>
                                        <a href="{{ route('abouts.destroy', $about->id) }}" id="delete-{{ $about->id }}"
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