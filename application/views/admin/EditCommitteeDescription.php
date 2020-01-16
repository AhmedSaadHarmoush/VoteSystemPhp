
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                <p ><a href="<?php echo base_url(); ?>Home/pannel">لوحه التحكم<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
                <h2><?php echo $values[1];?></h2>
                <form class="form" method="post" role="form" action="<?php echo base_url(); ?>Admin/EditDescription">
                    <input type="hidden"name="id" value="<?php echo $values[0];?>"/>
                    <input type="hidden"name="name" value="<?php echo $values[1];?>"/>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" rows="5" id="description" name="description"><?php echo $values[2];?></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">اضافه</button>
                </form>
            </div>
        </div>
    </div>
</section>



