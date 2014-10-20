<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Hello, Admin!</h1>
		<p>
			This is simple demo application. It contains only 3 entity types:
			<ul>
				<li><code>Contact</code> &mdash; contains contact info, "belongs-to" relation with countries,
					"many-to-many" relation with companies
				</li>
				<li><code>Company</code> &mdash; contains title, address and phone, "many-to-many" relation with contacts</li>
				<li><code>Country</code> &mdash; contains title, "has-many" relation with contacts</li>
			</ul>
		</p>
		<p>Source of the demo is available on <a href="https://github.com/sleeping-owl/admin_demo">GitHub</a>.</p>
		<p>Source of the SleepingOwl Admin module is also available on <a href="https://github.com/sleeping-owl/admin">GitHub</a>.</p>
		<p>For details see <a href="http://sleeping-owl.github.io">SleepingOwl Admin documentation</a>.</p>
	</div>
</div>

<div class="row">
	<h2>Simple Dashboard Demo</h2>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-exclamation-triangle fa-fw fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{{ $contactsWithoutCompaniesCount }}}</div>
						<div>Contacts without company</div>
					</div>
				</div>
			</div>
			<a href="{{{ Admin::instance()->router->routeToModel('contacts', ['withoutCompanies' => 'yes']) }}}">
				<div class="panel-footer">
					<span class="pull-left">Show More</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<div class="row">
	@include('admin._partials.index_info_block', ['title' => $contactsCount,
		'label' => 'Contacts',
		'model' => 'contacts',
		'style' => 'primary',
		'icon' => 'fa-users'])
	@include('admin._partials.index_info_block', ['title' => $companiesCount,
		'label' => 'Companies',
		'model' => 'companies',
		'style' => 'green',
		'icon' => 'fa-building'])
	@include('admin._partials.index_info_block', ['title' => $countriesCount,
		'label' => 'Countries',
		'model' => 'countries',
		'style' => 'yellow',
		'icon' => 'fa-globe'])
</div>
<div class="row">
	@include('admin._partials.index_chart_block', ['label' => 'Country contacts count',
		'model' => 'contacts',
		'data' => $contactsByCountries,
		'color' => '#428bca',
		'chartId' => 'contacts-count-by-countries-chart'])
	@include('admin._partials.index_chart_block', ['label' => 'Company contacts count',
		'model' => 'companies',
		'data' => $contactsByCompanies,
		'color' => '#5cb85c',
		'chartId' => 'contacts-count-by-companies-chart'])
</div>