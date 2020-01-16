
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                 <form class="form" method="post" role="form" action="<?php echo base_url(); ?>Home/addUserData">
                    <h4>English</h4>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname">
                    </div>
                    <h4>العربيه</h4>
                    <div class="form-group">
                        <label for="afname">الاسم الاول</label>
                        <input type="text" class="form-control" name="afname" id="afname">
                    </div>
                    <div class="form-group">
                        <label for="alname">الاسم الاخير</label>
                        <input type="text" class="form-control" name="alname" id="alname">
                    </div>
                    <div class="form-group">
                        <label for="gender">النوع</label><br>
                        <label class="radio-inline"><input type="radio" name="gender" value="0">ذكر</label>
                        <label class="radio-inline"><input type="radio" name="gender" value="1">أنثى</label>
                    </div>
                    <div class="form-group">
                        <label for="national_id">الرقم القومى</label>
                        <input type="text" class="form-control" name="national_id" id="national_id">
                    </div>
                    <div class="form-group">
                        <label for="telephone">رقم الهاتف</label>
                        <input type="text" class="form-control" name="telephone" id="telephone">
                    </div>
                    <div class="form-group">
                        <label for="mobile">رقم الجوال</label>
                        <input type="text" class="form-control" name="mobile" id="mobile">
                    </div>
                    <div class="form-group">
                        <label for="mail">الايميل</label>
                        <input type="email" class="form-control" name="mail" id="mail">
                    </div>
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <button type="submit" class="btn btn-default">اضافه</button>
                </form>
            </div>
        </div>
    </div>
</section>



