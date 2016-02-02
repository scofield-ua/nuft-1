moment.locale('uk');

var icons = {
    time: 'fa fa-clock-o',
    date: 'fa fa-calendar',
    up: 'fa fa-angle-up',
    down: 'fa fa-angle-down',
    previous: 'fa fa-angle-left',
    next: 'fa fa-angle-right',
    today: 'fa fa-check',
    clear: 'fa fa-trash-o',
    close: 'fa fa-times'  
};

$('input[data-type=calendar]').datetimepicker({
    format: "YYYY-MM-DD",
    showTodayButton: true,
    icons: icons
});

$('input[data-type=calendar-time]').datetimepicker({
    format: "YYYY-MM-DD HH:mm",
    showTodayButton: true,
    sideBySide: true,
    icons: icons
});