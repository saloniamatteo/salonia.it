@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.429.title'),
		"msg" => __('errors.429.desc'),
	])
!!}
