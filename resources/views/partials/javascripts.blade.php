  <!-- core:js -->
  <script src="{{ asset('assets/vendors/core/core.js')}}"></script>

  <script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
  <script src="{{ asset('assets/js/template.js')}}"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!-- endinject -->

  <!-- plugin js for this page -->
  <script src="{{ asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- end plugin js for this page -->
  
  <!-- custom js for this page -->
  <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('assets/js/data-table.js')}}"></script>
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('assets/js/wizard.js')}}"></script>
  <script src="{{ asset('assets/vendors/jquery-steps/jquery.steps.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
<script>
    $(function() {
'use strict'

if ($(".select2").length) {
$(".select2").select2();
}

});
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        minDate:new Date(),
        todayHighlight: true,
        autoclose: true
    });
    

    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            $("#saveCategory").click(function(e){
               
                var name = $("#campaigncategory_name").val();
                
                $.ajax({
                type:'POST',
                url:"{{ route('campaignscategory.post') }}",
                data:{name:name},
                success:function(response){
                    var status = response.status;
                   if(status == 'success'){
                        var option = new Option(response.name,response.id);
                        $(option).html(response.name);
                       // $('#CampaignCategories').append(option);
                        $("#CampaignCategories").prepend("<option value='"+response.id+"' selected='selected'>"+response.name+"</option>");
                        $('#addCategoryForm').hide();
                        $('#addCategoryFormMessage').append('Campaign <span style="color:#fc2403;">'+response.name+'</span> was added to selection. <i data-feather="check-circle"></i>');
                        $("#addCategoryFormMessage").show();
                    } else if(status == 'error') {
                        var errors = data.responseJSON;
                        console.log(errors);
                        alert(errors);
                    }

                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                    alert(errors);
                }
        
            });
        });
        $(".validate").validate();
        $('.addCategoryModal').on('click', function() {
            $('#addCategoryForm').show();
            $('#addCategoryFormMessage').text('');
        });
        
</script>