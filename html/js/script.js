$(function(){
    if ($('#codeigniter_profiler').length > 0) {
		$('#codeigniter_profiler')
				.wrap('<div class="accordion" id="accordion2">')
				.wrap('<div class="accordion-group">')
				.wrap('<div id="collapseOne" class="accordion-body collapse collapsed">')
				.wrap('<div class="accordion-inner">');
		$('.accordion-group').prepend('<div class="accordion-heading">');
		$('.accordion-heading').prepend('<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Profiler</a>');
    }
});
