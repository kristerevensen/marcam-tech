

<div class="modal fade" id="addSource" tabindex="-1" role="dialog" aria-labelledby="addSource" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addSource">{{ __('Add Source')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="validate">
                <input type="hidden" name="project_token" id="" value="{{ session('selected_project')}}">
                <input type="hidden" name="created_by" id="{{ Auth::id() }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="source_name">{{ __('Source name')}}</label>
                        <input type="text" name="source_name" id="source_name" class="form-control" required>
                    </div>
                    <div class="col-12" id="addSourceFormMessage"></div>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveSource">Save Source</button>
            </form>
        </div>
    </div>
</div>

@section('custom_scripts')
<script>

</script>
@endsection