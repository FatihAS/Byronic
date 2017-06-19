	const btnLoginH = document.getElementById("btnLoginHeader");
	const btnRegisterH = document.getElementById("btnRegisterHeader");
	const btnLogoutH = document.getElementById("btnLogoutHeader");
	const btnAccountH = document.getElementById("btnAccountHeader");
	const form = document.getElementById("form_helper");
	const login = document.getElementById("login_helper");


	firebase.auth().onAuthStateChanged(function(user) {
	  if (user) {
	    // User is signed in	    
	    if(form != null){
		    document.getElementById("user_id").value = ""+user.uid;
		    document.getElementById("user_email").value = ""+user.email;
		    document.getElementById("method").value = "send_uid";
		    document.getElementById("p").value = "home";
		    form.submit();
	    }

	    if(login != null){
	    	document.getElementById("uid").value = ""+user.uid;
	    	document.getElementById("user_email").value = ""+user.email;
	    	document.getElementById("method").value = "send_uid";
	    	login.submit();

	    }
		// btnLoginH.style.display = "none";
		// btnRegisterH.style.display = "none";
		// btnLogoutH.style.display = "block";
		// btnAccountH.style.display = "block";
	  } else {
	    // No user is signed in.
	    console.log('not logged in');
		// btnLoginH.style.display = "block";
		// btnRegisterH.style.display = "block";
		// btnLogoutH.style.display = "none";
		// btnAccountH.style.display = "none";
	  }
	});

	btnLogoutH.addEventListener('click', e => {
		firebase.auth().signOut().then(function() {
		  // Sign-out successful.
		}).catch(function(error) {
		  // An error happened.
		});
	});
