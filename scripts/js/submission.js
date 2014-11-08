	function loginForm() {
	 $.ajax( {
			type: 'POST',
			url: './scripts/process.php',
			data: $('#login').serialize(),
			success: function(data) {
				$('#return').html(data);
			}
		} );
	}

	function signupForm() {
		console.log('in signup function');
	 $.ajax( {
			type: 'POST',
			url: './scripts/process.php',
			data: $('#signup').serialize(),
			success: function(data) {
				$('#return2').html(data);
			}
		} );
	}

	function addRepoForm() {
	 $.ajax( {
			type: 'POST',
			url: './scripts/process.php',
			data: $('#addRepo').serialize(),
			success: function(data) {
				$('#return3').html(data);
			}
		} );
	}
