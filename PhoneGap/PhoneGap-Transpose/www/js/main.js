var app = {

    initialize: function() {
        this.store = new MemoryStore();
        $('.search-key').on('keyup', $.proxy(this.findByName, this));
    }

};

app.initialize();

var steps = ['A', 'Bb', 'B', 'C', 'C#', 'D', 'D#/Eb', 'E', 'F', 'F#', 'G', 'G#/Ab' ];

$('#capo').change(function () {
  $("#capoLabel").text($(this).val());
  $.each($('.transposeFrom'), function(key, val) {
  	transpose(val);
  })
});

$('.transposeFrom').change(function() {
	transpose($(this));
});

function transpose(x) {
	var note;
	if ($(x).val()) {
		var current   = steps.indexOf($(x).val());
		var capo      = $('#capo').val();
		var transpose = current + 3 + Number(capo);
		if (transpose > steps.length) {
			transpose -= steps.length;
		}
		note = steps[transpose];
	} else {
		note = '';
	}
	$(x).closest('.table-view-cell').find('.transposeTo').text(note);
}
