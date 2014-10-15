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
	</div>
</div>