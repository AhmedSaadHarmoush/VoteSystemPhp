<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SUAU</title>



        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/bootstrap.min.css" type="text/css">
        <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/style.css" type="text/css">
        <style>


        </style>
    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">اتحاد الطلاب</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class=""><a href="<?php echo base_url(); ?>">الرئيسيه</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">اللجان
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($committees as $committee) {
                                ?>
                            <li>
                                <form  method="post" role="form" action="<?php echo base_url(); ?>Home/showCommittee">
                                    <input type="hidden" value="<?php echo $committee[0]; ?>" name="id"/>
                                    <input type="hidden" value="<?php echo $committee[2]; ?>" name="description"/>
                                    <input type="hidden" value="<?php echo $committee[1]; ?>" name="name"/>
                                    <button type="submit" class="butli"><?php echo $committee[1]; ?></button></form>
                            </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="#">الانشطه</a></li> 
                    <li><a href="<?php echo base_url(); ?>Home/results">النتائج</a></li> 
                    <?php
                    if ($this->session->userdata('Student_id')) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('Student_id'); ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                if ($this->session->userdata('type') == 0) {
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>Home/pannel">لوحه التحكم</a></li>
                                    <?php
                                } else if ($this->session->userdata('type') == 1) {
                                    if ($this->session->userdata('pending') == 0) {
                                        if ($values[0] == 1) {
                                            if($this->session->userdata('voted') == 0){
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>Home/voteview">انتخب</a></li>
                                            <?php
                                        }
                                        }
                                        if ($values[1] == 1) {
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>Home/request">ترشح للانتخابات</a></li>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                                <li><a href="<?php echo base_url(); ?>">صفحتى الشخصيه</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>Home/logout">تسجيل الخروج<span class="glyphicon glyphicon-log-out"></span> </a></li> 
                            </ul>
                        </li>
    <?php
} else {
    echo '<li><a data-toggle="modal" href="#login-modal" ><span class="glyphicon glyphicon-log-in"></span> تسجيل الدخول</a></li> ';
}
?>

                </ul>
            </div>

        </nav>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>تسجيل الدخول</h1><br><hr>
<?php
echo form_open('Home/validate_user');
echo form_input('studentId', 'الرقم الجامعى ', 'placeholder="الرقم الجامعى "');
echo form_password('password', '', 'placeholder="كلمه السر " class="password"');
echo form_submit('submit', 'تسجيل الدخول', 'class="login loginmodal-submit"');
echo form_close();
?>

                    <div class="login-help">
                        <a href="#">غير مسجل!؟ يرجى مراجعه شؤون الطلاب</a>
                    </div>
                </div>
            </div>
        </div>

        <header>
            <div class="sahdow"></div>
            <div class="header-content">
                <div class="header-content-inner">
                    <p>أهلا بكم فى الموقع الرسمى لاتحاد طلاب كليه العلوم جامعه الاسكندريه</p>
                    <hr>
                    <button  class="btn btn-primary btn-xl page-scroll"><i class="glyphicon glyphicon-search"></i></button>
                    <input type="text" class="field">
                </div>
            </div>
        </header>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>application/views/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>application/views/js/jquery.fittext.js"></script>

        <!-- Custom JavaScript -->
        <script src="<?php echo base_url(); ?>application/views/js/home.js"></script>
        <script src="<?php echo base_url(); ?>application/views/js/script.js"></script>

