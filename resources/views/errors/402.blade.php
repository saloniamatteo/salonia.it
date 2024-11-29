@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.402.title'),
		"msg" => __('errors.402.desc'),
	])
!!}
