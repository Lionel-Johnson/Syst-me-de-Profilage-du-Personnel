<?php include("header.php"); ?>
<?php
    include ("connect.php");
    $result=$con->prepare("SELECT * FROM tbl_personnel LEFT JOIN tbl_department ON tbl_personnel.dept_id = tbl_department.dept_id WHERE per_id='{$_GET['per_id']}'");
    $result->execute();
    $fetch = $result->fetchall(); 

    foreach ($fetch as $key => $row) {
    $per_id = $row['per_id'];
    $pos_id = $row['pos_id'];
    $dept_id = $row['dept_id'];
    $dept_name = $row['dept_name'];
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
        
            <div class = "panel panel-primary">
                <div class = "panel-heading">
                    <a href="all_campus.php">
                        <button class = "btn btn-default" href="#" style = "float:right;">RETOUR</button>
                    </a>
                    <h4>PROFIL PERSONNEL</h4>
                </div>
            </div>

            <div class="head">
                <img src = "<?php echo $row['per_image']; ?>">
                <LABEL class = "name"><u><?php echo $row['per_lastname'].", ".$row['per_firstname']." ".$row['per_suffix'];?></u></LABEL>
                <span class = "name1"><i>name</i></span>
                <label class = "plantilla"><u><?php echo $row['per_plantilla_no']; ?></u></label>
                <span class = "plantilla1"><i>Numéro Matricule</i></span>
                    <?php 
                        include("connect.php"); 
                        $position1 = $con->prepare("SELECT * FROM tbl_position WHERE pos_id = $pos_id");
                        $position1->execute();
                        while($row1 = $position1->fetch()) {
                    ?>
                <LABEL class = "position"><u><?php echo $row1['pos_name']; ?></u></LABEL>
                <span class = "position1"><i>Position</i></span>
                <?php } ?>
                <LABEL class = "birth"><u><?php echo $row["per_date_of_birth"]; ?></u></LABEL>
                <span class="birth1"><i>Date de  Naissance</i></span>
                    <?php 
                        include("connect.php"); 
                        $department = $con->prepare("SELECT * FROM tbl_department WHERE dept_id = $dept_id");
                        $department->execute();
                        while($row2 = $department->fetch()) {
                    ?>
                <LABEL class = "department"><u><?php echo $row2["dept_name"];?></u></LABEL>
                <span class="department1"><i>Département</i></span>
                    <?php }?>
                <LABEL class = "appointment"><u><?php echo $row['per_date_of_original_appointment']; ?></u></LABEL> 
                <span class="appointment1"><i>Date du 1er RDV</i></span>
                <hr>
            </div>

            <div class="body">
                <LABEL class = "address"><u><?php echo $row['per_address']; ?></u></LABEL>
                <span class = "address1"><i>Adresse</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
                <LABEL class = "address"><u><?php echo $row['per_gender']; ?></u></LABEL>
                <span class = "address1"><i>Genre</i></span>
                <label class = "gender"><u><?php echo $row['per_status']; ?></u></label>
                <span class = "gender1"><i>Statut</i></span>
                <LABEL class = "status"><u><?php echo $row['per_designation']; ?></u></LABEL>
                <span class = "status1"><i>Désignation</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
                <LABEL class = "address"><u><?php echo $row['per_place_of_birth']; ?></u></LABEL>
                <span class = "address1"><i>Lieu de Naissance</i></span>
                <label class = "gender"><u><?php echo $row['per_eligibility']; ?></u></label>
                <span class = "gender1"><i>Eligibilité</i></span>
                <LABEL class = "status"><u><?php echo $row['per_contact_no']; ?></u></LABEL>
                <span class = "status1"><i>Numéro de Téléphone</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
                <LABEL class = "address"><u><?php echo $row['per_tin_no']; ?></u></LABEL>
                <label class = "gender"><u><?php echo $row['per_gsis_bp_no']; ?></u></label>
                <span class = "gender1"><i>B.P N°</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
                <LABEL class = "address"><u><?php echo $row['bs_name']; ?></u></LABEL>
                <span class = "address1"><i>Licence</i></span>
                <label class = "gender"><u><?php echo $row['bs_year']; ?></u></label>
                <span class = "gender1"><i>Année</i></span>
                <LABEL class = "status"><u><?php echo $row['bs_school']; ?></u></LABEL>
                <span class = "status1"><i>Etablissement</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
                <LABEL class = "address"><u><?php echo $row['ms_name']; ?></u></LABEL>
                <span class = "address1"><i>Maîtrise</i></span>
                <label class = "gender"><u><?php echo $row['ms_year']; ?></u></label>
                <span class = "gender1"><i>Année</i></span>
                <LABEL class = "status"><u><?php echo $row['ms_school']; ?></u></LABEL>
                <span class = "status1"><i>Etablissement</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
            <LABEL class = "address"><u><?php echo $row['ms_name']; ?></u></LABEL>
                <span class = "address1"><i>Doctorat</i></span>
                <label class = "gender"><u><?php echo $row['ms_year']; ?></u></label>
                <span class = "gender1"><i>Année</i></span>
                <LABEL class = "status"><u><?php echo $row['ms_school']; ?></u></LABEL>
                <span class = "status1"><i>Etablissement</i></span>
                <hr>
                <br>
                <br>
            </div>

            <div class="body">
            <LABEL class = "address"><u><?php echo $row['ms_name']; ?></u></LABEL>
                <span class = "address1"><i>Autre Niveau</i></span>
                <label class = "gender"><u><?php echo $row['ms_year']; ?></u></label>
                <span class = "gender1"><i>Année</i></span>
                <LABEL class = "status"><u><?php echo $row['ms_school']; ?></u></LABEL>
                <span class = "status1"><i>Etablissement</i></span>
                <hr>
                <br>
                <br>
            </div>
        </div>

    </div>
</section>
<?php } ?>
<?php 
include("script.php");
?>