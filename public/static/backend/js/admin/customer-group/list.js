var customerGroup = {

    remove:function (obj , id) {

        $(obj).closest('tr').addClass('m-table__row--danger');

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            onClose: function()
            {
                $(obj).closest('tr').removeClass('m-table__row--danger');
            }
        }).then(function(result) {
            if (result.value)
            {
                $.post(laroute.route('customer-group.remove', {id:id}), function() {
                    swal(
                        'Deleted!',
                        'Your selected Item has been deleted.',
                        'success'
                    );
                    $('#autotable').PioTable('refresh');
                });
            }
        });
    },
    changeStatus:function (obj , id , action) {
        $.post(laroute.route('customer-group.change-status'), {id: id, action: action}, function (data) {
            $('#autotable').PioTable('refresh');
        }, 'JSON');
    }
};
$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
        $("span.customer_group_image").css('display', 'none');
        $("#image_update").css('display', 'none')
    });




});
$('#autotable').PioTable({
    baseUrl: laroute.route('customer-group.list')
});