<!doctype html>
<html>
	<head>
		<title>Add TinyMCE to HTML element in CodeIginter</title>
		<!-- TinyMCE script -->
		<script src='<?= base_url() ?>resources/tinymce/tinymce.min.js'></script>
		<style>
			body {
				padding-top:10px;
			}
		</style>
	</head>
	<body>
	 
	   <div class="q-body">
			<!-- Form -->
			<!--<textarea name="" id="" cols="30" rows="10"></textarea>
            <input name="image" type="file" id="upload" class="hidden" onchange=""> -->
			<?php 
			  $id = $_GET['q_id'];
			  $url = "/Answer_Controller/add_answer?id=".$id;
			  echo form_open($url); 
			?>
				<!-- Textarea -->
				<?php 
				$data = array(
				'name'        => 'content',
				'id'          => 'content',
				'value'       => set_value('content'),
				'rows'        => '5',
				'style'       => 'width:100%',
				'class'       => 'editor',
			  );

			  echo form_textarea($data);
			
				$data = array(
				'type' => 'submit',
				'value'=> 'Submit Answer',
				'class'=> 'btn btn-primary',
				'name' => 'submit',
				'id'   => 'my_form_id'
				);
				?>
				<input name="image" type="file" id="upload" class="hidden" onchange="">
				</br>
				<?php
				echo form_submit($data);
			   echo form_close();
			    ?>
       </div>
		<script>		

				$(document).ready(function() {
			  tinymce.init({
				selector: '.editor',
				theme: "modern",
				height: 200,
				paste_data_images: true,
				plugins: [
				  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
				  "searchreplace wordcount visualblocks visualchars code fullscreen",
				  "insertdatetime media nonbreaking save table contextmenu directionality",
				  "emoticons template paste textcolor colorpicker textpattern"
				],
				toolbar: "link",
				toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
				toolbar2: "print preview media | forecolor backcolor emoticons",
				image_advtab: true,
				file_picker_callback: function(callback, value, meta) {
				  if (meta.filetype == 'image') {
					$('#upload').trigger('click');
					$('#upload').on('change', function() {
					  var file = this.files[0];
					  var reader = new FileReader();
					  reader.onload = function(e) {
						callback(e.target.result, {
						  alt: ''
						});
					  };
					  reader.readAsDataURL(file);
					});
				  }
				},
				templates: [{
				  title: 'Test template 1',
				  content: 'Test 1'
				}, {
				  title: 'Test template 2',
				  content: 'Test 2'
				}]
			  });
			});
		</script>
	</body>
</html>