		<footer class="footer">
			<div class="social-media">
				<ul class="flex">
					<li><a href="javascript:;" target="_blank"><i class="fa-brands fa-instagram"><span>Instagram</span></i></a></li>
					<li><a href="javascript:;" target="_blank"><i class="fa-brands fa-facebook"><span>Facebook</span></i></a></li>
					<li><a href="javascript:;" target="_blank"><i class="fa-brands fa-twitter"><span>Twitter</span></i></a></li>
					<li><a href="javascript:;" target="_blank"><i class="fa-brands fa-discord"><span>Discord</span></i></a></li>
				</ul>
			</div>
			<nav class="bottomnav">
				<ul class="flex">
					<li class="dhome"><a href="index.php">Let&rsquo;s Play!</a></li>
					<ul class="section-left">
						<ul class="account">
							<li class="daccount"><a href="profile.php">Your Account</a></li>
							<li class="dcontact"><a href="index.php#contact">Contact Us</a></li>
						</ul>
						<ul class="support">
							<li class="dsupport"><a href="javascript:;" target="_blank" title="opens in a new window">Support</a></li>
							<li class="dabout"><a href="index.php#about">About</a></li>
							<li class="dreport"><a href="javascript:;" target="_blank" title="opens in a new window">Report</a></li>
						</ul>
					</ul>
					<ul class="section-right">
						<ul class="browse">
							<li class="dbrowse"><a href="index.php#browse">Browse</a></li>
							<li class="dgames"><a href="browse.php">Games</a></li>
							<li class="dgames"><a href="javascript:;">GMs</a></li>
						</ul>
						<ul class="policy">
							<li class="dpolicy"><a href="javascript:;" target="_blank" title="opens in a new window">Policy</a></li>
							<li class="dprivacy"><a href="javascript:;" target="_blank" title="opens in a new window">Privacy</a></li>
							<li class="dtos"><a href="includes/tos.html" target="_blank" title="opens in a new window">Terms of Service</a></li>
						</ul>
					</ul>
					<li class="dhome logo-lg"><a href="index.php">Home</a></li>
				</ul>
			</nav>
			<p>&copy; Copyright Adoni Torres 2022</p>
		</footer>
	</div>
	<?php include( ROOT_DIR . '/includes/debug-output.php'); ?>

<?php if( $logged_in_user ){ ?>
	<script type="text/javascript">
		//like unlike
		document.body.addEventListener( 'click', function(e){
			if(e.target.className == 'heart-button'){
				//console.log(e.target.dataset.postid);
				likeUnlike( e.target );
			}
		} );

		async function likeUnlike( el ){
			let postId = el.dataset.postid;
			let userId = <?php echo $logged_in_user['user_id']; ?>;
			//get the parent container so we can update the interface later
			let container = el.closest('.likes');

			let formData = new FormData();
							//name    value
			formData.append( 'postId', postId );
			formData.append( 'userId', userId );

			let response = await fetch( 'fetch-handlers/like-unlike.php', {
				method : 'POST',
				body: formData
			} );
			//feedback
			if(response.ok){
				let result = await response.text();
				container.innerHTML = result;
			}else{
				console.log(response.status);
			}
		}
	</script>

	<script type="text/javascript">
		//Follow interaction
		document.body.addEventListener( 'click', function(e){
			if(e.target.classList.contains('follow-button')){
				follow(e.target);
			}
		} );

		async function follow( el ){
			let to = el.dataset.to;
			console.log(to);

			let data = new FormData();
			data.append( 'to', to );

			let response = await fetch( 'fetch-handlers/follow.php', {
				method : 'POST',
				body: data
			});
			if( response.ok ){
				let output = await response.text();
				//update the container div
				document.getElementById('follow-info').innerHTML = output;
			}else{
				console.log(response.status);
			}
		}
	</script>
<?php }  //end if logged in ?>
</body>
</html>