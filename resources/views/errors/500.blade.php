@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.500.title'),
		"message" => __('errors.500.desc'),
	])
!!}
