@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"title" => __('errors.419.title'),
		"msg" => __('errors.419.desc'),
	])
!!}
