<?php
$post_type = 'post';

if(isset($_GET['post_type'])){
	$post_type = $_GET['post_type'];
}
?>
<div id="form-template" class="hidden">
	<div id="form-template-inner">
		<form class="formClass repeater" method="POST">
			<div data-repeater-list="add-buld">
				<div data-repeater-item>
					<input type="text" name="title" placeholder="Title" />
					<input data-repeater-delete type="button" value="Delete"/>
				</div>
				<div data-repeater-item>
					<input type="text" name="title" placeholder="Title" />
					<input data-repeater-delete type="button" value="Delete"/>
				</div>
			</div>
			<input data-repeater-create type="button" value="Add More"/>
			<input type="submit" value="Submit"/>
			<input type="hidden" value="<?php echo $post_type; ?>" name="type" />
			<?php wp_nonce_field( 'infinite-bulk-add-action', 'infinite-bulk-add-field' ); ?>
		</form>
	</div>
</div>
