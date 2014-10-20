<div class="col-lg-3 col-md-6">
	<div class="panel panel-{{{ $style }}}">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-3">
					<i class="fa {{{ $icon }}} fa-fw fa-5x"></i>
				</div>
				<div class="col-xs-9 text-right">
					<div class="huge">{{{ $title }}}</div>
					<div>{{{ $label }}}</div>
				</div>
			</div>
		</div>
		<a href="{{{ Admin::instance()->router->routeToModel($model) }}}">
			<div class="panel-footer">
				<span class="pull-left">See Details</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		</a>
	</div>
</div>
