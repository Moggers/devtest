var Property = Backbone.Model.extend({
	defaults: {
		"id":0,
		"name" : "",
		"bathrooms":0,
		"storeys":0,
		"garages":0,
		"rooms":0,
		"price":0
	}
});

var Properties = Backbone.Collection.extend({
	url: '/properties',
	parse: function(data){
		console.log(data);
	},
	model: Property
});

var properties = new Properties([
	{"id":1, "name":"test"},
	{"id":2, "name":"secontest"}
]);

var PropertyView = Backbone.View.extend({
	events: {
		"click #search-submit": "search"
	},
	
	initialize: function() {
		console.log(this);
		this.listenTo(properties, "change", this.render);
		this.fields = [
			"rooms", "name", "bathrooms", "storeys", "price", "garages"
		];
		this.render();
	},

	render: function() {
		var view = this;
		$('table tbody, table thead tr').empty();
		_.forEach(view.fields, function(field){
			$('table thead tr').append('<th>' + field + '</th>');
		});
		properties.forEach( function(property) {
			console.log(property);
			var row = $('<tr/>');
			_.forEach(view.fields, function(field){
				row = row.append('<td>' + property.get(field) + '</td>');
			}, this);
			$('table tbody').append(row);
			console.log( row[0].outerHTML );
		});
	}
});



$(document).on('ready', function(e) {
	var app = new PropertyView;
});
