<div id="main">
	<select class="country">
		<?php
			foreach ($data as $value) {?>
				<option value="<?php echo $value['country_code'].'.'.$value['country_id']?>"><?php echo $value['country']; ?></option>
			<?php }
		?>
	</select>
	<input type="text" class="zipCode">
	<button id="submit">Submit</button>
	<div id="places"></div>
</div>
