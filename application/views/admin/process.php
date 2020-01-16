
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 ">
                <p ><a href="<?php echo base_url(); ?>Home/pannel"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>لوحه التحكم</a></p>
                <table class="table table-hover">
                    <tr>
                        <td><?php
                            if ($values[0] == 1) {
                                echo "<a href=". base_url()."Admin/killVoting class='btn btn-danger'>Turn off</a>";
                            }else{
                                echo "<a href=". base_url()."Admin/turnVoting class='btn btn-success'>Turn on</a>";
                            }
                            ?></td>
                        <td>التصويت للانتخابات</td>
                    </tr>
                    <tr>
                        <td><?php
                        if ($values[1] == 1) {
                                echo "<a href=". base_url()."Admin/killRequests class='btn btn-danger'>Turn off</a>";
                            }else{
                                echo "<a href=". base_url()."Admin/turnRequests class='btn btn-success'>Turn on</a>";
                            }
                        
                        ?></td>
                        <td>الترشح للانتخابات</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</section>



