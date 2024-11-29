@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.419.title'),
		"message" => __('errors.419.desc'),
	])
!!}
