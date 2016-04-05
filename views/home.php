<div class="grid">
    <div class="row cells3">
        <div class="cell">
        	<div class="panel">
			    <div class="heading">
			        <span class="icon mif-profile"></span>
			        <span class="title">Derniers clients</span>
			    </div>
			    <div class="content">
			        <table id="clientTable" class="table striped hovered cell-hovered border bordered">

			        	<thead>
					        <tr>
					            <th class="sortable-column sort-desc">Nom</th>
					            <th class="sortable-column sort-desc">Prenom</th>
					            <th class="sortable-column sort-desc">Entreprise</th>
					            <th class="sortable-column sort-desc">Nombre de facture</th>
					            <th class="sortable-column">More</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>test1</td>
					    		<td>3</td>
					    		<td>1</td>
					    		<td>3</td>
					    		<td class="center"><span class="mif-chevron-right"></span></td>
					    	</tr>
					    	<tr>
					    		<td>aris</td>
					    		<td>2</td>
					    		<td>2</td>
					    		<td>42</td>
					    		<td class="center"><span class="mif-chevron-right"></span></td>
					    	</tr>
					    </tbody>
			        </table>

			        <script>
			        	$(document).ready(function(){
						    $('#clientTable').DataTable();
						});
			        </script>
			    </div>
			</div>
        </div>
        <div class="cell">
        	<div class="panel">
				<div class="heading">
				    <span class="icon mif-bookmarks"></span>
				    <span class="title">Derniers articles</span>
				</div>
				<div class="content">
				    <table id="articleTable" class="table striped hovered cell-hovered border bordered">

			        	<thead>
					        <tr>
					            <th class="sortable-column sort-desc">Nom</th>
					            <th class="sortable-column sort-desc">Prix (CHF)</th>
					            <th class="sortable-column sort-desc">Max en stock</th>
					            <th class="sortable-column sort-desc">Actuellement en stock</th>
					            <th class="sortable-column sort-desc">Catégorie</th>
					            <th class="sortable-column">More</th>

					        </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>test1</td>
					    		<td>3</td>
					    		<td>1</td>
					    		<td>1</td>
					    		<td>1</td>
					    		<td class="center"><span class="mif-chevron-right"></span></td>
					    	</tr>
					    	<tr>
					    		<td>aris</td>
					    		<td>2</td>
					    		<td>2</td>
					    		<td>1</td>
					    		<td>1</td>
					    		<td class="center"><span class="mif-chevron-right"></span></td>
					    	</tr>
					    </tbody>
			        </table>

			        <script>
			        	$(document).ready(function(){
						    $('#articleTable').DataTable();
						});
			        </script>
				</div>
			</div>
        </div>
        <div class="cell">
        	<div class="panel">
			    <div class="heading">
			        <span class="icon mif-clipboard"></span>
			        <span class="title">Dernières factures</span>
			    </div>
			    <div class="content">
			        <table id="factureTable" class="table striped hovered cell-hovered border bordered">
			        	<thead>
					        <tr>
					            <th class="sortable-column sort-desc">Nom Prénom</th>
					            <th class="sortable-column sort-desc">Date</th>
					            <th class="sortable-column sort-desc">Statut</th>
					            <th class="sortable-column sort-desc">Total (CHF)</th>
					            <th class="sortable-column">More</th>

					        </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>test1</td>
					    		<td>3</td>
					    		<td>1</td>
					    		<td>3</td>
					    		<td class="center"><span class="mif-chevron-right"></span></td>
					    	</tr>
					    	<tr>
					    		<td>aris</td>
					    		<td>2</td>
					    		<td>2</td>
					    		<td>42</td>
					    		<td class="center"><span class="mif-chevron-right"></span></td>
					    	</tr>
					    </tbody>
			        </table>

			        <script>
			        	$(document).ready(function(){
						    $('#factureTable').DataTable();
						});
			        </script>
			    </div>
			</div>
        </div>
    </div>
</div>
