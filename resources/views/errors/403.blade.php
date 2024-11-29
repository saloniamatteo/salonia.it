@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.403.title'),
		"message" => __('errors.403.desc'),
	])
!!}
