
<div class="login-section">
		<div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
		    <div class="column" id="content-login-regis">
		        

		        <p class="ui header">Silahkan masuk ke dalam akun kamu</p>
		        <br>
			       
					        <div class="ui form">
					            <div class="two fields">
					            	<div class="field">
					            		<input type="email" name="user" placeholder="E-mail" id="txtEmail">
					            	</div>
					            	<div class="field">
					                	<input type="password" name="password" placeholder="Password" id="txtPassword">
					            	</div>					                
					            </div>
					         
					       
					            
					            <br>
					            <div class="inline fields">
					                <div class="field">
									    <div class="ui checkbox">
									      <input type="checkbox" tabindex="0" class="hidden">
									      <label>Ingat Saya</label>
									    </div>
									  </div>
					            </div>
					            <br>
					            <button class="ui fluid green button" value="Masuk" id="btnLogin">Login</button>
					            <br>
					            <a>Lupa Password?</a>
					        </div>
					  			
			        

					        <br>
					        <div class="ui horizontal divider">Atau</div>
						        <br>
						        <button class="ui facebook button"><i class="facebook icon"></i>Masuk dengan Facebook</button>
						        <br><br><br>
						        <button class="ui google plus button" id="login_google"><i class="google icon"></i>Masuk dengan Google</button>
						        <br>
						        <br>
						        <p>Belum punya akun? <a href="?p=register">Daftar Sekarang</a></p>
						        <br>


						     <form style="display: none;" id="form_helper" method="post">
						     	<input type="text" name="uid" id="user_id">
						     	<input type="text" name="email" id="user_email">
						     	<input type="text" name="p" id="p">
						     	<input type="text" name="method" id="method">
						     </form>

		    </div>
		</div>
</div>
<script type="text/javascript" src="js/login.js"></script>
<script>
$('.ui.checkbox').checkbox();
</script>