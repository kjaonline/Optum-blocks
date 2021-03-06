<?php
	header("Access-Control-Allow-Origin: *");
?>

<form class="submit-volunteer">
	<div class="checkboxes">
		<div class="check-hold">
			<h1>Please check one of<br> the following boxes. <br>I’d like to …</h1>

			<div class="options">
				<div>
					<input type="checkbox" id="option1" name="option_fundraiser">
					<label class="option1label" for="option1">Host a fundraiser</label>
				</div>

				<div>
					<input type="checkbox" id="option2" name="option_door">
					<label class="option2label" for="option2">Go door to door</label>
				</div>

				<div>
					<input type="checkbox" id="option3" name="option_bumper">
					<label class="option3label" for="option3">Sport a bumper sticker</label>
				</div>

				<div>
					<input type="checkbox" id="option4" name="option_yard_sign">
					<label class="option4label" for="option4">Display a yard sign</label>
				</div>

				<div>
					<input type="checkbox" id="option5" name="option_poll">
					<label class="option5label" for="option5">Work an election day poll</label>
				</div>

				<div>
					<input type="checkbox" id="option6" name="option_editor">
					<label class="option6label" for="option6">Write a letter to an editor</label>
				</div>
			</div>
		</div>
	</div>

	<div class="standard-form">
		<div class="right">
			<input type="text" name="first_name" placeholder="First Name" required>
			<input type="text" name="last_name" placeholder="Last Name" required>
			<input type="text" name="email" placeholder="Email">

			<input type="text" name="phone" placeholder="Phone Number">

			<input type="text" name="address" placeholder="Street Address" required>

			<div class="split-3">
				<input type="text" name="city" placeholder="City" required>
				<input type="text" name="state" placeholder="State" required>
				<input type="text" name="zip" placeholder="Zip" required>
			</div>

			<textarea name="comment" placeholder="Comments, Other Ideas, etc."></textarea>
		</div>
	</div>
	<div class="buttons">
		<button class="volunteer-submit" type="submit">Sign Up</button>
	</div>
</form>