$(function(){
// get the click of the create button -Shtadler-
    $('#modalButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});