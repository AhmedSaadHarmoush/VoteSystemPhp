
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                <h3>من فضلك اختر اللجنه التى تريد الترشح لها</h3>
                <br>
                <br>
                <form class="form" method="post" role="form" action="<?php echo base_url(); ?>Home/addRequest">
                    <div class="form-group">
                        <label for="sel1">اختر اللجنه</label>
                        <select class="form-control text-right" name="committee"id="sel1">
                            <?php
                            foreach ($values as $value) {
                                ?>
                            <option class="text-right"value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default">طلب</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



