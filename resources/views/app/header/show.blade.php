<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">{{ $header->name }}</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-border fa-info"></i>
            {{ __('tables.title.header.show') }}
            <i class="far fa-frown {{ $header->active ? 'fa-smile' : 'fa-frown' }} fa-2x fa-pull-right"
               style="color:{{ $header->active ? 'Green' : 'Red' }}"></i>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>{{$header->id}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.icon') }}</td>
                            <td><i class="far {{ $header->icon }} fa-3x"></i></td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.title') }}</td>
                            <td>{{$header->title}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.text') }}</td>
                            <td>{{$header->text}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.description') }}</td>
                            <td>{{$header->description}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('tables.fields.created') }}</td>
                            <td>{{$header->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>