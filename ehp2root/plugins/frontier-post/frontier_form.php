<h1><span class="icon-14"></span><b style="font-weight: 600; vertical-align: top">Blog</b> @ The Engineer's Home Page - Write / Edit Blog</h1>
<div class="ehp-pagecontent">
<?php

	//error_log("post_id - f1: ".$post_id);
	
	if ($user_can_edit_this_post)
	{
	
	//echo "Prev cat: ".$frontier_previous_category."<br>";
	
?>	
	<script type="text/javascript">
		var filenames="";
	</script>

	<div class="frontier_post_form"> 

	<table >
	<tbody>
	<form action="" method="post" name="wppu" id="wppu" enctype="multipart/form-data" >
		<input type="hidden" name="home" value="<?php the_permalink(); ?>" > 
		<input type="hidden" name="action" value="wpfrtp_save_post"> 
		<input type="hidden" name="task" value="<?php echo $_REQUEST['task'];?>">
		<input type="hidden" name="parent_cat" value="<?php echo $_REQUEST['parent_cat'];?>">
		<input type="hidden" name="postid" id="postid" value="<?php if(isset($thispost->ID)) echo $thispost->ID; ?>">
	<tr>
		<td>
			<table><tbody>
			<tr>
				<td class="frontier_no_border" style="width: 65%">
					<?php _e("Title", "frontier-post");?><span class="ehp-requiredfield">*</span> :&nbsp;
					<input class="frontier-formtitle"  placeholder="Enter title here" type="text" value="<?php if(!empty($thispost->post_title))echo $thispost->post_title;?>" name="user_post_title" id="user_post_title" onkeyup="checkBlogField()" />			
				</td>
				
				<td  class="frontier_no_border" style="width: 35%; text-align: right;"><?php _e("Status", "frontier-post"); ?>:&nbsp;
				<?php 
				if (count($status_list) <=1)
					{
					$status_name = array_values($status_list);
					$status_value = array_keys($status_list);
					echo $status_name[0];
					?>
					<input type="hidden" id="post_status" name="post_status" value="<?php echo $status_value[0]; ?>"  ></br>
					<?php
					}
				else
					{ ?>
					<select  id="post_status" name="post_status" <?php echo $status_readonly; ?>>
						<?php foreach($status_list as $key => $value) : ?>   
							<option value='<?php echo $key ?>' <?php echo ( $key == $tmp_post_status) ? "selected='selected'" : ' ';?>>
								<?php echo $value; ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php } ?>	
				</td>
				
			</tr>
			</tbody></table>
		</td>	
	</tr><tr>
		<td> 
			<?php
			wp_editor($thispost->post_content, 'user_post_desc', $editor_layout);
			//printf( __( 'Word count: %s' ), '<span class="word-count">0</span>' );
			?>
		</td>
	</tr><tr>
		<td><table><tbody>
		<tr>
		<?php
		if ($category_type != "hide")
			{  
		?>
			<th class="frontier_heading" width="50%">Category<span class="ehp-requiredfield">*</span> :</th>
		<?php 
			}
			if ( current_user_can( 'frontier_post_tags_edit' ) )
				{ ?>
			<th class="frontier_heading" width="50%">Tags<span class="ehp-requiredfield">*</span> :</th>
			<?php } else 
				{ ?>
				  <th class="frontier_heading" width="50%">&nbsp;</th>
			<?php } ?>	  
		</tr><tr>
			<?php
			if ($category_type != "hide")
				{
				?>
				<td class="frontier_border" width="50%">
				<?php
				
				
				if ($category_type == "single")
					{
					wp_dropdown_categories(array('id'=>'cat', 'hide_empty' => 0, 'name' => 'cat', 'child_of' => $parent_category, 'orderby' => 'name', 'selected' => $postcategoryid, 'hierarchical' => true, 'exclude' => $frontier_post_excl_cats, 'show_count' => true)); 
					}
				else
					{
					?>
					<select name="categorymulti[]" id="frontier_categorymulti" multiple="multiple" size="8" onchange="checkBlogField()">
					<?php  
					
					foreach ( $catlist as $category1) : ?>
						<option value="<?php echo $category1['cat_ID']; ?>" <?php if ( $cats_selected && in_array( $category1['cat_ID'], $cats_selected ) ) { echo 'selected="selected"'; }?>><?php echo $category1['cat_name']; ?></option>
					<?php endforeach; ?>
					</select>
					<div class="frontier_helptext ehp-2ndColor"><?php _e("* Multible categories can be selected using CTRL key.<br>&nbsp;&nbsp;If you want a new category, please tell us: <a href='mailto: ehp.dev.team@autodesk.com' style='color: #3793eb'>ehp.dev.team@autodesk.com</a>.", "frontier-post"); ?></div>
					</td>
					<?php 
					} // end multis select 
				} // end hide category 
				?>
				
			<?php if ( current_user_can( 'frontier_post_tags_edit' ) )
				{ ?>
				<td class="frontier_border" width="50%">
					<input placeholder="<?php _e("Enter tag here", "frontier-post"); ?>" type="text" value="<?php if(isset($taglist[0]))echo $taglist[0];?>" name="user_post_tag1" id="user_post_tag" ></br>
					<input placeholder="<?php _e("Enter tag here", "frontier-post"); ?>" type="text" value="<?php if(isset($taglist[1]))echo $taglist[1];?>" name="user_post_tag2" id="user_post_tag" ></br>
					<input placeholder="<?php _e("Enter tag here", "frontier-post"); ?>" type="text" value="<?php if(isset($taglist[2]))echo $taglist[2];?>" name="user_post_tag3" id="user_post_tag" ></br>
                    <div class="frontier_helptext ehp-2ndColor"><?php _e("* Please add at least 1 tag to help people finding your blog quickly.", "frontier-post"); ?></div>
				</td>
			<?php } ?>
		</tr>
		</tbody></table></td>
	</tr><tr>
		<td class="frontier_no_border">
			<?php
			?>
		</td>
	</tr><tr>
		<?php if ( current_user_can( 'frontier_post_exerpt_edit' ) )
				{ ?>
				<td>
					<?php _e("Excerpt", "frontier-post")?>:</br>
					<textarea name="user_post_excerpt" id="user_post_excerpt"  cols="8" rows="2"><?php if(!empty($thispost->post_excerpt))echo $thispost->post_excerpt;?></textarea>
				</td>
				</tr><tr>
		<?php 	} 
		if (get_option("frontier_post_show_feat_img", "false") == "true")
			{
		?>
		<th class="frontier_heading" width="50%"><?php _e("Featured image", "frontier-post"); ?></th>
	</tr><tr>
		<td class="frontier_border" width="50%">
		<?php
			$FeatImgLinkHTML = '<a title="Select featured Image" href="'.site_url('/wp-admin/media-upload.php').'?post_id='.$post_id.'&amp;type=image&amp;TB_iframe=1'.'" id="set-post-thumbnail" class="thickbox">';
			if (has_post_thumbnail($post_id))
				$FeatImgLinkHTML = $FeatImgLinkHTML.get_the_post_thumbnail($post_id, 'thumbnail').'<br>';
				
			$FeatImgLinkHTML = $FeatImgLinkHTML.__("Select featured image", "frontier-post").'</a>';
			
			echo $FeatImgLinkHTML."<br>";
			_e("Featured image (or new featured image) not visible until post is saved", "frontier-post");
			}
		?>
		
		
		</td>
	</tr><tr>
		<td>
			<button class="button ehp-button-disabled" type="submit" name="user_post_save" id="user_post_save" value="save" disabled="disabled">Save</button>
			<button class="button ehp-button-disabled" type="submit" name="user_post_submit" id="user_post_submit" value="savereturn" style="display: none;"><?php _e("Save & Return", "frontier-post"); ?></button>
			<button class="button ehp-button-disabled" type="submit" name="user_post_preview" id="user_post_preview" value="preview" disabled="disabled">Save & Preview</button>
			
			<input type="reset" value="Cancel"  name="cancel" id="cancel" onclick="location.href='<?php the_permalink();?>'">
            <div id="ehp-savenotice" class="frontier_helptext ehp-2ndColor">* Please add the title for your blog and select at least one category.</div>
		</td>
	</tr>
	</form> 
	</tbody>
	</table>

	</div> <!-- ending div -->  
<?php
	}
	else
	{
	_e("<span class='ehp-2ndColor'><i>You are not allowed to edit this post !</i></span>", "frontier-post");
	}
	// end form file
?>
</div>