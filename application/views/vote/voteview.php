
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                <h3>من فضلك اختر مرشحين مختلفين من كل لجنه</h3>
                <br>
                <br>
                <form class="form" method="post" role="form" action="<?php echo base_url(); ?>Home/vote">
                    <div class="form-group">
                        <?php
                        foreach ($committees as $committee) {
                            ?>
                            <h3><?php echo $committee[1]; ?></h3>
                            <select class="form-control text-right"  name="candidate1<?php echo $committee[0]; ?>"id="sel1<?php echo $committee[0]; ?>">
                                <?php
                                foreach ($values as $value) {
                                    if ($committee[0] == $value[2]) {
                                        if ($value[3] == $this->session->userdata('level')) {
                                            ?>
                                            <option class="text-right"value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <select class="form-control text-right"  name="candidate2<?php echo $committee[0]; ?>"id="sel2<?php echo $committee[0]; ?>">
                                <?php
                                foreach ($values as $value) {
                                    if ($committee[0] == $value[2]) {
                                        if ($value[3] == $this->session->userdata('level')) {
                                            ?>
                                            <option class="text-right"value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <br>
                            <br>
                            <?php
                        }
                        ?>
                        <button type="submit" onclick="myFunction()" class="btn btn-default">طلب</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>