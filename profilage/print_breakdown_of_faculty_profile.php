<link rel="stylesheet" type="text/css" href="css/style1.css">
<center>
    <div class="backk" style="float: left; margin-left: 120px;">
        <button><a href="faculty_breakdown_of_faculty_profile.php">Retour</a></button>
    </div>
    <div class="filterss" style="float: right; margin-right: 120px;" onload="refresh();">
        <button onclick="printContent('print')" id = "hit" style="float: right;">Imprimer le Rapport</button>
        <input id="btnExport" type="button" value="Export to Excel" style="float: right; margin-top: 30px; margin-right: -86px;">
        <form action="" method="POST">
            <div class="filter-date" style="float: left; margin-top: -21px; margin-right: 108px">
            From : <input type="date" name="d1" style="color: #000;"> 
            To: <input type="date" name="d2" style="color: #000;"> 
            <input type="submit" value="Search" name="filter" style="color: #000;">
            </div>
        &nbsp;&nbsp;
        <?php
                include('connect.php');
                if (isset($_POST['filter'])) {
                $d1 = $_POST['d1'];
                $d2 = $_POST['d2'];

                $d11 = date("F j, Y", strtotime($d1));
                $d21 = date("F j, Y", strtotime($d2));
            ?>
    </div>
    <div ng-app="myApp" ng-controller="myCtrl">
        <div class="prepared-form" style="border: 1px solid; width: 30%; margin-right: 480px;">
            <i>Note: Prière de remplire ce formulaire s'il vous plaît.</i>
            <br><br>
            <table>
            <tr>
                <td>Prière de remplire ce formulaire s'il vous plaît:</td>
                <td><input ng-model="firstname" placeholder="Name" class="form-control"></td>
            </tr>
            <tr>
                <td>Position :</td>
                <td><input ng-model="position" placeholder="Position" class="form-control"></td>
            </tr>
            <tr>
                <td>Certifié Correct :</td>
                <td><input ng-model="certified" placeholder="Name" class="form-control"></td>
            </tr>
            <tr>
                <td>Position :</td>
                <td><input ng-model="position1" placeholder="Position" class="form-control"></td>
            </tr>
           </table>
        </div>
    <br><br>
    <div id="print" style="border: 1px solid; width: auto; height: auto;">
        <div class="report-title" style = "margin:10px;"><br/>
            <div class="print-logo">
                <img src="images/CHMSC_logo.png" width="120px" height="120px" style="margin-left: -330px; position: absolute;">
            </div>
            <center>République Gabonaise</center>
      <center><strong>Lionel-Brice ECOLE 241</strong></center>
      <center>Port-Gentil, Afrique Centrale</center>
      <center>Tel. No. (+241) 74129812</center>
      <br />
      <center><strong>PROJET DE SOUTENANCE</strong></center>
      <center><strong>dès <?php echo date('F Y'); ?></strong></center>
    </div>
        <br />
        <br />
        <br />
        <br />
            <table id = "example" class = "stripe order-table" cellspacing = "0" style="margin: 10px;">
               <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                UOB
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Académique
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
                                        <!-- BS Name UOB-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(bs_name) FROM tbl_personnel WHERE per_campus = 'UOB' and bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') AND per_designation in ('Permanent' , 'Temps Partiel') ");
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

                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') AND per_designation in ('Permanent' , 'Temps Partiel')");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total1; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty1; ?></td>
                                        </tr>
                                        <!-- END BS Name UOB-->
                                        <!-- MS Name UOB-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(ms_name) FROM tbl_personnel WHERE per_campus = 'UOB' and ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
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

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];
                                        ?>
                                        <td class="count-me"><?php echo $total2; ?></td>
                                        <?php } } ?>
                                        <td><?php echo $qty2; ?></td>
                                        </tr>
                                        <!-- END MS Name UOB-->
                                        <!-- DR Name UOB-->
                                        <tr>
                                        <?php
                                        include('connect.php');
                                         $qty = $con->prepare("SELECT count(dr_name) FROM tbl_personnel WHERE per_campus = 'UOB' and dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
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

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
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
                                        <!-- END DR Name UOB-->
                                        <td><?php echo $qty1 + $qty2 + $qty3; ?></td>
                                        <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];


                                                $tbs = $con->prepare("SELECT COUNT(bs_name) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' AND bs_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                            foreach($ftbs as $key => $row2) { 
                                               $total1 = $row2['COUNT(bs_name)'];

                                                $tms = $con->prepare("SELECT COUNT(ms_name) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' AND ms_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
                                                $tms->execute();
                                                $ftms = $tms->fetchAll();

                                            foreach($ftms as $key => $row3) { 
                                               $total2 = $row3['COUNT(ms_name)'];

                                                $tdr = $con->prepare("SELECT COUNT(dr_name) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' AND dr_name <> ' ' AND per_designation in ('Permanent' , 'Temps Partiel') ");
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
                            <br>
                            <br>
                                <table id = "example" class = "stripe order-table" cellspacing = "0" style="margin: 10px;">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                               ECOLE NORMALE SUPERIEURE
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Académique
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
                            <br>
                            <br>
                                <table id = "example" class = "stripe order-table" cellspacing = "0" style="margin: 10px;">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                USTM
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Académique
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
                                    </thead>
                                </table>
                            <br>
                            <br>
                                <table id = "example" class = "stripe order-table" cellspacing = "0" style="margin: 10px;">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                INSTITUT NATIONAL DES SCIENCES DE L'ORGANISATION
                                            </th>
                                            <th colspan="23" class="text-center">
                                            Rang Académique
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
                        </tbody>
                    </table>
                    <?php } ?>
                <br><br><br>
                <div class="noted">
                    <label>Preparé by:</label>
                    <br>
                    <br>
                    <label style="text-transform: uppercase;"><strong>{{firstname}}</strong></label>
                    <br>
                    <label style="text-transform: capitalize;">{{position}}</label>
                    <br><br><br>
                    <label>Certifié Correct:</label>
                    <br>
                    <br>
                    <label style="text-transform: uppercase;"><strong>{{certifié}}</strong></label>
                    <br>
                    <label style="text-transform: capitalize;">{{position1}}</label>
                    <br><br><br>
                </div>
            </div>
        </div>
    </center>
    </form>
<script src="plugins/js/jquery-1.js"></script>
<script type="text/javascript">
$("#btnExport").click(function (e) {
    //getting values of current time for generating the file name
    var dt = new Date();
    var day = dt.getDate();
    var month = dt.getMonth() + 1;
    var year = dt.getFullYear();
    var hour = dt.getHours();
    var mins = dt.getMinutes();
    var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
    //creating a temporary HTML link element (they support setting file names)
    var a = document.createElement('a');
    //getting data from our div that contains the HTML table
    var data_type = 'data:application/vnd.ms-excel;charset=utf-8';
    
    var table_html = $('#print')[0].outerHTML;
//    table_html = table_html.replace(/ /g, '%20');
    table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');
    
    var css_html = '<style>td {border: 0.5pt solid #c0c0c0} .tRight { text-align:right} .tLeft { text-align:left} </style>';
//    css_html = css_html.replace(/ /g, '%20');
    
    a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</' + 'head><body>' + table_html + '</body></html>');
    
    //setting the file name
    a.download = 'Summary of Breakdown of Faculty Profile_' + postfix + '.xls';
    //triggering the function
    a.click();
    //just in case, prevent default behaviour
    e.preventDefault();
});
</script>
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<script type="text/javascript">
    (function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }

        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
    });

})(document);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.name = " ";
});
app.filter('capitalize', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
});
</script>
