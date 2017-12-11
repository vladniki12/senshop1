$( document ).ready(function() {
    $("#submit_add").click(
		function(){
			sendAjaxForm('result_form', 'add_master', 'action_ajax_form.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    jQuery.ajax({
        url:     url, //url �������� (action_ajax_form.php)
        type:     "POST", //����� ��������
        dataType: "html", //������ ������
        data: jQuery("#"+ajax_form).serialize(),  // ����������� ������
        success: function(response) { //������ ���������� �������
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = +result.text_end;
    	},
    	error: function(response) { // ������ �� ����������
    		document.getElementById(result_form).innerHTML = "������. ������ �� �����������.";
    	}
 	});
}