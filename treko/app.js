$(function(){
// simple password length hint
$('#password').on('input', function(){
const v = $(this).val();
if (v.length < 6) {
$(this).addClass('is-invalid');
} else {
$(this).removeClass('is-invalid');
}
});
});