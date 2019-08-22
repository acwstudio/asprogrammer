<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">{{ $intro->name }}</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-border fa-info"></i>
            {{ __('tables.title.intro.show') }}
            <i class="far fa-frown {{ $intro->active ? 'fa-smile' : 'fa-frown' }} fa-2x fa-pull-right"
               style="color:{{ $intro->active ? 'Green' : 'Red' }}"></i>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{$intro->id}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.image') }}</td>
                            <td><img src="{{ $intro->image }}" height="100px"></td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.title') }}</td>
                            <td>{{$intro->title}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.text') }}</td>
                            <td>{{$intro->text}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.description') }}</td>
                            <td>{{$intro->description}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.created') }}</td>
                            <td>{{$intro->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>