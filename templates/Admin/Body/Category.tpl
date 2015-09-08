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
		<div class="table">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th>Title</th>					
				</tr>
				{foreach from=$category item=elem}
				<tr class="{cycle values="odd,even"}">
					<td><h3><a href="/admin.php?act=Show&class=Category&parent_id={$elem.ID}&page=1">{$elem.Category}</a></h3></td>
				</tr>
				{/foreach}				
			</table>			
		</div>
		<!-- Table -->
		
	</div>
	<!-- End Box -->
	
	

</div>
<!-- End Content -->