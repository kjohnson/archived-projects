var app = {

    initialize: function() {
        this.store = new MemoryStore();
        $('.search-key').on('keyup', $.proxy(this.findByName, this));
    },

    centerContent: function() {
    	var inner_main = $('#inner_main');
    	var top = ($(document).height() - inner_main.height())/2;
    	var width = $(document).width();
    	inner_main.css('position', 'absolute').css('top', top).css('width', width);
    }

};

app.initialize();
app.centerContent();

$(window).on('resize', function(){
	app.centerContent();
});



$("#openButton").click(function() {
	$(this).text('Processing...');

	$.ajax({
		type: "GET",
		url: "http://mixduckrace.vlxdigital.com/event/open",
		dataType: 'jsonp',
		data: { key: "RxJE0sN92u" },
		success:function(json){
			console.log('Success');
			console.log(json);
		},
		error:function(){
			console.log('Error');
		},
		done:function(){
			console.log("Done");
		}
	});

	$(this).text('Open');
	alert('Registration is Open');

});

$("#closeButton").click(function() {
	$(this).text('Processing...');

	$.ajax({
		type: "GET",
		url: "http://mixduckrace.vlxdigital.com/event/close",
		dataType: 'jsonp',
		data: { key: "RxJE0sN92u" },
		success:function(json){
			console.log('Success');
			console.log(json);
		},
		error:function(){
			console.log('Error');
		},
		done:function(){
			console.log("Done");
		}
	});

	$(this).text('Close');
	alert('Registration is Closed');

});