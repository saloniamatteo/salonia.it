@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.403.title'),
		"msg" => __('errors.403.desc'),
	])
!!}
