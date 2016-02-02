
moment.locale('uk');
$('[data-format]').each(function() {
    var dateFormat = $(this).data('format');
    var newText = moment($(this).text()).format(dateFormat);
    
    $(this).text(newText);
});