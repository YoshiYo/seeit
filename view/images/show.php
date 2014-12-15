<div class="row content">
		<div class="large-4 columns">
			Choisissez votre fichier : </br>
			( Attention, photo FishEye attendu )
    </div>
			<h2>Choisissez votre fichier :</h2>
			(Attention, photo FishEye attendu)</br>Si vous avez un écran noir, l'image ne correspond pas aux conditions d'insertion.</br></br>
			<input type="file" id="loaditup" />
		<div id="sphere" style="width: 100%; height: 600px;"></div>

</div>
		
		<script type="text/javascript" src="js/three.min.js"></script>
		<script async="true" onload="setup();" type="text/javascript" src="js/sphere.js"></script>
		<script type="text/javascript">
			function setup(){
				document.getElementById("goForIt").onclick = function(){
					sphere = new Photosphere(this.getAttribute("href"));
					sphere.loadPhotosphere(document.getElementById("sphere"));
					return false;
				};
				document.getElementById("loaditup").addEventListener("change", function(evt){
					 var files = evt.target.files; // FileList object

					// files is a FileList of File objects. List some properties.
					var output = [];
					for (var i = 0, f; f = files[i]; i++) {
						var blob = URL.createObjectURL(f);
						var reader = new FileReader();
						reader.onloadend = function(evt){
							sphere = new Photosphere( blob );
							sphere.binary_data = evt.target.result;
							sphere.loadPhotosphere(document.getElementById("sphere"));
						}
						reader.readAsBinaryString(f);
					}
				});
			}
		</script>