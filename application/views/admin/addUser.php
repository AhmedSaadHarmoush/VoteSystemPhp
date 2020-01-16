
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                <p ><a href="<?php echo base_url(); ?>Home/pannel">لوحه التحكم<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
                <form class="form" method="post" role="form" action="<?php echo base_url(); ?>Admin/addUser">
                    
                    <div class="form-group">
                        <label for="user_id">الرقم الجامعى</label>
                        <input type="text" class="form-control" name="user_id" id="user_id">
                    </div>
                    <div class="form-group">
                        <label for="password">الرقم السرى</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="level">المستوى</label>
                        <input type="text" class="form-control" name="level" id="level">
                    </div>
                    <button type="submit" class="btn btn-default">اضافه</button>
                </form>
            </div>
        </div>
    </div>
</section>



