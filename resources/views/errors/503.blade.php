@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.503.title'),
		"msg" => __('errors.503.desc'),
	])
!!}
