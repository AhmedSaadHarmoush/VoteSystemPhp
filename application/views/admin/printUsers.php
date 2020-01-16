
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 ">
                <p ><a href="<?php echo base_url(); ?>Home/pannel"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>لوحه التحكم</a></p>
                <table class="table " >
                    <thead>
                        <tr>
                            <th>حذف</th>
                            <th>تعديل</th>
                            <th>المستوى</th>
                            <th>الرقم السرى</th>
                            <th>الرقم الجامعى</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    if($values){
                        $counter=0;
                    foreach ($values as $value) {
                        $counter++;
                        ?>
                        <tr>
                            <td><form  method="post" role="form" action="<?php echo base_url(); ?>Admin/deleteCommittee">
                                    <input type="hidden" value="<?php echo $value[0]; ?>" name="id"/>
                                    <button type="submit" class="btn btn-danger">حذف</button></form></td>
                            <td><form  method="post" role="form" action="<?php echo base_url(); ?>Admin/EditCommittee">
                                    <input type="hidden" value="<?php echo $value[0]; ?>" name="id"/>
                                    <button type="submit" class="btn btn-primary">تعديل</button></form></td>
                            <td><?php echo $value[3]; ?></td>
                            <td><?php echo $value[2]; ?></td>
                            <td><?php echo $value[1]; ?></td>
                            <td><?php echo $counter; ?></td>
                        </tr>
                        <?php
                    }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</section>



