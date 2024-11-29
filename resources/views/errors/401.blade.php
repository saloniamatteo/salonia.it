@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.401.title'),
		"message" => __('errors.401.desc'),
	])
!!}
