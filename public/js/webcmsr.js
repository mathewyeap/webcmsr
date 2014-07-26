var BASE_URL = 'http://localhost/webcmsr/public';

function put(url, data) {
  $.extend(data, { _method: 'PUT' });
  return $.post(url, data).error(function(xhr, status) {
    console.log(xhr);
    console.log(status);
  });
}
