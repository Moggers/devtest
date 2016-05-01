var Properties = Backbone.Collection.extend({
	url: '/properties'
	parse: function(data){
		console.log(data);
	}
});

var Property = Backbone.Model.extend({
	defaults: {
		"name" : "",
		"bathrooms":0,
		"storeys":0,
		"garages":0,
		"rooms":0,
		"price":0
	}
});

$(document).on('ready', function(e) {
});
