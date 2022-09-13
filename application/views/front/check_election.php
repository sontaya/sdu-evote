<main role="main" class="container">

    <div class="album py-5 ">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <form id="frm_search" method="post">
                    <div class="card">
                        <h5 class="card-header">ตรวจสอบรายชื่อผู้มีสิทธิเลือกตั้ง</h5>
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="cardid">กรอกเลขประจำตัวประชาชน</label>
                                    <input type="number" class="form-control" id="cardid" name="cardid" required>
                                </div>
                            </div>

                            <button class="btn btn-primary btn_search" type="submit">ค้นหา</button>
                            <div id="result" class="py-2"></div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>



        </div>
    </div>

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.btn_search').on('click', function(){
        $("#frm_search").validate({
            rules: {
                cardid:{
                    required:true,
                    number:true,
                    //checkNationalID:true
                },

            },
            messages: {
                cardid:{
                    required:"กรุณาระบุเลขประจำตัวประชาชน.",
                    number:"ระบุตัวเลขเท่านั้น",
                    //checkNationalID:"เลขประจำตัวประชาชนไม่ถูกต้อง"
                },

            },

            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("invalid-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form)
            {
                $.ajax({
                    url:baseurl + "home/ajax_search",
                    method:"POST",
                    data:$('#frm_search').serialize(),
                    beforeSend:function(){
                        $('#result').html('<img  class="img-fluid" width="35px" src="<?php echo base_url();?>uploads/loader.gif">');
                    },
                    success:function(res){
                        console.log(res);
                        var jsonData = JSON.parse(res);
                        console.log(jsonData);
                        if(jsonData.status==true)
                        {
                            if(jsonData.data==null){

                                $('#result').html('<p class="text-danger">ไม่พบข้อมูลผู้มีสิทธิเลือกตั้งของรหัสที่คุณระบุ</p>');
                            }else{
                                $('#result').html(jsonData.data);
                            }

                        }
                        else
                        {
                            $('#result').html('<p class="text-danger">ไม่พบข้อมูลผู้มีสิทธิเลือกตั้งของรหัสที่คุณระบุ</p>');
                        }
                    }
                });
            }

        });

    });
</script>