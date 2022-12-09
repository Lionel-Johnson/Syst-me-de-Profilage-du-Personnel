<section>
    <div class="modal fade" id="add_department" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class = "panel panel-primary">
                    <div class = "panel-heading">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>AJOUTER UN DEPARTEMENT</h4>
                    </div>
                </div>
                <form action="add_department_query.php" method="POST">
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">
                            Nom du Département:
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="dept_name" placeholder="Nom du Département" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-lg" name = "save">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
