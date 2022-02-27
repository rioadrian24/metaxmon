@if (session('success'))
<script>
	iziToast.show({
		title: '<b>Success</b>',
		titleColor: '#ffffff',
		message: "{!! session('success') !!}",
		messageColor: '#ffffff',
		backgroundColor: '#02a499',
		icon: 'ion-ios-checkmark-outline',
		iconColor: '#ffffff',
		position: 'topRight'
	});
</script>
@endif

@if (session('error'))
<script>
	iziToast.show({
		title: '<b>Failed</b>',
		titleColor: '#ffffff',
		message: "{!! session('error') !!}",
		messageColor: '#ffffff',
		backgroundColor: '#ec4561',
		icon: 'ion-ios-close-outline',
		iconColor: '#ffffff',
		position: 'topRight'
	});
</script>
@endif