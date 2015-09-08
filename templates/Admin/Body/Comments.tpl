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
			<h2 class="left">Comments</h2>			
		</div>
		<!-- End Box Head -->	

		<!-- Table -->
		<div class="table">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th>Name</th>
					<th>Comments</th>
					<th width="110" class="ac">Content Control</th>
				</tr>
				{foreach from=$comments item=elem}
				<tr class="{cycle values="odd,even"}">
					<td><h3><a href="#">{$elem.Name}</a></h3></td>
					<td><a href="{$elem.uri}" target="_blank">{$elem.Comments}</a></td>					
					<td>
					
					<a href="/admin.php?act=Delete&class=Comments&id={$elem.ID}&page={$smarty.get.page}" class="ico del">Delete</a>
					<a href="/admin.php?act=Approve&class=Comments&id={$elem.ID}&page={$smarty.get.page}" class="ico edit">Approve</a>
					</td>
				</tr>
				{/foreach}				
			</table>			
		</div>
		
		
		
		<!-- Table -->
		
	</div>
	<!-- End Box -->
	
	<div class="box">
		<!-- Box Head -->
		<div class="box-head">
			<h2 class="left">Approve Comments</h2>			
		</div>
		<!-- End Box Head -->	

		<!-- Table -->
		<div class="table">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th>Name</th>
					<th>Comments</th>
					<th width="110" class="ac">Content Control</th>
				</tr>
				{foreach from=$approve item=elem}
				<tr class="{cycle values="odd,even"}">
					<td><h3><a href="#">{$elem.Name}</a></h3></td>
					<td><a href="{$elem.uri}" target="_blank">{$elem.Comments}</a></td>					
					<td>
					
					<a href="/admin.php?act=Delete2&class=Comments&id={$elem.ID}&page={$smarty.get.page}" class="ico del">Delete</a>
					
					</td>
				</tr>
				{/foreach}				
			</table>			
		</div>
		
		
		
		<!-- Table -->
		
	</div>
	
	

</div>
<!-- End Content -->