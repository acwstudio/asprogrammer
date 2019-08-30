@extends('app.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Intro Create</div>
                    <div class="card-body">
                        <div class="card-body">
                            <form id="store-intro" method="post" action="{{ route('intros.store') }}" role="form"
                                  enctype="multipart/form-data" class="col col-lg-12">

                                @csrf

                                <input id="img_name" name="img-name" type="hidden">

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="form_title">{{ __('forms.fields.title') }} *</label>
                                        <input id="form_title" type="text" name="title" value="{{ old('title') }}"
                                               class="form-control @error('title') is-invalid @enderror"
                                               placeholder="{{ __('forms.ph.title') }} *">

                                        @error('title')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="form_text">{{ __('forms.fields.text') }} *</label>
                                        <textarea id="summernote"
                                                  class="form-control @error('text') is-invalid @enderror" name="text"
                                                  placeholder="{{ __('forms.ph-post.text') }}">{{ old('text') }}</textarea>

                                        @error('text')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="form_description">{{ __('forms.fields.description') }} *</label>
                                        <input id="form_description" type="text" name="description" value="{{ old('description') }}"
                                               class="form-control @error('description') is-invalid @enderror"
                                               placeholder="{{ __('forms.ph.description') }} *">

                                        @error('description')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>{{ __('forms.fields.image') }} *</label>
                                        <div id="dropzone" class="dropzone dz-clickable dropzone-file-area"></div>
                                    </div>
                                </div>

                                <div class="custom-control custom-checkbox my-1 mr-sm-2">

                                    <input id="form_active" type="checkbox" name="active" class="custom-control-input">
                                    <label class="custom-control-label mr-lg-3"
                                           for="form_active">{{ __('forms.fields.active') }}
                                    </label>

                                    <button type="submit"
                                            class="btn btn-primary float-right">{{ __('forms.buttons.create') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('app.intro.scripts.create')
@endsection