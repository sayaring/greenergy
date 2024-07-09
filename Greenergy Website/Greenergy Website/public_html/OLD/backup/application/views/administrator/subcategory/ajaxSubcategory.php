<?php
if (!empty($subCategoryList)) {
	foreach ($subCategoryList as $value) {
		?>
<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
<?php
}
} else {
	?>
<option value="">Not Found</option>
<?php
}
?>