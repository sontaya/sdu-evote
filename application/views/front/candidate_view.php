<main role="main" class="container">
<style>
    .card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}
</style>
    <div class="album py-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                     <h5>รายชื่อและหมายเลขผู้สมัครเข้ารับการเลือกตั้ง<?php echo $title; ?></h5>
                </div>
            </div>
            <div class="row">
                 <?php foreach ($candidates as $key => $r){ ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url('uploads/events/'.$r->picture);?>">
                    <div class="card-block">
                        <h6 class="text-bold"><?php echo $r->fullname;?></h6>
                    </div>
                </div>
            </div>
                 <?php } ?>
            </div>
            <div class="row p-2">
                <div class="col-md-12 text-center">
                     <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="fas fa-undo"></i> ย้อนกลับ</a>
                </div>
            </div>           

        </div>
    </div>

</main>