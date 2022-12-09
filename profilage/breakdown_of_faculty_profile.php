<?php include ('header.php'); ?>
 <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class = "panel panel-primary">
                            <div class = "panel-heading">
                                <h4>PANNEAU DES FACULTES</h4>
                                <a href="print_breakdown_of_faculty_profile.php">
                                    <input type="button" value="Print" class="print">
                                </a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="scroll">
                                <table class="table table-bordered" id="countit">
                                	<thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                ECOLE NORMALE SUPERIEURE
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Fonction Accadémique
                                            </th>
                                        </tr>
                                        
                                        <tr>
                                            <th>NIVEAU</th>
                                            <th>Qté.</th>
                                            <?php
                                            include('connect.php');
                                             $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];
                                                ?>
                                            <th value="<?php echo $rank_id; ?>"> <?php echo $row['rank_name']; ?></th>
                                        <?php }?>
                                            <th>Total</th>

                                        </tr>
                                        <!-- BS Name Université Omar Bongo-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(bs_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' and bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty1 = $row1['count(bs_name)'];
                                            }?>
                                        <td>BS</td>
                                        <td><?php echo $qty1; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') AND per_designation in ('Permanent' , 'Temps Partiel')");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total1; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty1; ?></td>
                                        </tr>
                                        <!-- END BS Name Université Omar Bongo-->
                                        <!-- MS Name Université Omar Bongo-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(ms_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' and ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty2 = $row1['count(ms_name)'];
                                            }?>
                                        <td>MS</td>
                                        <td><?php echo $qty2; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total2; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty2; ?></td>
                                        </tr>
                                        <!-- END MS Name Université Omar Bongo-->
                                        <!-- DR Name Université Omar Bongo-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(dr_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' and dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty3 = $row1['count(dr_name)'];
                                            }?>
                                        <td>DR</td>
                                        <td><?php echo $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total3; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty3; ?></td>
                                        </tr>
                                        <td>TOTAL</td>
                                        <!-- END DR Name Université Omar Bongo-->
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];


                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'Université Omar Bongo' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td><?php echo $total1 + $total2 + $total3; ?></td>
                                        <?php } } } } ?>
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <tr></tr>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="scroll">
                                <table class="table table-bordered" id="countit">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                ECOLE NORMALE SUPERIEURE
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Academic
                                            </th>
                                        </tr>
                                        
                                        <tr>
                                            <th>NIVEAU</th>
                                            <th>Qté.</th>
                                            <?php
                                            include('connect.php');
                                             $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];
                                                ?>
                                            <th value="<?php echo $rank_id; ?>"> <?php echo $row['rank_name']; ?></th>
                                        <?php }?>
                                            <th>Total</th>

                                        </tr>
                                        <!-- BS Name Ecole Normale Supérieure-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(bs_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' and bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty1 = $row1['count(bs_name)'];
                                            }?>
                                        <td>BS</td>
                                        <td><?php echo $qty1; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total1; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty1; ?></td>
                                        </tr>
                                        <!-- END BS Name Ecole Normale Supérieure-->
                                        <!-- MS Name Ecole Normale Supérieure-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(ms_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' and ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty2 = $row1['count(ms_name)'];
                                            }?>
                                        <td>MS</td>
                                        <td><?php echo $qty2; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total2; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty2; ?></td>
                                        </tr>
                                        <!-- END MS Name Ecole Normale Supérieure-->
                                        <!-- DR Name Ecole Normale Supérieure-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(dr_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' and dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty3 = $row1['count(dr_name)'];
                                            }?>
                                        <td>DR</td>
                                        <td><?php echo $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total3; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty3; ?></td>
                                        </tr>
                                        <td>TOTAL</td>
                                        <!-- END DR Name Ecole Normale Supérieure-->
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];


                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td><?php echo $total1 + $total2 + $total3; ?></td>
                                        <?php } } } } ?>
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <tr></tr>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="scroll">
                                <table class="table table-bordered" id="countit">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                               USTM
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Académic
                                            </th>
                                        </tr>
                                        
                                        <tr>
                                            <th>NIVEAU</th>
                                            <th>Qté.</th>
                                            <?php
                                            include('connect.php');
                                             $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];
                                                ?>
                                            <th value="<?php echo $rank_id; ?>"> <?php echo $row['rank_name']; ?></th>
                                        <?php }?>
                                            <th>Total</th>

                                        </tr>
                                        <!-- BS Name USTM-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(bs_name) FROM tbl_personnel WHERE per_campus = 'USTM' and bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty1 = $row1['count(bs_name)'];
                                            }?>
                                        <td>BS</td>
                                        <td><?php echo $qty1; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total1; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty1; ?></td>
                                        </tr>
                                        <!-- END BS Name USTM-->
                                        <!-- MS Name USTM-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(ms_name) FROM tbl_personnel WHERE per_campus = 'USTM' and ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty2 = $row1['count(ms_name)'];
                                            }?>
                                        <td>MS</td>
                                        <td><?php echo $qty2; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total2; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty2; ?></td>
                                        </tr>
                                        <!-- END MS Name USTM-->
                                        <!-- DR Name USTM-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(dr_name) FROM tbl_personnel WHERE per_campus = 'USTM' and dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty3 = $row1['count(dr_name)'];
                                            }?>
                                        <td>DR</td>
                                        <td><?php echo $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total3; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty3; ?></td>
                                        </tr>
                                        <td>TOTAL</td>
                                        <!-- END DR Name USTM-->
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];


                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td><?php echo $total1 + $total2 + $total3; ?></td>
                                        <?php } } } } ?>
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <tr></tr>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="scroll">
                                <table class="table table-bordered" id="countit">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                Institut National des Sciences de l'Organisation
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Académic
                                            </th>
                                        </tr>
                                        
                                        <tr>
                                            <th>NIVEAU</th>
                                            <th>Qté.</th>
                                            <?php
                                            include('connect.php');
                                             $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];
                                                ?>
                                            <th value="<?php echo $rank_id; ?>"> <?php echo $row['rank_name']; ?></th>
                                        <?php }?>
                                            <th>Total</th>

                                        </tr>
                                        <!-- BS Name Institut National des Sciences de l'Organisation-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(bs_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' and bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty1 = $row1['count(bs_name)'];
                                            }?>
                                        <td>BS</td>
                                        <td><?php echo $qty1; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total1; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty1; ?></td>
                                        </tr>
                                        <!-- END BS Name Institut National des Sciences de l'Organisation-->
                                        <!-- MS Name Institut National des Sciences de l'Organisation-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(ms_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' and ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty2 = $row1['count(ms_name)'];
                                            }?>
                                        <td>MS</td>
                                        <td><?php echo $qty2; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total2; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty2; ?></td>
                                        </tr>
                                        <!-- END MS Name Institut National des Sciences de l'Organisation-->
                                        <!-- DR Name Institut National des Sciences de l'Organisation-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(dr_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' and dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                            $qty->execute();
                                            $fqty = $qty->fetchAll();

                                        foreach($fqty as $key => $row1) { 
                                           $qty3 = $row1['count(dr_name)'];
                                            }?>
                                        <td>DR</td>
                                        <td><?php echo $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total3; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty3; ?></td>
                                        </tr>
                                        <td>TOTAL</td>
                                        <!-- END DR Name Institut National des Sciences de l'Organisation-->
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];


                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tdr->execute();
                                                $ftdr = $tdr->fetchAll();

                                            foreach($ftdr as $key => $row4) { 
                                               $total3 = $row4['COUNT(dr_name)'];
                                        ?>
                                        <td><?php echo $total1 + $total2 + $total3; ?></td>
                                        <?php } } } } ?>
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <tr></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src = "js/jquery.min.js"></script>
<?php include('script.php'); ?>