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
	},
	model: Property
});

var properties = new Properties([
]);

var PropertyView = Backbone.View.extend({
	el: "body",
	events: {
		"click #search-submit": "search"
	},
	
	initialize: function() {
		this.listenTo(properties, "change", this.render);
		this.fields = [
			"bedrooms", "name", "bathrooms", "storeys", "price", "garages"
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
			var row = $('<tr/>');
			_.forEach(view.fields, function(field){
				row = row.append('<td>' + property.get(field) + '</td>');
			}, this);
			$('table tbody').append(row);
		});
		$('table tbody tr td:nth-child(5)').prepend('$');
	},

	search: function() {
		var arr = {};
		$('.form-control').each(function(index,elem){
			arr[elem.name] = elem.value;
		});
		arr['minprice'] = $('#minpriceinput').autoNumeric('get');
		arr['maxprice'] = $('#maxpriceinput').autoNumeric('get');
		// NOTE: This is stupid. We need to read up on best practice for handling context inside of ajax callbacks.
		var context = this;
		$('.fa-spin').show();
		$('.fa-search').hide();
		$.post('/search', arr, function(data) {
			if( $.isEmptyObject(data)){
				alert("No results found. Sorry!");
			}
			properties = new Properties(data);
			context.render();
			$('.fa-spin').hide();
			$('.fa-search').show();
		});
	}
});



$(document).on('ready', function(e) {
	var app = new PropertyView;
	$.ajaxSetup({
		headers: { 
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#minpriceinput').autoNumeric('init', {
		aSign: '$'
	});
	$('#maxpriceinput').autoNumeric('init', {
		aSign: '$'
	});
	app.search();

});
