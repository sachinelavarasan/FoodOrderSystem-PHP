function trim(inStr)
{
	var str = inStr.toString();
	str = str.replace(/^\s+|\s+$/g, '');
	return str;
}
function warning(msg){
    swal.fire({
        title: msg,
        type: "warning",
        timer: 1500,
        showCancelButton: false,
        showConfirmButton: false
      });
}
function success(msg){
    swal.fire({
        title: msg,
        type: "success",
        timer: 1500,
        showCancelButton: false,
        showConfirmButton: false
      });
}