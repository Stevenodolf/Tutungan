var Days = [31,28,31,30,31,30,31,31,30,31,30,31];// index => month [0-11]
var Month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
$(document).ready(function () {
    var option = '<option value=""">Day</option>';
    var selectedDay="";
    for (var i=1;i <= Days[0];i++){ //add option days
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $('#day').append(option);
    $('#day').val(selectedDay);

    var option = '<option value="">Month</option>';
    var selectedMon ="";
    for (var i=1;i <= 12;i++){
        option += '<option value="'+ i + '">' + Month[i-1] + '</option>';
    }
    $('#month').append(option);
    $('#month').val(selectedMon);

    var d = new Date();
    var option = '<option value="">Year</option>';
    var selectedYear ="";
    for (var i=1930;i <= d.getFullYear();i++){// years start i
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $('#year').append(option);
    $('#year').val(selectedYear);
});
function isLeapYear(year) {
    year = parseInt(year);
    if (year % 4 != 0) {
        return false;
    } else if (year % 400 == 0) {
        return true;
    } else if (year % 100 == 0) {
        return false;
    } else {
        return true;
    }
}

function change_year(select)
{
    if( isLeapYear( $(select).val() ) )
    {
        Days[1] = 29;
        if( $("#month").val() == 2)
        {
            var day = $('#day');
            var val = $(day).val();
            $(day).empty();
            var option = '<option value="day">day</option>';
            for (var i=1;i <= Days[1];i++){ //add option days
                option += '<option value="'+ i + '">' + i + '</option>';
            }
            $(day).append(option);
            if( val > Days[ month ] )
            {
                val = 1;
            }
            $(day).val(val);
        }
    }
    else {
        Days[1] = 28;
    }
}

function change_month(select) {
    var day = $('#day');
    var val = $(day).val();
    $(day).empty();
    var option = '<option value="day">day</option>';
    var month = parseInt( $(select).val() ) - 1;
    for (var i=1;i <= Days[ month ];i++){ //add option days
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $(day).append(option);
    if( val > Days[ month ] )
    {
        val = 1;
    }
    $(day).val(val);
}
