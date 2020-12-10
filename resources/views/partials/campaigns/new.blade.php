<div>
    <a href="{{ route('campaigns.new') }}" class="btn btn-sm btn-success  btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            {{ __('New Campaign') }}
        </a>
        <div class="row">
            
            <div class="col-md-6 grid-margin stretch-card">
                <a href="{{ route('campaigns.new_bulk_links') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    {{ __('Bulk Link Creator') }}
                </a>
                <a href="{{ route('campaigns.new_template') }}" class="btn btn-sm btn-secondary  btn-icon-text">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    {{ __('New Template') }}
                </a>
                <a href="{{ route('campaigns.new_link') }}" class="btn btn-sm btn-success  btn-icon-text">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    {{ __('New Link') }}
                </a>
            </div>
        </div>
    </div>