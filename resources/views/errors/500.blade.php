@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.500.title'),
		"msg" => __('errors.500.desc'),
	])
!!}
