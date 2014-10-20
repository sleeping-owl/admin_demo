<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<i class="fa fa-bar-chart-o fa-fw"></i> {{{ $label }}}
		</div>
		<div class="panel-body">
			<div id="{{{ $chartId }}}"></div>
			<a href="{{{ Admin::instance()->router->routeToModel($model) }}}" class="btn btn-default btn-block">See Details</a>
		</div>
	</div>
</div>
<script>
	$(function() {
		Morris.Donut({
			element: '{{{ $chartId }}}',
			data: <?=json_encode($data)?>,
			resize: true,
			colors: ['{{{ $color }}}']
		});
	});
</script>