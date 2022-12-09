
<a href="#" data-toggle="modal" data-target="#add_gass_rank">
                                    <span class="print btn-default" style="width: auto;">AJOUTER UNE FONCTION<span>
                                </a><section>
    <div class="modal fade" id="add_gass_rank" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class = "panel panel-primary">
                    <div class = "panel-heading">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Ajouter une Fonction</h4>
                    </div>
                </div>
                <div class="modal-header">
                </div>
                <form action="add_gass_rank_query.php" method="POST">
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">
                        Nom de la Fonction:
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="gass_name" placeholder="Nom de la Fonction" required>
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