function showError(field,message){
    if(!message){
        $('#'+field)
        .addClass('is-valid')
        .removeClass('is-invalid')
        .siblings('.invalid-feedback')
        .text('');
    }
    else{
        $('#'+field)
        .addClass('is-invalid')
        .removeClass('is-valid')
        .siblings('.invalid-feedback')
        .text(message);
    }
}