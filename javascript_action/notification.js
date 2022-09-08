$(document).ready(function() {
	showNotification();
	setInterval(function(){ showNotification(); }, 20000);
});
function update(id,url) {
	    
    $.ajax({
        type:'post',
        url:'php_action/update_notification.php',
        data:{id:id},
        success: function(data) {
            if(data==1) {
                window.open(url);           
            }else  {
                document.write(data);          
            }
            
        }
        
    });
}
function showNotification() {	
	if (!Notification) {
		$('body').append('<h4 style="color:red">*Browser does not support Web Notification</h4>');
		return;
	}
	if (Notification.permission !== "granted") {		
		Notification.requestPermission();
	} else {		
		$.ajax({
			url : "php_action/notification.php",
			type: "POST",
			success: function(data, textStatus, jqXHR) {
				var data = jQuery.parseJSON(data);
				if(data.result == true) {
					var data_notif = data.notif;
					for (var i = data_notif.length - 1; i >= 0; i--) {
						var theurl = data_notif[i]['url'];
						var id = data_notif[i]['id'];
						var notifikasi = new Notification(data_notif[i]['title'], {
							icon: data_notif[i]['icon'],
							body: data_notif[i]['msg'],
						});
						notifikasi.onclick = function () {
							notifikasi.close();
							 update(id,theurl)
							     
						};
						setTimeout(function(){
							notifikasi.close();
						}, 10000);
					};
				} else {
				}
			},
			error: function(jqXHR, textStatus, errorThrown)	{}
		}); 
	}
};