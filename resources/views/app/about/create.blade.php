@extends('app.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">About Create</div>
                    <div class="card-body">
                        <div class="card-body">
                            <form id="store-about" method="post" action="{{ route('abouts.store') }}" role="form"
                                  enctype="multipart/form-data" class="col col-lg-12">

                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="form_title">{{ __('forms.fields.title') }} *</label>
                                        <input id="form_title" type="text" name="title" value="{{ old('title') }}"
                                               class="form-control @error('title') is-invalid @enderror"
                                               placeholder="{{ __('forms.ph-post.title') }} *">

                                        @error('title')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="form_text">{{ __('forms.fields.text') }} *</label>
                                        <textarea id="form_body" class="form-control @error('body') is-invalid @enderror" name="text"
                                                  placeholder="{{ __('forms.ph-post.text') }}">{{ old('text') }}</textarea>

                                        @error('body')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection