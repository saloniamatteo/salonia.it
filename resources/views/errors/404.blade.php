@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.404.title'),
		"msg" => __('errors.404.desc'),
	])
!!}
