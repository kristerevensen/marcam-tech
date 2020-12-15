 <!-- Modal -->
 <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addCategory">{{ __('Add Category')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="validate" action="{{ route('campaignscategory.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group" id="addCategoryForm">
                        <label for="campaigncategory_name">Category name</label>
                        <input type="text" name="campaigncategory_name" id="campaigncategory_name" class="form-controller " required>
                    </div>
                    <div class="col-12" id="addCategoryFormMessage"></div>
                </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="savingCategory">Save category</button>
            </form>
        </div>
    </div>
</div>