@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.429.title'),
		"message" => __('errors.429.desc'),
	])
!!}
