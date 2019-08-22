<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">{{ $work->name }}</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-border fa-info"></i>
            {{ __('tables.title.work.show') }}
            <i class="far fa-frown {{ $work->active ? 'fa-smile' : 'fa-frown' }} fa-2x fa-pull-right"
               style="color:{{ $work->active ? 'Green' : 'Red' }}"></i>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{$work->id}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.image') }}</td>
                            <td><img src="{{ $work->image }}" height="100px"></td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.title') }}</td>
                            <td>{{$work->title}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.text') }}</td>
                            <td>{{$work->text}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.description') }}</td>
                            <td>{{$work->description}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.created') }}</td>
                            <td>{{$work->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>