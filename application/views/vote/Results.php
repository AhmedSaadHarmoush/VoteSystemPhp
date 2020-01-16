
<section class="bg-dark" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-right">
                <br>
                <br>

                <div class="form-group">
                    <?php
                    foreach ($committees as $committee) {
                        ?>
                        <h3><?php echo $committee[1]; ?></h3>
                        <table class="table ">
                            <tbody>
                                <?php
                                foreach ($values as $value) {
                                    if ($committee[0] == $value[2]) {
                                        ?>
                                        <tr>
                                            <td><?php echo $value[4]; ?></td><td><?php echo $value[1]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>