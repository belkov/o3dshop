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
			<a href="/admin.php?act=Show&class=Title#addForm" class="add-button"><span>Add new Title</span></a>
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
			<h2 class="left">Title</h2>			
		</div>
		<!-- End Box Head -->	

		<!-- Table -->
		<div class="table">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th width="13"><input type="checkbox" class="checkbox" /></th>
					<th>Title</th>
					<!--<th>Keyword</th>
					<th>Description</th>-->
					<th>URI</th>
					<th width="110" class="ac">Content Control</th>
				</tr>
				{foreach from=$page item=elem}
				<tr class="{cycle values="odd,even"}">
					<td><input type="checkbox" class="checkbox" /></td>
					<td>{$elem.title}</td>
					<!--<td>{$elem.keyword}</td>
					<td>{$elem.desc}</td>-->
					<td>{$elem.uri}</td>					
					<td><a href="/admin.php?act=Delete&class=Title&uri={$elem.uri}" class="ico del">Delete</a><a href="/admin.php?act=Show&class=Title&uri={$elem.uri}" class="ico edit">Edit</a></td>
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
			<h2>Add New Title</h2>
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
						<label>Meta title <span>(Required Field)</span></label>
						<input type="text" name="meta_title"" value="{if isset($smarty.post.meta_title)}{$smarty.post.meta_title}{else}{$edit.meta_title}{/if}" class="field size1" />
					</p>
					<p>
						<label>Meta keywords <span>(Required Field)</span></label>
						<input type="text" name="meta_keywords"" value="{if isset($smarty.post.meta_keywords)}{$smarty.post.meta_keywords}{else}{$edit.meta_keywords}{/if}" class="field size1" />
					</p>
					<p>
						<label>Meta Description <span>(Required Field)</span></label>
						<input type="text" name="meta_description"" value="{if isset($smarty.post.meta_description)}{$smarty.post.meta_description}{else}{$edit.meta_description}{/if}" class="field size1" />
					</p>	
					<p>						
						<label>URI <span>(Required Field)</span></label>
						{if isset($smarty.get.uri)}
						{$smarty.get.uri}
						{else}
						<input type="text" name="uri"" value="{if isset($smarty.post.uri)}{$smarty.post.uri}{else}{$edit.uri}{/if}" class="field size1" />
						{/if}
					</p>					
			</div>
			<!-- End Form -->
			
			<!-- Form Buttons -->
			<div class="buttons">		
					<input type="hidden" name="action" value="addPage">		
			
				<input type="submit" class="button" value="submit" />
			</div>
			<!-- End Form Buttons -->
		</form>
	</div>
	<!-- End Box -->

</div>
<!-- End Content -->