@extends('layouts.app')

@section('content')


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('Projects')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">New</li>
        </ol>
    </nav>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <form action="{{ route('projects.save')}}" method="POST" id="projects.new" class="col-12">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Create a new Project') }}</h4>
                        <p class="card-description"></p>
                        <style>
                            .wizard>.content {
                                background: #FFF !important;
                            }
                        </style>
                            <div id="wizard">
                            <h2>General Information</h2>
                            <section>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="project_name">{{ __('Project Name') }}</label>
                                        <input type="text" name="project_name" id="project_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name">{{ __('Project URL') }}</label>
                                        <input type="text" name="project_url" id="project_url" class="form-control" placeholder="" value="https://">
                                    </div>
                                </div>
                            </section>

                            <h2>Add Keywords</h2>
                            <section>
                                <h4>Heading</h4>
                                <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque. 
                                    In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum 
                                    dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur. 
                                    In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam. 
                                    Donec non pulvinar urna. Aliquam id velit lacus.</p>
                            </section>

                            <h2>Search Engines</h2>
                            <section>
                                <h4>Heading</h4>
                                <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
                                    pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat. 
                                    Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
                                    venenatis.</p>
                            </section>

                            <h2>Competitors</h2>
                            <section>
                                <h4>Heading</h4>
                                <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                                    Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                                    Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                            </section>
                            </div>
                    </div>
                </div>
            </form>
        </div>
</div>

@endsection
