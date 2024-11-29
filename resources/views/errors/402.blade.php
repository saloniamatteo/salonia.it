@use('App\Helpers\Page')
{!!
	Page::minify('errors.layout', [
		"card_title" => __('errors.402.title'),
		"message" => __('errors.402.desc'),
	])
!!}
