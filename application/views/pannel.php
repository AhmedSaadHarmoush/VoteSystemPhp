
<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">لوحه التحكم</h2>
                <nav id="mainNav" class="navbar navbar-default affix-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo base_url(); ?>Home/pannel">لوحه التحكم</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo base_url(); ?>">الرئيسيه</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">الاعضاء
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>Admin/addUserview">اضافه عضو</a></li>
                                    <li><a href="<?php echo base_url(); ?>Admin/printUsers">ازاله/تعديل عضو</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">المرشحين
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>Admin/printRequest">قبول طلبات الترشح</a></li>
                                    <li><a href="<?php echo base_url(); ?>Admin/printCandidates">ازاله مرشح</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">اللجان
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>Admin/addCommitteeview">اضافه لجنه</a></li>
                                    <li><a href="<?php echo base_url(); ?>Admin/printCommitees">ازاله/تعديل لجنه</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url(); ?>Admin/process">العمليه الانتخابيه</a></li> 
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </div>
</section>



