@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.401.title'),
		"msg" => __('errors.401.desc'),
	])
!!}
