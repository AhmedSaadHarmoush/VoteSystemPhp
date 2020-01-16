
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                <p ><a href="<?php echo base_url(); ?>Home/pannel">لوحه التحكم<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
                <form class="form-inline" method="post" role="form" action="<?php echo base_url(); ?>Admin/addCommittee">
                    <button type="submit" class="btn btn-default">اضافه</button>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name">
                        <label for="name">اسم اللجنه     </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



