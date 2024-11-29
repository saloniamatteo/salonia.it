@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.503.title'),
		"message" => __('errors.503.desc'),
	])
!!}
