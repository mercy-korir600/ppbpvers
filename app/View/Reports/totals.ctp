<?php
$this->extend('/Reports/reports_manager');
$this->assign('totals-summary', 'active');
$this->assign('title_for_layout', 'Aggregate Reports');
?>

<?php $this->start('report'); ?>
<div class="row-fluid">
	<div class="span12">
		<h4>Aggregate Reports <small>Totals per report type<?php echo (!empty($startDate) && !empty($endDate)) ? ', filtered by the date range above' : ''; ?></small></h4>
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<table class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>Report Type</th>
					<th style="text-align: right;">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($totals as $key => $row) { ?>
					<tr>
						<td><?php echo h($row['label']); ?></td>
						<td style="text-align: right;"><?php echo (int)$row['count']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Grand Total</th>
					<th style="text-align: right;"><?php echo (int)$grandTotal; ?></th>
				</tr>
			</tfoot>
		</table>
		<?php if (!empty($startDate) && !empty($endDate)) { ?>
			<p class="muted">
				Showing totals for <?php echo h($rawStartDate); ?> to <?php echo h($rawEndDate); ?><?php echo $includeFollowups ? ', including follow-ups of matching cases' : ''; ?>.
			</p>
		<?php } else { ?>
			<p class="muted">Showing totals for all reports. Use the date filter above to narrow the range, and check "Include follow-ups of matching cases" to also pull in follow-ups whose reference number matches the selected years.</p>
		<?php } ?>
	</div>
</div>
<?php $this->end(); ?>
