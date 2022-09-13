
<footer class="container-fluid text-center" style="border-top:3px solid #f8f8f8;padding-top:1rem;padding-bottom: 1rem;">    
<p>มีปัญหาการใช้งานระบบ กรุณาติดต่อ: 0 2244 5308, 5227, 5242</p>
        <strong>Copyright &copy; 2022 <a href="#">Suan Dusit University</a>.</strong> 
</footer>


<script src="<?php echo base_url();?>assets/front/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function(){
         function getdate(){
                var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
             if(s<10){
                 s = "0"+s;
             }
             if (m < 10) {
                m = "0" + m;
            }
            $("#t_time").text(h+" : "+m+" : "+s);
             setTimeout(function(){getdate()}, 500);
            }

            getdate();
    });   
</script>

</body>
</html>