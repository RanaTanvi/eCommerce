	
    var count = $(".packages_Section").length;
	var i = 0;
	var height = 0;
	var subscription_height = 0;
	while(i < count ) {
		sub_height = $("#packages_Section_"+i).height();
		sub_height_subscription = $("#packages_Section_Subscription_"+i).height();
		
		if(height < sub_height) {
		height = sub_height
		}
		if(subscription_height < sub_height_subscription) {
		subscription_height = sub_height_subscription
		}
		i++;
	}
	$(".packages_Section").css('height', height);
	$(".packages_Section_Subscription").css('height', subscription_height);
