/**
 * 
 */	
		$('#index #offresIndex').bind('change',function(){
			window.open("http://localhost/as_plus/Demande.php","_self");
		});
		
		//Event lors de l'ajout d'images
		$('#demande #userImages').bind('change', function() {
			
			//la div ou les images seront affichées
			var preview = document.querySelector('.imageSelectionner');
			
			// vider le contenu de la div
			while(preview.firstChild) {
	            preview.removeChild(preview.firstChild);
	          }
			
			//On récupère l'objet FileList qui contient les informations sur les fichiers sélectionnés
			var input = document.getElementById('userImages');
			var curFiles = input.files;
			if(curFiles.length == 0){
				var para = document.createElment('p');
	            para.textContent = 'Aucun fichier sélectionné pour le moment';
	            preview.appendChild(para);	         
			}
			else{
				var list = document.createElement('ul');
				preview.appendChild(list);
				
				for(var i = 0;i < curFiles.length;i++){
					//liste qui contiendra les images
					var listItem = document.createElement('li');
					
					//paragraphe qui contiendra le nom des fichiers
					var para = document.createElement('p');

					if(validFileType(curFiles[i])){
						para.textContent = 'Nom du fichier : '+curFiles[i].name;
						var image = document.createElement('img');
						image.src = window.URL.createObjectURL(curFiles[i]);
						
						listItem.appendChild(image);
						listItem.appendChild(para);
						
					}else{
						para.textContent = "Nom du fichier "+curFiles[i].name+" n'est pas au format valide. Veuillez saisir une image au format (PNG, JPG, JPEG).";
						listItem.appenChild(para);
					}
					list.appendChild(listItem);
				}
			}
		});
		
		//tableau contenant les extensions valables
		var fileTypes = [
			  'image/jpeg',
			  'image/pjpeg',
			  'image/png'
			]
		
		//Valide le format d'image choisit par l'utilisateur
		function validFileType(file){
			for(var i = 0;i < fileTypes.length; i++){
				if(file.type === fileTypes[i]){
					return true;
				}
			}
			return false;
		}	
		
		//On récupère les données du formulaire
		$('#demande #btnDemande').bind('click',function(e){	
			
				//formulaire des demande de devis
				var form = document.getElementById('formDemande');
				
				//Objet filelist
				var photos = document.getElementById('userImages').files;
				
				var formData = new FormData(form);
				
				for(var i = 0; i < photos.length;i++){
					formData.append("photos[]",photos[i]);
				}
				
				var service = [];
				$.each($('input[name="service[]"]:checked'),function(){
					service.push($(this).val());
				});
				
				console.log(photos);
				formData.append('service[]',service);
				
				console.log(photos);
				//Requète ajax
				$.ajax({
					url: "ajax/traiterDemande.php",
					dataType: 'json',
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(data){	
						if(data.status === false){
							$("#demande #message").css({color:'red'});
							$("#demande #message").html(data.message);
						}else{
							$("#demande #message").css({color:'green'});
							$("#demande #message").html(data.message);
						}		          							
					},
					error: function(){
						$("#demande #message").css({color:'red'});
						$("#demande #message").html("Erreur d'envoie de votre demande, réssayez s'il vous plait.");
					}
				});
		});
	
	
		//Remplissage dynamique du champ commune par fichier json
		function getVille(jsonResult){
			let select = document.getElementById("commune");
			let option;
			for(var i = 0; i < 33; i++){
				option = document.createElement('option');
				option.text = jsonResult.cities[i].city;
				option.value = jsonResult.cities[i].city;
				select.add(option);
			}	
		}
		