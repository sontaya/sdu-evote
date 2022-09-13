<main role="main" class="container">
<style>
    .cimg{
            width: 90px;
        }
    @media only screen and (max-width: 600px) { 
        .c_number{
            color: red ;
            font-size: 30px;
            font-weight: 700;
        }
        .cimg{
            width: 50px;
        }
       
        table th{
            font-size: 10px;
        }
        table tr td{
            font-size: 11px;
        }
    }

    
</style>
    <div class="album py-5 ">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr align="center">
                            <?php
                                if($this->session->userdata['vote_group']==1){
                                    $head_title="รายชื่อและหมายเลขผู้สมัครเข้ารับการคัดเลือกกันเองเป็นกรรมการบริหารงานบุคคลจากผู้แทนคณาจารย์ประจำ";
                                    $go_url= base_url() ."home/vote1";
                                }else{
                                    $head_title="รายชื่อและหมายเลขผู้สมัครเข้ารับการคัดเลือกกันเองเป็นกรรมการบริหารงานบุคคลจากผู้แทนผู้ปฏิบัติงานในมหาวิทยาลัยสายสนับสนุน";
                                    $go_url= base_url() ."home/vote2";
                                }

                            ?>
                            <th colspan="4"><?php echo $head_title; ?></th>
                        </tr>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">หมายเลข</th>
                            <th>รูปภาพผู้สมัคร</th>
                            <th>ชื่อ-สกุล</th>
                            <th>หน่วยงาน</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cangp as $key => $r){ ?>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><div class="c_number"><?php echo $r->c_number;?></div></td>
                            <td> <img src="<?php echo base_url('uploads/candidate/'.$r->picture);?>" class="cimg" alt="image"></td>
                            <td><?php echo $r->fullname;?></td>
                            <td><?php echo $r->department;?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                        </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?php echo $go_url;?>" class="btn btn-lg btn-outline-danger">เริ่มลงคะแนน</a>
                </div>
            </div>



        </div>
    </div>

</main>