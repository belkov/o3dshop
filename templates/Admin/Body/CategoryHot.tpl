<!-- Sidebar -->
<div id="sidebar">
	
	<!-- Box -->
	<div class="box">
		
		<!-- Box Head -->
		<div class="box-head">
			<h2>Management</h2>
		</div>
		<!-- End Box Head-->
		
		<div class="box-content">
			<a href="/admin.php?act=Show&class=CategoryHot#addForm" class="add-button"><span>Add new Category Hot</span></a>
			<div class="cl">&nbsp;</div>	
		</div>
	</div>
	<!-- End Box -->
</div>
<!-- End Sidebar -->

<!-- Content -->
<div id="content">
	
	<!-- Box -->
	<div class="box">
		<!-- Box Head -->
		<div class="box-head">
			<h2 class="left">Category Hot</h2>			
		</div>
		<!-- End Box Head -->	

		<!-- Table -->
		<div class="table">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th>Title</th>					
					<th width="110" class="ac">Content Control</th>
				</tr>
				{foreach from=$category item=elem}
				<tr class="{cycle values="odd,even"}">
					<td><h3>{$elem.Name} - <a href="/admin.php?act=Show&class=CategoryHot&parent_id={$elem.ID}">view all product</a></h3></td>
					<td>
					<a href="/admin.php?act=Delete&class=CategoryHot&id={$elem.ID}" class="ico del">Delete</a>
					<a href="/admin.php?act=Show&class=CategoryHot&id_product={$elem.ID}#addForm" class="ico edit">Edit</a>
					</td>
				</tr>
				{/foreach}				
			</table>			
		</div>
		<!-- Table -->
		
	</div>
	<!-- End Box -->
	
	<!-- Box -->
	<div class="box">
	<a id="addForm"></a>
		<!-- Box Head -->
		<div class="box-head">
			<h2>Add New Category Hot</h2>
		</div>
		<!-- End Box Head -->
		
		<form action="" method="post">
			
			<!-- Form -->
			{if count($error) != 0}
			<div class="msg msg-error">
				<p><strong>
				{foreach from=$error item=elem}
				{$elem}<br/>
				{/foreach}
				</strong></p> 
			</div>
			{/if}
			{if $succsess != ''}
			<div class="msg msg-ok">
				<p><strong>{$succsess}</strong></p>
			</div>
			{/if}
			
			<div class="form">
					<p>
						<label>Category Name <span>(Required Field)</span></label>
						<input type="text" name="name" value="{if isset($smarty.post.name)}{$smarty.post.name}{else}{$category_edit.Name}{/if}" class="field size1" />
					</p>						
			</div>
			<!-- End Form -->
			
			<!-- Form Buttons -->
			<div class="buttons">					
					
					{if isset($category_edit.ID)}
						<input type="hidden" name="ID" value="{$category_edit.ID}">		
					{else}
						<input type="hidden" name="action" value="addCategory">		
					{/if}
					
				<input type="submit" class="button" value="submit" />
			</div>
			<!-- End Form Buttons -->
		</form>
	</div>
	<!-- End Box -->

</div>
<!-- End Content -->