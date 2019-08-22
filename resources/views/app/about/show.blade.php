<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">{{ $about->name }}</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-border fa-info"></i>
            {{ __('tables.title.about.show') }}
            <i class="far fa-frown {{ $about->active ? 'fa-smile' : 'fa-frown' }} fa-2x fa-pull-right"
               style="color:{{ $about->active ? 'Green' : 'Red' }}"></i>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{$about->id}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.image') }}</td>
                            <td><img src="{{ $about->image }}" height="100px"></td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.title') }}</td>
                            <td>{{$about->title}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.text') }}</td>
                            <td>{{$about->text}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.description') }}</td>
                            <td>{{$about->description}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.created') }}</td>
                            <td>{{$about->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>