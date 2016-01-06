 $(document).ready(function() {
    $('select').material_select();
  });
 
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  
  });

function checkforblank(){
	
	if (document.getElementById('username').value==""){
		Materialize.toast('Please type your username  ', 4000);
		return false;
	}

	if(document.getElementById('password').value==""){
		  Materialize.toast('Please type your password', 4000);
		return false;
	}
	if(document.getElementById('sex').value==""){
		  Materialize.toast('Please choose SEX', 4000);
		return false;
	}
	
	
}     
        