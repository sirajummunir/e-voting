<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MaterialBladeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('text', function($name, $label = false){
            if(!$label){
                $label = ucfirst($name);
            }
            return '
            <div class="input-field">
                <input name="'.$name.'" id="'.$name.'" type="text" value="{{ old("'.$name.'") }}">
                <label for="'.$name.'">'.$label.'</label>

                <?php if ($errors->has("'.$name.'")): ?>
                    <span class="red-text">
                        <strong><?php echo $errors->first("'.$name.'") ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            ';
        });

        Blade::directive('password', function($name){
            $inputs = explode(',', $name);
            $name = trim($inputs[0]);
            if(!isset($inputs[1])){
                $label = ucfirst($name);
            }else{
                $label = trim($inputs[1]);
            }
            return '
            <div class="input-field">
                <input name="'.$name.'" id="'.$name.'" type="password" value="{{ old("'.$name.'") }}">
                <label for="'.$name.'">'.$label.'</label>

                <?php if ($errors->has("'.$name.'")): ?>
                    <span class="red-text">
                        <strong><?php echo $errors->first("'.$name.'") ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            ';
        });

        Blade::directive('form', function($expression){
            $inputs = explode(',', $expression);
            $method = trim(data_get($inputs, 0, 'get'));
            $action = trim(data_get($inputs, 1, false));
            $eid = trim(data_get($inputs, 2, false));

            $html = '<form method="'.$method.'" ';
            if($action){
                $html .= 'action="'.route($action).'" ';
            }
            if($eid){
                $html .= 'id="'.$id.'" ';
            }
            $html .= '>';
            return $html;
        });

        Blade::directive('endform', function(){
            return '</form>';
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
