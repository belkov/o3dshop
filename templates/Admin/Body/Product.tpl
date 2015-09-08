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
			<h2 class="left">Category & Product</h2>			
		</div>
		<!-- End Box Head -->	

		<!-- Table -->
		<form method="POST">
		<div class="table">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Number</th>
					<th width="110" class="ac">Content Control</th>
				</tr>
				{foreach from=$product item=elem}
				<tr class="{cycle values="odd,even"}">					
					<td><img src="{$elem.Image_2}"></td>
					<td><h3>{$elem.Product_Name}</h3>
					{if isset($elem.HOT)}
					<b>Category Hot: </b> {$elem.HOT}
					{/if}
					
					{if $elem.NEW == 1}
					<span style="color:red;"><strong>NEW PRODUCT</strong></span>
					{/if}
					
					</td>
					<td>{$elem.Product_Number}</td>
					<td><a href="/admin.php?act=Show&class=Category&parent_id={$smarty.get.parent_id}&id_product={$elem.ID}&page={$smarty.get.page}#addForm" class="ico edit">Edit</a></td>
				</tr>
				{/foreach}				
			</table>	
			<!-- Pagging -->
			<div class="pagging">
				<div class="left">
					<!--<input type="submit" name="b1" class="button" style="border:1px solid #D5D5D5;" value="New products">-->
				</div>
				{$paginator}
			</div>
						<!-- End Pagging -->
		</div>
		</form>
		<!-- Table -->
		
	</div>
	<!-- End Box -->
	{if isset($item.Product_Name)}
	<!-- Box -->
	<div class="box">
	<a id="addForm"></a>
		<!-- Box Head -->
		<div class="box-head">
			<h2>Add New Page</h2>
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
						<label>Product_Name <span>(Required Field)</span></label>
						{$item.Product_Name}
					</p>
					<p>
						<label>NEW PRODUCTS <span>(Required Field)</span></label>
						<input type="checkbox" name="new_product" value="1" {if $item.NEW == 1}checked{/if}>
					</p>	
					<p>
						<label>Hot Category Name <span>(Required Field)</span></label>
						<select name="Category_ID">
						<option value="0">...</option>
						{foreach from=$hot item=elem}
							<option {if $elem.ID == $item.HOT} selected {/if} value="{$elem.ID}">{$elem.Name}</option>
						{/foreach}
						</select>
					</p>
					<p>						
						<label>Content <span>(Required Field)</span></label>
						<textarea class="field size1" name="description" rows="10" cols="30">{if isset($smarty.post.text)}{$smarty.post.text}{else}{$item.description}{/if}</textarea>
					</p>	
				
			</div>
			<!-- End Form -->
			
			<!-- Form Buttons -->
			<div class="buttons">		
					<input type="hidden" name="action" value="editProduct">		
			
				<input type="submit" class="button" value="submit" />
			</div>
			<!-- End Form Buttons -->
		</form>
	</div>
	{/if}
	<!-- End Box -->

</div>
<!-- End Content -->
