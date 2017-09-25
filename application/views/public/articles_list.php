<?php include('header.php')?>
<div class="container">
	<h2>All Articles</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created On</th>
			</tr
		</thead>
		<tbody>
			<?php if(count($articles)):
				$i=$this->uri->segment(3,0);;
				foreach ($articles as $value):?>
					<tr>
						<td><?php echo ++$i;?></td>
						<td class="text-nowrap"><?=anchor("user/articles/".$value['id'],$value['title'])?></td>
						<td class="text-nowrap"><?php echo date('Y-m-d',strtotime($value['created_on']));?></td>
					</tr>
			<?php endforeach;?>
			<?php else:?>
				<tr>
					<td colspan="3">No record found</td>
				</tr>
			<?php endif;?>
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include('footer.php')?>
	