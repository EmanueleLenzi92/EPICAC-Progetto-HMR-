
function printTinymce(){
	var string=
	"<script type='text/javascript' >" +
		"tinymce.init({" +
		"forced_root_block : ''," +
		"force_br_newlines : true," +
		"force_p_newlines : false," +
		"selector: 'textarea'," +
		"height: 100," +
		"theme: 'modern'," +
		"plugins: [" +
		"'link charmap'," +
		"'code'" +
		"]," +
		"toolbar1: 'undo redo | bold italic |  link image'," +
		"image_advtab: true," +
		"templates: [" +
		"{ title: 'Test template 1', content: 'Test 1' }," +
		"{ title: 'Test template 2', content: 'Test 2' }" +
		"]," +
		"content_css: [" +
		"'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'," +
		"'//www.tinymce.com/css/codepen.min.css'" +
		"]" +
		"});" +
	"</script >"
	
	
	$("head").append(string);
}

function confirmTitleSubtitle(){
	
	//recupero id campo passato con querystring
	var ur = window.location.href
	nodo= ur.split('?')[1].split('=')[1];
	
	//copio valore nel campo del php form con id passato con querystring
	tinyMCE.triggerSave();
	var res= $('#testoTextArea').val();
	window.opener.document.forms['formAccadimento'].elements[nodo].value= res
	
	
	if (nodo== "titoloAccadimento"){
	window.opener.document.forms['formAccadimento'].elements['titoloCrono'].value= res    
	window.opener.document.forms['formAccadimento'].elements['titoloPgDedicata'].value= res	
	window.opener.document.forms['formAccadimento'].elements['titoloEventi'].value=	res
	window.opener.document.forms['formAccadimento'].elements['titoloRiferimenti'].value= res
	}
	
	if (nodo=="sottotitoloAccadimento"){
	window.opener.document.forms['formAccadimento'].elements['sottotitoloPgDedicata'].value= res 
	window.opener.document.forms['formAccadimento'].elements['sottotitoloCrono'].value= res 
	window.opener.document.forms['formAccadimento'].elements['sottotitoloEventi'].value= res 
	 
	}
	
	close();
}


function openTitleSubtitle(idInput){
	
	//var a= parent.document.getElementById('titoloAccadimento').value
	
	//var handle = window.open("","" ,"scrollbars=1,resizable=1,height=350,width=700");
	window.open("editTitleSubt.html?var=" + idInput +  "" , "" , "scrollbars=1,resizable=1,height=350,width=700");
	
	/*handle.document.write(
	'<html>' +
	'<head>' +
	'<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>' +
	'<script type="text/javascript" src="../JSadmin/editTitleSubtitle.js" ></script >' +
	'<script type="text/javascript" src="../Libs/tinymce/js/tinymce/tinymce.js" ></script >' +
	
	"<script type='text/javascript' > tinymce.init({ selector: 'textarea', height: 100, theme: 'modern', plugins: [ 'link charmap', 'code' ], toolbar1: 'undo redo | bold italic |  link image', image_advtab: true,  templates: [ { title: 'Test template 1', content: 'Test 1' }, { title: 'Test template 2', content: 'Test 2' } ], content_css: [ '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i', '//www.tinymce.com/css/codepen.min.css'] }); </script>" +                        
	
	'</head>' +
	'<body>' +
		'<textarea id="testoTextArea" name="testoTextArea">' + a + '</textarea>' +
		'<input type="button" value="Conferma" onclick= confirmTitleSubtitle()>' +
		'<div id="ciao"><script>tynimce()</script></div>' +
	'</body>' +
	'</html>'
	);*/
	


}

