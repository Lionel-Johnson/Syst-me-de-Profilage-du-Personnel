<link rel="stylesheet" type="text/css" href="css/style1.css">
<center>
    <div class="backk" style="float: left; margin-left: 120px;">
        <button><a href="faculty_profile_by_academic_rank.php">Retour</a></button>
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
            <i>Note: Merci de remplire ce formulaire s'il vous plaît.</i>
            <br><br>
            <table>
            <tr>
            <td>Preparé by :</td>
                <td><input ng-model="firstname" placeholder="Nom" class="form-control"></td>
            </tr>
            <tr>
                <td>Position :</td>
                <td><input ng-model="position" placeholder="Position" class="form-control"></td>
            </tr>
            <tr>
                <td>Certifié Correct :</td>
                <td><input ng-model="certifié" placeholder="Nom" class="form-control"></td>
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
                        <th >Rang Académique</th>
                        <th >UOB</th>
                        <th >Ecole Normale Supérieure</th>
                        <th >Institut National des Sciences de l'Organisation</th>
                        <th >USTM</th>                                  
                        <th >Total</th> 
                    </tr>
                </thead>
                    <tbody>
                       <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];


                                            $tbs = $con->prepare("SELECT ttotal1.ttotal2 + ttotal3.ttotal4 as ttotal FROM (
                                        SELECT COUNT(*) as ttotal2
                                        FROM   tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'UOB' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time') 
                                        ) as ttotal1,
                                        (
                                        SELECT COUNT(*) as ttotal4
                                        FROM   tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'UOB' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time')
                                        ) as ttotal3 ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                                foreach($ftbs as $key => $row1) { 
                                            $ttotal = $row1['COUNT(*)' + 'COUNT(ttotal)'];

                                            
                                            $abs = $con->prepare("SELECT atotal1.atotal2 + atotal3.atotal4 as atotal FROM (
                                        SELECT COUNT(*) as atotal2
                                        FROM   tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time') 
                                        ) as atotal1,
                                        (
                                        SELECT COUNT(*) as atotal4
                                        FROM   tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time')
                                        ) as atotal3 ");
                                                $abs->execute();
                                                $fabs = $abs->fetchAll();

                                                foreach($fabs as $key => $row2) { 
                                               $atotal = $row2['COUNT(*)' + 'COUNT(atotal)'];


                                            
                                            $bbs = $con->prepare("SELECT btotal1.btotal2 + btotal3.btotal4 as btotal FROM (
                                        SELECT COUNT(*) as btotal2
                                        FROM tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time') 
                                        ) as btotal1,
                                        (
                                        SELECT COUNT(*) as btotal4
                                        FROM tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time')
                                        ) as btotal3");
                                                $bbs->execute();
                                                $fbbs = $bbs->fetchAll();

                                                foreach($fbbs as $key => $row3) { 
                                               $btotal = $row3['COUNT(*)' + 'COUNT(btotal)'];


                                            
                                            $fbs = $con->prepare("SELECT fttotal1.fttotal2 + fttotal3.fttotal4 as fttotal FROM (
                                        SELECT COUNT(*) as fttotal2
                                        FROM tbl_personnel WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'USTM' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time') 
                                        ) as fttotal1,
                                        (
                                        SELECT COUNT(*) as fttotal4
                                        FROM tbl_personnel_master_file WHERE date_modified >= '$d1' AND date_modified <= '$d2' AND per_campus = 'USTM' AND rank_id = '$rank_id' AND per_designation in ('Permanent' , 'Part Time')
                                        ) as fttotal3 ");
                                                $fbs->execute();
                                                $ffbs = $fbs->fetchAll();

                                                foreach($ffbs as $key => $row4) { 
                                                $fttotal = $row4['COUNT(*)' + 'COUNT(fttotal)'];

                                            //TOTAL
                                            $tbss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id<>0 ");
                                                $tbss->execute();
                                                $ftbss = $tbss->fetchAll();

                                                foreach($ftbss as $key => $row5) {
                                                $sum1 = $row5['COUNT(rank_id)'];

                                            $fttbss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id<>0 ");
                                                $fttbss->execute();
                                                $fftbss = $fttbss->fetchAll();

                                                foreach($fftbss as $key => $row6) {
                                                $sum2 = $row6['COUNT(rank_id)'];

                                            $abss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id<>0 ");
                                                $abss->execute();
                                                $fabss = $abss->fetchAll();

                                                foreach($fabss as $key => $row7) {
                                                $sum3 = $row7['COUNT(rank_id)'];

                                            $bbss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id<>0 ");
                                                $bbss->execute();
                                                $fbbss = $bbss->fetchAll();

                                                foreach($fbbss as $key => $row8) {
                                                $sum4 = $row8['COUNT(rank_id)'];
                                        ?>
                                        
                                    <tr>
                                       <td><?php echo $row['rank_name']; ?></td>
                                       <td><?php echo $ttotal; ?></td>
                                       <td><?php echo $atotal; ?></td>
                                       <td><?php echo $btotal; ?></td>
                                       <td><?php echo $fttotal; ?></td>
                                       <td><?php echo $ttotal + $atotal + $btotal + $fttotal; ?></td>
                                    </tr>
                                    <?php } } } } } } } } }?>
                                 <tr>
                                     <td>Total</td>
                                     <td><?php echo $sum1; ?></td>
                                     <td><?php echo $sum2; ?></td>
                                     <td><?php echo $sum3; ?></td>
                                     <td><?php echo $sum4; ?></td>
                                     <td><?php echo $sum1 + $sum2 + $sum3 + $sum4; ?></td>
                                 </tr>
                                </tbody>
                                </table>

                            <?php } else { ?>
                                <table id = "example" class = "stripe" cellspacing = "0" >
                                <thead>
                                    <tr>
                                        <th >Academic Rank</th>
                                        <th >UOB</th>
                                        <th >Ecole Normale Supérieure</th>
                                        <th >Institut National des Sciences de l'Organisation</th>
                                        <th >USTM</th>                                  
                                        <th >Total</th>                                  
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                            include('connect.php');
                                            $display = $con->prepare("SELECT * FROM tbl_academic_rank ");
                                                $display->execute();
                                                $fetch = $display->fetchAll(); 
                                                    foreach ($fetch as $key => $row) {
                                                        $rank_id = $row['rank_id'];

                                            $tbs = $con->prepare("SELECT COUNT(*) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id = '$rank_id' ");
                                                $tbs->execute();
                                                $ftbs = $tbs->fetchAll();

                                                foreach($ftbs as $key => $row1) { 
                                               $total = $row1['COUNT(*)'];


                                            $abs = $con->prepare("SELECT COUNT(*) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id = '$rank_id' ");
                                                $abs->execute();
                                                $fabs = $abs->fetchAll();

                                                foreach($fabs as $key => $row2) { 
                                               $total1 = $row2['COUNT(*)'];


                                            $bbs = $con->prepare("SELECT COUNT(*) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id = '$rank_id' ");
                                                $bbs->execute();
                                                $fbbs = $bbs->fetchAll();

                                                foreach($fbbs as $key => $row3) { 
                                               $total2 = $row3['COUNT(*)'];


                                            $fbs = $con->prepare("SELECT COUNT(*) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id = '$rank_id' ");
                                                $fbs->execute();
                                                $ffbs = $fbs->fetchAll();

                                                foreach($ffbs as $key => $row4) { 
                                                $total3 = $row4['COUNT(*)'];

                                            //TOTAL
                                            $tbss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'UOB' AND rank_id<>0 ");
                                                $tbss->execute();
                                                $ftbss = $tbss->fetchAll();

                                                foreach($ftbss as $key => $row5) {
                                                $sum1 = $row5['COUNT(rank_id)'];

                                            $fttbss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'Ecole Normale Supérieure' AND rank_id<>0 ");
                                                $fttbss->execute();
                                                $fftbss = $fttbss->fetchAll();

                                                foreach($fftbss as $key => $row6) {
                                                $sum2 = $row6['COUNT(rank_id)'];

                                            $abss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'Institut National des Sciences de l'Organisation' AND rank_id<>0 ");
                                                $abss->execute();
                                                $fabss = $abss->fetchAll();

                                                foreach($fabss as $key => $row7) {
                                                $sum3 = $row7['COUNT(rank_id)'];

                                            $bbss = $con->prepare("SELECT COUNT(rank_id) FROM tbl_personnel WHERE per_campus = 'USTM' AND rank_id<>0 ");
                                                $bbss->execute();
                                                $fbbss = $bbss->fetchAll();

                                                foreach($fbbss as $key => $row8) {
                                                $sum4 = $row8['COUNT(rank_id)'];
                                        ?>
                                        
                                    <tr>
                                       <td><?php echo $row['rank_name']; ?></td>
                                       <td><?php echo $total; ?></td>
                                       <td><?php echo $total1; ?></td>
                                       <td><?php echo $total2; ?></td>
                                       <td><?php echo $total3; ?></td>
                                       <td><?php echo $total + $total1 + $total2 + $total3; ?></td>
                                    </tr>
                                    <?php } } } } } } } } }?>
                                 <tr>
                                     <td>Total</td>
                                     <td><?php echo $sum1; ?></td>
                                     <td><?php echo $sum2; ?></td>
                                     <td><?php echo $sum3; ?></td>
                                     <td><?php echo $sum4; ?></td>
                                     <td><?php echo $sum1 + $sum2 + $sum3 + $sum4; ?></td>
                                 </tr>
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
                    <label style="text-transform: uppercase;"><strong>{{certified}}</strong></label>
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
    a.download = 'Summary of Faculty profile by Academic_rank_' + postfix + '.xls';
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
