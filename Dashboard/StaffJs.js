// Javascript for display other reason absence - 1
document.getElementById('absenceReasonAdd').addEventListener('change', function () 
{
    var otherReasonTextareaAdd = document.getElementById('otherReasonTextareaAdd');
    if (this.value === 'Other') 
    {
    otherReasonTextareaAdd.style.display = 'block';
    }
    else 
    {
    otherReasonTextareaAdd.style.display = 'none';
    }
});

// Javascript for display other reason absence - 2
document.getElementById('absenceReasonUpdate').addEventListener('change', function () 
{
    var otherReasonTextareaUpdate = document.getElementById('otherReasonTextareaUpdate');
    if (this.value === 'Other') 
    {
    otherReasonTextareaUpdate.style.display = 'block';
    }
    else 
    {
    otherReasonTextareaUpdate.style.display = 'none';
    }
});

// Function to initialize datepicker and alert
function initializeDatepickerAndAlert(dateId, alertId) 
{
    var dateLimit = 5;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
  
    today = dd + '/' + mm + '/' + yyyy;
  
    $(dateId).datepicker(
    {
        multidate: true,
        clearBtn: true,
        format: 'dd/mm/yyyy',
        startDate: today,
        defaultViewDate: { year: yyyy, month: mm - 1, day: dd },
        weekStart: 1
    }).on('changeDate', function(e) 
    {
        if ($(dateId).datepicker('getDates').length > dateLimit) 
        {
            var dates = $(dateId).datepicker('getDates');
            dates.splice(0, dates.length - dateLimit);
            $(dateId).datepicker('setDates', dates);
            $(alertId).removeClass('d-none');
        } 
        else 
        {
            $(alertId).addClass('d-none');
        }
        var selectedDates = $(dateId).datepicker('getFormattedDate').split(",");
        var formattedDates = selectedDates.map(function(date) 
        {
            var parts = date.split("/");
            return parts[0] + "/" + parts[1];
        });
        $(dateId).val(formattedDates.join(", "));
    }).on('hide', function(e) 
    {
        var selectedDates = $(dateId).datepicker('getDates');
        var groupedDates = {};
        selectedDates.forEach(function(date) 
        {
            var dd = String(date.getDate()).padStart(2, '0');
            var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = date.getFullYear();
            var formattedDate = dd + "/" + mm + "/" + yyyy;
    
            if (!groupedDates[mm + "/" + yyyy]) 
            {
                groupedDates[mm + "/" + yyyy] = [];
            }
            groupedDates[mm + "/" + yyyy].push(dd);
        });
    
        var finalFormat = Object.keys(groupedDates).map(function(monthYear) 
        {
            return groupedDates[monthYear].join(",") + "/" + monthYear;
        }).join(" & ");
    
        $(dateId).val(finalFormat);
    })
    
  
    $(dateId).datepicker('setDate', new Date());
    $(dateId).attr('placeholder', '');
}

$(document).ready(function() 
{
    // Initialize datepickers and alerts
    initializeDatepickerAndAlert('#date1', '#alert1');
    initializeDatepickerAndAlert('#date2', '#alert2');
    initializeDatepickerAndAlert('#date3', '#alert3');
    initializeDatepickerAndAlert('#date4', '#alert4');
    initializeDatepickerAndAlert('#date5', '#alert5');
});

