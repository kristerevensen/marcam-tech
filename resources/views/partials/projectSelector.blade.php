@if(session('selected_project'))
<li class="nav-item dropdown">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ session('selected_project_name') }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ ('/projects/deselect') }}">Deselect</a>

        </div>
    </div>
</li>
@endif