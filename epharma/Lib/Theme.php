<?php
namespace Epharma\Lib;

use Illuminate\Contracts\View\Factory as ViewFactory;

/**
* 
*/
class Theme
{
	public function get()
	{
		return 'theme/epharma';
	}

	public function view($view = null, $data = [], $mergeData = [])
	{
		$factory = app(ViewFactory::class);

        if (func_num_args() === 0) {
            return $factory;
        }

        $factory->addNamespace('Theme', base_path( $this->get() ) );

        return $factory->make('Theme::'.$view, $data, $mergeData);
	}

	public function asset($path, $secure = null)
    {
        return app('url')->asset($this->get().'/'.$path, $secure);
    }

    public function publicImg($path, $secure = null)
    {
        return app('url')->asset('/storage/'.$path, $secure);
    }
}