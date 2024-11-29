@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.404.title'),
		"message" => __('errors.404.desc'),
	])
!!}
