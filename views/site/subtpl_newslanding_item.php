<?php
/**
* Displays a summary of a news page.
* This template is called by the news page template to display summaries of news items.
*
* @package Templates
* @author Hoop Associates	www.thisishoop.com	mail@hoopassociates.co.uk
* @copyright 2011, Hoop Associates
*
*/
?>
<li>
	<? 
		// Find the news image associated with the page.
		// This really shouldn't be in the template.
		// But I need to create a general getting slot and related data method to pages.
		// Will do this when I have a better idea what is required - I don't want to make it too specific to this use.
		$image = ORM::factory( 'asset' )
		 		->join( 'chunk_asset', 'inner' )
				->on( 'asset_id', '=', 'asset.id' )
				->join( 'chunk', 'inner' )
				->on( 'chunk.id', '=', 'chunk_asset.chunk_id' )
				->join( 'chunk_page', 'inner' )
				->on( 'chunk.id', '=', 'chunk_page.chunk_id' )
				->where( 'chunk_page.page_vid', '=', $page->version->pk() )
				->where( 'slotname', '=', 'newsheaderimage' )
				->find();
	
		if ($image->loaded()):
			?>
				<div class="first">
					<a href="<?=$page->url();?>" title="<?=$page->title;?>">
						<img src="/get_asset/<?=$images->id?>/120/100/85/0" alt="<?=$image->description?>" />
					</a>
				</div>
				<div class="description">
			<?
		else:
			echo "<div>";
		endif;
	?>

		<h3>
			<a href="<?=$page->url()?>" title="<?=$page->title;?>">
				<?=$page->title?>
			</a>
		</h3>
		<p>
			Date: <?= $page->get_time() ;?>
		</p>
		<p>
			<?= $page->get_slot('text', 'standfirst'); ?>
		</p>
		<p class-"more">
			<a href="<?=$page->url();?>" title="<?=$page->title;?>">Read more &raquo;</a>
		</p>
</li>
