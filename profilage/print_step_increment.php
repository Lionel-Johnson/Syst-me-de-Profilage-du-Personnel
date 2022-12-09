<link rel="stylesheet" type="text/css" href="css/style1.css">
<button onclick="printContent('print')">Imprimer le Contenu</button>
<a href="retirement_table.php">Retour</a>
	<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtre">
	<div id="print">
		<div style = "margin:10px;">	<br />		
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
			<center>
				<table id = "example" class = "stripe order-table" cellspacing = "0" >
                               <thead>
                                    <tr>
                                        <td>Nom</td>>
                                        <td>Date du 1er RDV</td>
                                        <td>Loyauté </td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include('connect.php');
                                    $display = $con->prepare("SELECT * FROM tbl_personnel ORDER BY per_id ASC");
                                    $display->execute();
                                    $fetch = $display->fetchAll();
                                    

                                    foreach($fetch as $key => $row) { 
                                    $appointment = $row["per_date_of_original_appointment"];
                                    $date = new DateTime($appointment);
                                    $now = new DateTime();

                                    $difference = $date->diff($now)->format('%y Year(s) ,%m month(s)');
                                    ?>

                                        <td><?php echo $row['per_lastname'] .", ". $row['per_firstname'] ." " .$row['per_suffix']  ?></td>
                                        <td><?php echo $row['per_date_of_original_appointment']; ?></td>
                                        <td><b>
                                        <?php 
                                         if($difference % 3 == 0)  {
                                                echo $difference;
                                            }
                                       elseif ($difference % 5 == 0) {
                                                echo "BY5";
                                            }
                                         ?>
                                         </b></td>
                                    </tr>                                     
                                     <?php 
                                     }?>
                                </tbody>
                            </table>

			</center>
			<div class="noted">
			<label>Preparé par:</label>
			<br>
			<br>
			<strong><input type="text" name=""></strong>
			<br>
			<input type="text" name="">
			</div>
			
		</div>
	</div>
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