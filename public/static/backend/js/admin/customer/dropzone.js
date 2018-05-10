Dropzone.options.dropzoneone={
    url: laroute.route('customer.uploads'),
    maxFiles: 1,
    paraName:"customer_image",
    uploadMultiple: false,
    acceptedFiles: 'image/*',
    headers: {
        "X-CSRF-TOKEN":$("input[name=_token]").val()
    },
    addRemoveLinks: true,
    maxFilesize: 1,
    success: function (file,respose) {


    },
    init:function(){
        this.on("error",function(file,response){
            $(file.previewElement).find(".dz-error-message").html(respose.message);
        });
        this.on("removedfile",function(file){
            if(file.status=="success"){
                $.ajax({
                    url:"delete-temp-image",
                    type:"POST",
                    data:{},
                    success: function(data){

                    }
                })
            }
        })
    }


